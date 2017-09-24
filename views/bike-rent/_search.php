<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BikeRentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bike-rent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bike_fk') ?>

    <?= $form->field($model, 'customer_fk') ?>

    <?= $form->field($model, 'start_from') ?>

    <?= $form->field($model, 'end_to') ?>

    <?php // echo $form->field($model, 'purpose') ?>

    <?php // echo $form->field($model, 'admin_fk') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
