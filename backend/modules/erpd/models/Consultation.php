<?php

namespace backend\modules\erpd\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\staff\models\Staff;

/**
 * This is the model class for table "rp_consultation".
 *
 * @property int $id
 * @property int $csl_staff
 * @property string $csl_title
 * @property string $csl_funder
 * @property string $csl_amount
 * @property int $csl_level 1=local,2=international
 * @property string $date_start
 * @property string $date_end
 * @property string $csl_file
 */
class Consultation extends \yii\db\ActiveRecord
{
	public $csl_instance;
	public $file_controller;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rp_consultation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['csl_staff', 'csl_title', 'csl_funder', 'csl_level', 'date_start', 'date_end'], 'required'],
			
			[['csl_file'], 'required', 'on' => 'submit'],
			
            [['csl_staff', 'csl_level'], 'integer'],
            [['csl_amount'], 'number'],
            [['date_start', 'date_end'], 'safe'],
            [['csl_title', 'csl_funder'], 'string', 'max' => 500],
			
			[['review_note', 'csl_file'], 'string'],
			
			[['csl_file'], 'required', 'on' => 'csl_upload'],
            [['csl_instance'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf', 'maxSize' => 5000000],
            [['modified_at'], 'required', 'on' => 'csl_delete'],
			
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'csl_staff' => 'Csl Staff',
            'csl_title' => 'Consultation Title',
            'csl_funder' => 'Organizer/ sponsor/ funder/ collaborator',
            'csl_amount' => 'Value of Sponsorship (if applicable)',
            'csl_level' => 'Consultation Level',
            'date_start' => 'Join Date',
            'date_end' => 'End Date',
            'csl_file' => 'Consultation PDF File',
        ];
    }
	
	public function listLevel(){
		return [1=>'Local', 2 => 'International'];
	}
	
	public function getLevelName(){
		$arr = $this->listLevel();
		return $arr[$this->csl_level];
	}
	
	public function statusList(){
		$list = Status::find()->where(['user_show' => 1])->all();
		return ArrayHelper::map($list, 'status_code', 'status_name');
	}
	
	public function statusListAdmin(){
		$list = Status::find()->where(['admin_show' => 1])->all();
		return ArrayHelper::map($list, 'status_code', 'status_name');
	}
	
	public function getStatusInfo(){
        return $this->hasOne(Status::className(), ['status_code' => 'status']);
    }
	
	public function showStatus(){
		$status = $this->statusInfo;
		return '<span class="label label-'.$status->status_color .'">'.$status->status_name .'</span>';
	}
	
	public function getStaff(){
        return $this->hasOne(Staff::className(), ['id' => 'csl_staff']);
    }
	
	public function listYears(){
		$array = [];
		$year_end = date('Y');
		$year_start = $year_end - 7;
		
		for($y=$year_end;$y>=$year_start;$y--){
			$array[$y] = $y;
		}
		
		return $array;
	}
	
	public function flashError(){
        if($this->getErrors()){
            foreach($this->getErrors() as $error){
                if($error){
                    foreach($error as $e){
                        Yii::$app->session->addFlash('error', $e);
                    }
                }
            }
        }

    }
	
	
	public function getConsultationTags()
    {
        return $this->hasMany(ConsultationTag::className(), ['consult_id' => 'id']);
    }
	
	public function getTagStaffNames($break = "<br />"){
		$tags = $this->consultationTags;
		$str = '';
		if($tags){
			$i = 0;
			foreach($tags as $tag){
				$br = $i == 0 ? "" : $break;
				$str .= $br.$tag->staff->user->fullname;
			$i++;
			}
		}
		return $str;
	}
	
	public function getTagStaffNamesNotMe($break = "<br />"){
		$tags = $this->consultationTagsNotMe;
		$str = '';
		if($tags){
			$i = 0;
			foreach($tags as $tag){
				$br = $i == 0 ? "" : $break;
				$str .= $br.$tag->staff->user->fullname;
			$i++;
			}
		}
		return $str;
	}
	
	public function getMyConsultationTags()
    {
        return $this->hasMany(ConsultationTag::className(), ['consult_id' => 'id'])->where(['rp_consultation_tag.staff_id' => Yii::$app->user->identity->staff->id]);
    }
	
	public function getConsultationTagsNotMe()
    {
        return $this->hasMany(ConsultationTag::className(), ['consult_id' => 'id'])->where(['<>', 'staff_id',Yii::$app->user->identity->staff->id]);
    }
	
	public function tagStaffArray()
    {
        $list = self::find()
		->select('staff.id, user.fullname as staff_name, user.id as user_id')
		->innerJoin('rp_consultation_tag', 'rp_consultation_tag.pub_id = rp_consultation.id')
		->innerJoin('staff', 'rp_consultation_tag.staff_id = staff.id')
		->innerJoin('user', 'user.id = staff.user_id')
		->where(['rp_consultation_tag.pub_id' => $this->id])
		->all();
		
		return ArrayHelper::map($list,'id', 'id');
    }
}
