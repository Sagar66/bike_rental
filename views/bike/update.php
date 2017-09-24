 <?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bike */

$this->title = 'Update Bike: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bike-update">

    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model1'=>$model1,
        'model2'=>$model2,
    ]) ?>

</div>
