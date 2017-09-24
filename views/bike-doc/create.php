<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BikeDoc */

$this->title = 'Create Bike Doc';
$this->params['breadcrumbs'][] = ['label' => 'Bike Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-doc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
