<?php

use \yii\helpers\Html;

$action = Yii::$app->controller->action->id;
$controller = Yii::$app->controller->id;
?>
<?= Html::a("<span><i class='fa fa-motorcycle' aria-hidden='true'></i> Bikes </span>", ['/bike/index'], ['class' => ($controller=='bike'&&$action == 'index') ? 'list-group-item active' : 'list-group-item']); ?>
<?= Html::a("<i class='fa fa-plus-square' aria-hidden='true'></i> Add Bike", ['/bike/create'], ['class' => ($controller=='bike'&&$action == 'create') ? 'list-group-item active' : 'list-group-item']); ?>
<?= Html::a("<i class='fa fa-cogs' aria-hidden='true'></i> Manage Bikes", ['bike/manage'], ['class' => $controller=='bike'&&$action=='manage'?'list-group-item active':'list-group-item']); ?>
