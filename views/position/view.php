<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => '',
    'icon' => 'glyphicon glyphicon glyphicon-ok',
    'body' => 'The Action Completed Successfully!!!',
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
/* @var $model app\models\Position */

$this->title = $model->position;
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-view">
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>
<p>
    <?= Html::a('Back', Yii::$app->request->referrer,['class' => 'glyphicon glyphicon-chevron-left btn btn-danger large']); ?>
    <span style="text-align: right;float: right;"><?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'glyphicon glyphicon-refresh btn btn-success large']) ?></span>
</p>
<!--    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'position',
            'department_id',
            'salary',
            'status',
        ],
    ]) ?>

</div>
