 <?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
    'type' => Growl::TYPE_WARNING,
    'title' => 'Warning!',
    'icon' => 'glyphicon glyphicon-exclamation-sign',
    'body' => 'The Delete Action Completed Successfully!!!',
    'showSeparator' => true,
    'delay' => 200,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);
}
/* @var $this yii\web\View */
/* @var $searchModel app\models\BikeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bikes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-index">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bike', ['create'], ['class' => 'btn btn-success large']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'no_plate',
            //'eng_num',
            'brand',
            'model',
             'name',
             'color',
             'details',
            // 'images',
            // 'doc_fk',
            // 'is_maintained',
            // 'status',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}{update}{delete}'],
        ],
    ]); ?>
</div>
