<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BikeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bike-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_plate') ?>

    <?= $form->field($model, 'eng_num') ?>

    <?= $form->field($model, 'brand') ?>

    <?= $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'details') ?>

    <?php // echo $form->field($model, 'images') ?>

    <?php // echo $form->field($model, 'doc_fk') ?>

    <?php // echo $form->field($model, 'is_maintained') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
