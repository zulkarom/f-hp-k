<?php

namespace backend\modules\erpd\controllers;

use Yii;
use backend\modules\erpd\models\Award;
use backend\modules\erpd\models\AwardSearch;
use backend\modules\erpd\models\AwardTag;
use backend\modules\erpd\models\Status;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\models\UploadFile as Upload;
use yii\helpers\Json;
use yii\db\Expression;

/**
 * AwardController implements the CRUD actions for Award model.
 */
class AwardController extends Controller
{
    /**
     * @inheritdoc
     */
    

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * Lists all Award models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AwardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	

    /**
     * Displays a single Award model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	

    /**
     * Creates a new Award model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Award();

        if ($model->load(Yii::$app->request->post())) {
			
			$model->created_at = new Expression('NOW()');
			
			$model->awd_staff = Yii::$app->user->identity->staff->id;
			//$tag = Yii::$app->request->post('tagged_staff');print_r($tag);die();
			if($model->save()){
				
				$tag = new AwardTag;
				$tag->award_id = $model->id;
				$tag->staff_id = Yii::$app->user->identity->staff->id;
				$tag->save();
				
				$tag = Yii::$app->request->post('tagged_staff');
				
						if($tag){
							$kira_post = count($tag);
							$kira_lama = count($model->awardTagsNotMe);
							if($kira_post > $kira_lama){
								$bil = $kira_post - $kira_lama;
								for($i=1;$i<=$bil;$i++){
									$insert = new AwardTag;
									$insert->award_id = $model->id;
									$insert->save();
								}
							}else if($kira_post < $kira_lama){
	
								$bil = $kira_lama - $kira_post;
								$deleted = AwardTag::find()
								  ->where(['award_id'=>$model->id])
								  ->andwhere(['<>', 'staff_id', Yii::$app->user->identity->staff->id])
								  ->limit($bil)
								  ->all();
								if($deleted){
									foreach($deleted as $del){
										$del->delete();
									}
								}
							}
							
							$update_tag = AwardTag::find()
							->where(['award_id' => $model->id])
							->andWhere(['<>', 'staff_id', Yii::$app->user->identity->staff->id])
							->all();
	
							if($update_tag){
								$i=0;
								foreach($update_tag as $ut){
									$ut->staff_id = $tag[$i];
									$ut->save();
									$i++;
								}
							}
						}
				
				
				 $action = Yii::$app->request->post('wfaction');
				if($action == 'save'){
					Yii::$app->session->addFlash('success', "Data saved");
					return $this->redirect(['/erpd/award/update', 'id' => $model->id]);
				}else if($action == 'next'){
					return $this->redirect(['/erpd/award/upload', 'id' => $model->id]);
				}
			}else{
				$model->flashError();
			}
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
	
	public function actionReUpdate($id){
		$model = $this->findModel($id);
		if(in_array($model->status, Status::userStatusEdit())){
			//status correction
			$model->status = 10;
			$model->review_note = 'self-update';
			if($model->save()){
				return $this->redirect(['update', 'id' => $id]);
			}
		}
		
	}

    /**
     * Updates an existing Award model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			$model->modified_at = new Expression('NOW()');
			if($model->save()){
				
				$tag = Yii::$app->request->post('tagged_staff');
				
						if($tag){
							$kira_post = count($tag);
							$kira_lama = count($model->awardTagsNotMe);
							if($kira_post > $kira_lama){
								$bil = $kira_post - $kira_lama;
								for($i=1;$i<=$bil;$i++){
									$insert = new AwardTag;
									$insert->award_id = $model->id;
									$insert->save();
								}
							}else if($kira_post < $kira_lama){
	
								$bil = $kira_lama - $kira_post;
								$deleted = AwardTag::find()
								  ->where(['award_id'=>$model->id])
								  ->andwhere(['<>', 'staff_id', Yii::$app->user->identity->staff->id])
								  ->limit($bil)
								  ->all();
								if($deleted){
									foreach($deleted as $del){
										$del->delete();
									}
								}
							}
							
							$update_tag = AwardTag::find()
							->where(['award_id' => $model->id])
							->andWhere(['<>', 'staff_id', Yii::$app->user->identity->staff->id])
							->all();
	
							if($update_tag){
								$i=0;
								foreach($update_tag as $ut){
									$ut->staff_id = $tag[$i];
									$ut->save();
									$i++;
								}
							}
						}
				
				$action = Yii::$app->request->post('wfaction');
				if($action == 'save'){
					Yii::$app->session->addFlash('success', "Data saved");
					return $this->redirect(['/erpd/award/update', 'id' => $model->id]);
				}else if($action == 'next'){
					return $this->redirect(['/erpd/award/upload', 'id' => $model->id]);
				}
			}
            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Award model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
		if($model->awd_staff == Yii::$app->user->identity->staff->id){
			$file = Yii::getAlias('@upload/' . $model->awd_file);
			if (is_file($file)) {
                unlink($file); 
            }
			AwardTag::deleteAll(['award_id' => $id]);
			if($model->delete()){
				Yii::$app->session->addFlash('success', "The award has been successfully deleted");
				return $this->redirect(['index']);
			}
			
		}
    }

    /**
     * Finds the Award model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Award the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Award::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	public function actionUpload($id){
		$model = $this->findModel($id);
		if($model->status > 20 ){
			return $this->redirect(['view', 'id' => $id]);
		}
		$model->scenario = 'submit';
		
		if ($model->load(Yii::$app->request->post())) {
			$model->modified_at = new Expression('NOW()');
			if($model->status == 10){
				$model->status = 30;//updated
			}else{
				$model->status = 20;//submit
			}
			
			if($model->save()){
				Yii::$app->session->addFlash('success', "Your award has been successfully submitted.");
				return $this->redirect('index');
			}else{
				$model->flashError();
			}
		}
		
		 return $this->render('upload', [
            'model' => $model,
        ]);
	}
	
	public function actionUploadFile($attr, $id){
        $attr = $this->clean($attr);
        $model = $this->findModel($id);
        $model->file_controller = 'award';
		
		$year = date('Y') + 0 ;
		$path = $year . '/erpd/award';

        return Upload::upload($model, $attr, 'modified_at', $path);

    }

	protected function clean($string){
		$allowed = ['awd'];
		
		foreach($allowed as $a){
			if($string == $a){
				return $a;
			}
		}
		
		throw new NotFoundHttpException('The requested page does not exist.');
    }

	public function actionDeleteFile($attr, $id)
    {
        $attr = $this->clean($attr);
        $model = $this->findModel($id);
        $attr_db = $attr . '_file';
        
        $file = Yii::getAlias('@upload/' . $model->{$attr_db});
        
        $model->scenario = $attr . '_delete';
        $model->{$attr_db} = '';
        $model->modified_at = new Expression('NOW()');
        if($model->save()){
            if (is_file($file)) {
                unlink($file);
                
            }
            
            return Json::encode([
                        'good' => 1,
                    ]);
        }else{
            return Json::encode([
                        'errors' => $model->getErrors(),
                    ]);
        }
        


    }

	public function actionDownloadFile($attr, $id, $identity = true){
        $attr = $this->clean($attr);
        $model = $this->findModel($id);
        $filename = strtoupper($attr) . ' ' . Yii::$app->user->identity->fullname;
        
        
        
        Upload::download($model, $attr, $filename);
    }
}
