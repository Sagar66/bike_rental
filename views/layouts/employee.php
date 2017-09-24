<?php

use \yii\helpers\Html;

$action = Yii::$app->controller->action->id;
$controller = Yii::$app->controller->id;
?>
<?= Html::a("<i class='fa fa-users' aria-hidden='true'></i> Employees ", ['/employee/index'], ['class' => ($controller=='employee'&&$action == 'index') ? 'list-group-item active' : 'list-group-item']); ?>
<?= Html::a("<i class='fa fa-user-plus' aria-hidden='true'></i> Add Employee", ['/employee/create'], ['class' => ($controller=='employee'&&$action == 'create') ? 'list-group-item active' : 'list-group-item']); ?>
<?= Html::a("<i class='fa fa-user-md' aria-hidden='true'></i> Manage Employee", ['/employee/manage'], ['class' => ($controller=='employee'&&$action=='manage')?'list-group-item active':'list-group-item']); ?>
<?= Html::a("<i class='fa fa-building-o' aria-hidden='true'></i> Department", ['/department'], ['class' => $controller=='department'?'list-group-item active':'list-group-item']); ?>
<?= Html::a("<i class='fa fa-map-marker' aria-hidden='true'></i> Postition", ['/position'], ['class' => $controller=='position'?'list-group-item active':'list-group-item']); ?>



