<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Masters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-lg-12">
<div class="col-lg-10">
</div>
<div class="col-lg-2">
 <?= Html::a("<span class='glyphicon glyphicon-menu-hamburger'></span> Dashboard ", ['purchase/tender'], ['class' => 'list-group-item ']); ?>
      <?= Html::a("<span class='glyphicon glyphicon-euro'></span> Bikes", ['purchase/purchaseorder'], ['class' => 'list-group-item ']); ?>
       <?= Html::a("<span class='glyphicon glyphicon-signal'></span> Pending PO", ['purchase/pendingpo'], ['class' => 'list-group-item ']); ?>
      <?= Html::a("<span class='glyphicon glyphicon-arrow-right'></span> Material Received", ['purchase/materialreceive'], ['class' => 'list-group-item']); ?>
      <?= Html::a("<span class='glyphicon glyphicon-eur'></span> Miscellaneous Purchase", ['purchase/miscellaneouspurchase'], ['class' => 'list-group-item']); ?>

</div>

</div>
</div>







