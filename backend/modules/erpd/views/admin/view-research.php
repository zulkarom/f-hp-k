<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\modules\erpd\models\Publication */

$this->title = 'Verify Research';
$this->params['breadcrumbs'][] = ['label' => 'Research', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Verify';

$model->file_controller = 'publication';

?>


<?=$this->render('../research/_view_all', ['model' => $model])?>





<?php $form = ActiveForm::begin(); ?>

<?=$form->field($model, 'reviewed_at')->hiddenInput(['value' => time()])->label(false)?>


<div class="form-group">

<?=Html::a('<span class="glyphicon glyphicon-arrow-left"></span> BACK', ['/erpd/admin/research'],['class'=>'btn btn-default'])?>  

<?=Html::submitButton('<span class="glyphicon glyphicon-pencil"></span> MODIFY', 
    ['class' => 'btn btn-warning', 'name' => 'wfaction', 'value' => 'correction', 'data' => [
                'confirm' => 'Are you sure to request the staff to correct the research?'
            ],
    ])?>

	
	<?php 
	
	if($model->status != 50){
		echo Html::submitButton('<span class="glyphicon glyphicon-ok"></span> VERIFY', 
		['class' => 'btn btn-primary', 'name' => 'wfaction', 'value' => 'verify', 'data' => [
					'confirm' => 'Are you sure to verify the research?'
				],
		]);
	}
	?>
    

    </div>

    <?php ActiveForm::end(); ?>



<div class="box">
<div class="box-header"></div>
<div class="box-body">
<?php $form = ActiveForm::begin(); ?>





<?php ActiveForm::end(); ?>
</div>
</div>
