<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\web\Session;
use kartik\growl\Growl;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
	'type' => Growl::TYPE_SUCCESS,
	'icon' => 'glyphicon glyphicon-ok-sign',
	'title' => 'Note',
	'showSeparator' => true,
	'body' => 'User Verified and Successfully Logined',
]);
}
/* @var $this yii\web\View */
/* @var $searchModel app\models\BikeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bikes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-index">
    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bike', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    return $this->render('view1', ['model' => \app\models\Bike::findOne($model->id)]);
//                    return $this->render('view1', ['model1' => \app\models\BikeDoc::findOne($model->bike_fk)]);
//                    return $this->render('view1',['model1' => \app\models\BikeDoc::find()->where(['bike_fk'=>$id])->one()]);
//                  
                },
            ],

            //'id',
            //'no_plate',
            //'eng_num',
            'brand',
            'model',
            'name',
             'color',
             'details',
             'images',
            // 'doc_fk',
            // 'is_maintained',
            'status',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>