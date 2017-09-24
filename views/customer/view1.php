<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Success',
    'icon' => 'glyphicon glyphicon-ok-sign',
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
/* @var $model app\models\Customer */

$this->title = $model->full_name;
//$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'full_name',
            'phone',
            'gender',
            'address',
            'email:email',
            'license_no',
        ],
    ]) ?>

</div>
