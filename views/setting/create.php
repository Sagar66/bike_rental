<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = 'Create Admin';
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row my">
    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
