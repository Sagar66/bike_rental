<?php

use yii\helpers\Html;
use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
	'type' => Growl::TYPE_SUCCESS,
	'icon' => 'glyphicon glyphicon-ok-sign',
	'title' => 'Note',
	'showSeparator' => true,
	'body' => 'User Verified and Successfully Logined',
]);
}

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
</div>
<div class="col col-lg-12">
    <div class="row" style="margin-left:25px; margin-top: 15px">

<div class="row" style="padding-top:10px">

    <div class="col-lg-4 mb">

        <a href="<?= Yii::$app->homeUrl ?>/?r=employee/index" class="anchor">

            <div class="indextab">

                <img height="100px" width="150px" src="<?= Yii::getAlias('@web') ?>/images/employee.png" class="indexthumb"/>

                <div class="main_node" >Employee </div>

            </div>            

        </a>

    </div>

    <div class="col-lg-4 mb">

        <a href="<?= Yii::$app->homeUrl ?>/?r=bike/index" class="anchor">

            <div class="indextab">

                <img height="100px" width="150px" src="<?= Yii::getAlias('@web') ?>/images/bike1.png" class="indexthumb"/>

                <div class="main_node">Bikes Record</div>

            </div>            

        </a>

    </div>

    <div class="col-lg-4 mb">

        <a href="<?= Yii::$app->homeUrl ?>/?r=customer/index" class="anchor">

            <div class="indextab">

                <img height="100px" width="150px" src="<?= Yii::getAlias('@web') ?>/images/customer.png" class="indexthumb"/>

                <div class="main_node">Customers</div>

            </div>            

        </a>

    </div>

</div>

<div class="row">

    <div class="col-lg-4 mb">   

        <a href="<?= Yii::$app->homeUrl ?>/?r=bike-rent/create" class="anchor">

            <div class="indextab">

                <img height="100px" width="150px" src="<?= Yii::getAlias('@web') ?>/images/bikerent.png" class="indexthumb"/>

                <div class="main_node">Quick Rent</div>;

            </div>            

        </a>

    </div>

</div>

</div>

</div>