<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['Active'=>'Active','Inactive'=>'Inactive']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success large' : 'btn btn-primary large']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
