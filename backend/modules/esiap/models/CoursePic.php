<?php

namespace backend\modules\esiap\models;

use Yii;
use backend\modules\staff\models\Staff;

/**
 * This is the model class for table "sp_course_pic".
 *
 * @property int $id
 * @property int $course_id
 * @property int $staff_id
 * @property string $updated_at
 * @property int $pic_order
 *
 * @property Course $course
 * @property Staff $staff
 */
class CoursePic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sp_course_pic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_id'], 'required'],
			
			
            [['staff_id', 'pic_order'], 'integer'],
			
            [['updated_at'], 'safe'],
			
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
			
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['staff_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'staff_id' => 'Staff ID',
            'updated_at' => 'Created At',
            'pic_order' => 'Pic Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(Staff::className(), ['id' => 'staff_id']);
    }
}
