    <?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Success',
    'icon' => 'glyphicon glyphicon-ok',
    'body' => 'Bike Rented Successfully!!!',
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
/* @var $searchModel app\models\BikeRentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bike Rents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-rent-index">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Bike Rent', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute'=>'bike_fk',
                'value'=>function($model,$key){
                    return \app\models\Bike::findOne($model->bike_fk)->name;
                }
            ],
            [
                'attribute'=>'customer_fk',
                'value'=>function($model,$key){
                    return \app\models\Customer::findOne($model->customer_fk)->full_name;
                }
            ],
            'start_from:datetime',
            'end_to:datetime',
            [
                'attribute' => 'Total Days',
                'value' => function($model, $key) {
                    $bike_status = \app\models\Bike::findOne($model->bike_fk)->status;
                   $days= ($bike_status == 'Not Available' &&strtotime(date('Y-m-d'))>$model->end_to) ? (strtotime(date('Y-m-d'))+86400 - $model->start_from) / 86400 : ($model->end_to+86400 - $model->start_from)/86400;
                     return number_format($days,0);
                }
            ],
            [
                'attribute' => 'Price',
                'value' => function($model, $key) {
                    $bike_status = \app\models\Bike::findOne($model->bike_fk)->status;
                    $price= \app\models\Rent::find()->where(['bike_id'=>$model->bike_fk])->one();
                    $pricePD=0;
                    if(count($price)==1){
                        $pricePD=$price->price;
                    }
                    $days= ($bike_status == 'Not Available' &&strtotime(date('Y-m-d'))>$model->end_to) ? (strtotime(date('Y-m-d'))+86400 - $model->start_from) / 86400 : ($model->end_to+86400 - $model->start_from)/86400;
                    return number_format($days*$pricePD,0);
                }
            ],
           'status',
        // 'purpose',
        // 'admin_fk',
        // 'status',
        // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
