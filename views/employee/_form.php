<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
<div class="employee-form col col-lg-12">
    <div class="col col-lg-6">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true])->dropDownList(['Male'=>'Male','Female'=>'Female','Others'=>'Others']) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col col-lg-6">

    <?= $form->field($model, 'department_fk')->dropDownList(yii\helpers\ArrayHelper::map(app\models\Department::find()->all(),'id','department')) ?>

    <?= $form->field($model, 'position_fk')->dropDownList(yii\helpers\ArrayHelper::map(app\models\Position::find()->all(),'id','position')) ?>

    <?= $form->field($model, 'document_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'document')->fileInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true])->dropDownList(['Active'=>'Active','Inactive'=>'Inactive']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success large' : 'btn btn-primary large']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>
</div>