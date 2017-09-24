<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
	'type' => Growl::TYPE_SUCCESS,
	'icon' => 'glyphicon glyphicon-ok-sign',
	'title' => 'Note',
	'showSeparator' => true,
	'body' => 'Successfully Completed Action',
]);
}

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Back', Yii::$app->request->referrer,['class' => 'glyphicon glyphicon-chevron-left btn btn-danger large']); ?>
    <span style="text-align: right;float: right;"><?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'glyphicon glyphicon-refresh btn btn-success large']) ?></span>
</p>
<div class="admin-index my">
<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'password',
            'email:email',
            'phone',
            //'authKey',
           // 'token',
            'created_at',
            'last_update',
            'status',
        ],
    ]) ?>
</div>

