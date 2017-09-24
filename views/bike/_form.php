......x<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bike */
/* @var $form yii\widgets\ActiveForm */
$model2->periods=1;
?>
<div class="bike-form row">
    <div class="col col-lg-12">
        <div class="col col-lg-6">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]) ?>

    <?= $form->field($model, 'no_plate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eng_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'details')->textarea(['maxlength' => true]) ?>
                    </div>
    <div class="col col-lg-6">
    <?= $form->field($model1, 'document_type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model1, 'document')->fileInput(['maxlength' => true]) ?>
    
    <?= $form->field($model2, 'periods')->hiddenInput()->label(false) ?>
    <?= $form->field($model2, 'price')->label('Price Per Day')?>
    
    <?= $form->field($model, 'images')->fileInput() ?>

    <?= $form->field($model, 'is_maintained')->dropDownList(['Yes'=>'Yes','No'=>'No']) ?>

    <?= $form->field($model, 'status')->dropDownList(['Available'=>'Available','Maintenance'=>'Maintenance','Not Avaliable'=>'Not Avaliable']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success larges' : 'btn btn-primary large']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
