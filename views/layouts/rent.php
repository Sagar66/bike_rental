<?php
use \yii\helpers\Html;

$action = Yii::$app->controller->action->id;
$controller = Yii::$app->controller->id;
?>
<?= Html::a("<span class='glyphicon glyphicon-sort-by-alphabet'></span> Rent History ", ['/bike-rent/index'], ['class' => ($controller=='bike-rent'&&$action == 'index') ? 'list-group-item active' : 'list-group-item']); ?>
<?= Html::a("<span class='glyphicon glyphicon-usd'></span> Quick Rent", ['/bike-rent/create'], ['class' => ($controller=='bike-rent'&&$action == 'create') ? 'list-group-item active' : 'list-group-item']); ?>
<?= Html::a("<i class='fa fa-pencil-square-o' aria-hidden='true'></i> Manage Rents", ['bike-rent/manage'], ['class' => $controller=='bike-rent'&&$action=='manage'?'list-group-item active':'list-group-item']); ?>
