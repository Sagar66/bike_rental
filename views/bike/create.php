<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bike */

$this->title = 'Create Bike';
$this->params['breadcrumbs'][] = ['label' => 'Bikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-create">

    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model1'=>$model1,
        'model2'=>$model2,
    ]) ?>

</div>
