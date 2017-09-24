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
    'body' => 'The Admin User is deleted!!!',
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
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index my">
<div class="row my">
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            'password',
            'email:email',
            'phone',
            //'authKey',
            // 'token',
            // 'created_at',
            // 'last_update',
            // 'status',                        
            ['class' => 'yii\grid\ActionColumn','template'=>'{view}{update}{delete}'],
        ],
    ]); ?>
</div>
</div>
