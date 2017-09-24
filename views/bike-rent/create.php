<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BikeRent */

$this->title = 'Rent Bike';
$this->params['breadcrumbs'][] = ['label' => 'Bike Rents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-rent-create">

    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
