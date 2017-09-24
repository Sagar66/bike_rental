<?php

use yii\helpers\Html;
use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Success',
    'icon' => 'glyphicon glyphicon-ok',
    'body' => 'Bike is Rented Successfully!!!',
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
/* @var $model app\models\Rent */

$this->title = 'Create Rent';
$this->params['breadcrumbs'][] = ['label' => 'Rents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
