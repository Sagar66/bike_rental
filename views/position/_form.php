<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Position */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'department_id')->dropDownList(yii\helpers\ArrayHelper::map(app\models\Department::find()->all(), 'id', 'department')) ?>

    <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['Active'=>'Active','Inactive'=>'Inactive']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success large' : 'btn btn-primary large']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
