<?php
use kartik\grid\GridView;
$searchModel = new \app\models\EmployeeSearch();
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
    'type' => Growl::TYPE_WARNING,
    'title' => 'Warning!!',
    'icon' => 'glyphicon glyphicon-hand-left',
    'body' => 'Employee is deleted!!!',
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
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="" class="large">
        <?= Html::a('Add Employee', ['create'], ['class' => 'btn btn-success large']) ?>
    </p>
    <?= GridView::widget([
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
                    return $this->render('view1', ['model' => \app\models\Employee::findOne($model->id)]);
                },
            ],
            'id',
            'full_name',
            'address',
            'gender',
            'phone',
            // 'email:email',
             //'department_fk',
            // 'position_fk',
            // 'document_type',
            // 'document',
            // 'status',
             ['class' => 'yii\grid\ActionColumn'],
           
        ],
    ]); ?>
</div>
