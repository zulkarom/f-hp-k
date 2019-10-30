<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\staff\models\StaffPosition;
use backend\modules\staff\models\StaffPositionStatus;
use backend\modules\staff\models\StaffWorkingStatus;
use yii\helpers\ArrayHelper;
use backend\models\Department;

/* @var $this yii\web\View */
/* @var $model backend\modules\staff\models\StaffSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
<div class="box-header">
<div class="box-title">
Search Staff

</div>

</div>
<div class="box-body"><div class="staff-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<div class="row">
<div class="col-md-4"><?= $form->field($model, 'staff_no') ?></div>
<div class="col-md-4"><?php  echo $form->field($model, 'staff_name') ?>
</div>


<div class="col-md-4">
<?php  echo $form->field($model, 'position_id')->dropDownList(StaffPosition::positionList(),['class'=> 'form-control','prompt' => 'All']) ?>

</div>

</div>
    


    <div class="row">
	
	<div class="col-md-3"><?php  echo $form->field($model, 'is_academic')->dropDownList([1=>'Academic', 0 => 'Administrative'], ['prompt' => 'All'])?>
</div>
	
<div class="col-md-3">

<?php  echo $form->field($model, 'position_status')->dropDownList( ArrayHelper::map(StaffPositionStatus::find()->where(['>', 'id',0])->all(),'id', 'status_name'),['class'=> 'form-control','prompt' => 'All']) ?>


</div>

<div class="col-md-3">

<?php  echo $form->field($model, 'working_status')->dropDownList( ArrayHelper::map(StaffWorkingStatus::find()->where(['>', 'id',0])->all(),'id', 'work_name'),['class'=> 'form-control','prompt' => 'All']) ?>
</div>

<div class="col-md-3">

<?= $form->field($model, 'staff_department')->dropDownList(
        ArrayHelper::map(Department::find()->where(['>', 'id', 0])->all(),'id', 'dep_name'), ['prompt' => 'Please Select' ]
    ) ?>

</div>

</div>


    <div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> Search Staff', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['/staff/staff'],['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div></div>
</div>

