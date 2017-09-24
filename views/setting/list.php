<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index my">
<div class="row my">
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
                    return $this->render('view1', ['model' => \app\models\Admin::findOne($model->id)]);
                },
            ],

            //'id',
            'username',
            //'password',
            'email:email',
            'phone',
            //'authKey',
            // 'token',
             'created_at',
             'last_update',
            // 'status',
//delete menu:
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
