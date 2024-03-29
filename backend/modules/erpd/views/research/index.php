<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\erpd\models\ResearchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Researches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-index">


    <p>
        <?= Html::a('Create Research', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  <div class="box">
<div class="box-header"></div>
<div class="box-body">  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
		'options' => [ 'style' => 'table-layout:fixed;' ],
		
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
				'label' => '',
				'format' => 'raw',
				'contentOptions' => [ 'style' => 'width: 1%;' ],
				'value' => function($model){
					
					return '<a href="'.Url::to(['download-file', 'attr' => 'res', 'id' => $model->id]).'" target="_blank"><i class="fa fa-file-pdf-o"></i></a>';
				}
				
			],
			[
                'attribute' => 'res_title',
				'label' => 'Title',
                'format' => 'html',
				'value' => function($model){
					$note = '';
					if($model->status == 10){
						$note = '<br /> <span style="color:red">*Review Note: ' . $model->review_note . '</span>';
					}
					return $model->res_title . ' <br /><i class="fa fa-tags"></i> by ' . $model->staff->user->fullname . $note;
				},
                'contentOptions' => [ 'style' => 'width: 60%;' ],
            ],
			[
				'attribute' => 'res_grant',
				'label' => 'Grant',
				'value' => function($model){
					return $model->researchGrant->gra_abbr;
				}
				
			],

			[
				'attribute' => 'res_progress',
				'format' => 'html',
				'value' => function($model){
					return $model->showProgress();
				}
			],
            [
				'attribute' => 'status',
                'format' => 'html',
				'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusList(),['class'=> 'form-control','prompt' => 'All']),
				'value' => function($model){
					return $model->showStatus();
				}
			],
       
            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 13.7%'],
                'template' => '{update} {delete}',
                //'visible' => false,
                'buttons'=>[
                    'update'=>function ($url, $model) {
						if($model->status > 10){
							return Html::a('<span class="glyphicon glyphicon-search"></span> VIEW',['/erpd/research/view', 'id' => $model->id],['class'=>'btn btn-default btn-sm']);
						}else{
							return Html::a('<span class="glyphicon glyphicon-pencil"></span> UPDATE',['/erpd/research/update', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
						}
                        
                    },
					'delete' => function ($url, $model) {
						if($model->status == 0 or  $model->status == 10){
							return Html::a('<span class="glyphicon glyphicon-trash"></span>',['/erpd/research/delete', 'id' => $model->id],['class'=>'btn btn-danger btn-sm', 'data' => [
								'confirm' => 'Are you sure you want to delete this research?',
								'method' => 'post',
							],
							]);
						}else{
							return '';
						}
                        
                    }
                ],
            
            ],

        ],
    ]); ?></div>
</div>
</div>
