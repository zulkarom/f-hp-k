<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use backend\modules\staff\models\Staff;

/* @var $this yii\web\View */
/* @var $model backend\modules\esiap\models\CourseVersion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-version-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="box">
<div class="box-header"></div>
<div class="box-body">    

    <?= $form->field($model, 'version_name')->textInput(['maxlength' => true]) ?>

<div class="row">
<div class="col-md-4"><?= $form->field($model, 'is_developed')->dropDownList( [1 => 'YES' , 0 => 'NO'] ) ?></div>

<div class="col-md-4"><?= $form->field($model, 'status')->dropDownList( $model->statusArray ) ?>
</div>

<div class="col-md-2"><?php 

if((!$model->plo_num) or $model->plo_num == 0){
	$model->plo_num = $model->defaultPloNumber;
}

echo $form->field($model, 'plo_num')->dropDownList( $model->ploNumberArray ) ?>
</div>




</div>




<div class="row">
<div class="col-md-6"><?= $form->field($model, 'prepared_by')->dropDownList(Staff::activeStaffUserArray(), ['prompt' => 'Choose Staff']) ?></div>

<div class="col-md-3">

<?php 
 echo $form->field($model, 'prepared_at')->widget(DatePicker::classname(), [
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true,
        
    ],
    
    
]);

?>
</div>

</div>


<div class="row">
<div class="col-md-6"><?= $form->field($model, 'verified_by')->dropDownList(Staff::activeStaffUserArray(), ['prompt' => 'Choose Staff']) ?></div>

<div class="col-md-3">

<?php 
 echo $form->field($model, 'verified_at')->widget(DatePicker::classname(), [
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true,
        
    ],
    
    
]);

?>
</div>

</div>


<div class="row">
<div class="col-md-3">



 <?php
 
 if($model->faculty_approve_at == '0000-00-00'){
	 $model->faculty_approve_at = date('Y-m-d');
 }
 
 
 echo $form->field($model, 'faculty_approve_at')->widget(DatePicker::classname(), [
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true,
        
    ],
    
    
])->label('Faculty/Center Approve at');

?>

</div>



<div class="col-md-3">
 <?php
 
 if($model->senate_approve_at == '0000-00-00'){
	 $model->senate_approve_at = date('Y-m-d');
 }
 
 
 echo $form->field($model, 'senate_approve_at')->widget(DatePicker::classname(), [
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true,
        
    ],
    
    
]);

?>
</div>

</div>

<div class="row">
<div class="col-md-4"><?= $form->field($model, 'is_published')->dropDownList( [1 => 'YES' , 0 => 'NO'] ) ?></div>

</div>
   
   
   </div>
</div>

<div class="row">
<div class="col-md-6"><div class="form-group">
        <?= Html::submitButton('SAVE PROGRAM VERSION', ['class' => 'btn btn-primary']) ?>
    </div></div>

<div class="col-md-6" align="right">

<?= Html::a('Delete Version', ['course-version-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this version? This action can not be undone!',
                'method' => 'post',
            ],
        ]) ?>

</div>

</div>


    

    <?php ActiveForm::end(); ?>

</div>
