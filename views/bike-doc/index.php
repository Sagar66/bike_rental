<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BikeDocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bike Docs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-doc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bike Doc', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'document_type',
            'document',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
