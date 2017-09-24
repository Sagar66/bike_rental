<?php

use \yii\helpers\Html;

$action = Yii::$app->controller->action->id;
$controller = Yii::$app->controller->id;
?>
<?= Html::a("<span class='glyphicon glyphicon-user'></span> Customers ", ['/customer/index'], ['class' => ($controller=='customer'&&$action == 'index') ? 'list-group-item active' : 'list-group-item']); ?>
<?= Html::a("<span class='glyphicon glyphicon-plus'></span> Customer Entry", ['/customer/create'], ['class' => ($controller=='customer'&&$action == 'create') ? 'list-group-item active' : 'list-group-item']); ?>
<?= Html::a("<span class='glyphicon glyphicon-pencil'></span> Manage Customers", ['customer/manage'], ['class' => $controller=='customer'&&$action=='manage'?'list-group-item active':'list-group-item']); ?>