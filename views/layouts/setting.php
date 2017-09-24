<?php
use \yii\helpers\Html;

$action = Yii::$app->controller->action->id;
$controller = Yii::$app->controller->id;
?>
<?= Html::a("<span class='fa fa-user-secret fa-lg large'></span> Admins " , ['/setting/list'], ['class' => ($controller=='setting'&&$action == 'list') ? 'list-group-item active' : 'list-group-item']); ?>
<?= Html::a("<span class='fa fa-plus'></span> Admin Create", ['/setting/create'], ['class' => ($controller=='setting'&&$action == 'create') ? 'list-group-item active' : 'list-group-item']); ?>
<?= Html::a("<span class='fa fa-cog fa-spin fa-1x fa-fw'></span> Manage Admins", ['setting/manage'], ['class' => $controller=='setting'&&$action=='manage'?'list-group-item active':'list-group-item']); ?>