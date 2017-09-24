<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BikeRent */

$this->title = 'Update Bike Rent: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bike Rents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bike-rent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
