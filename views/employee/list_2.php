<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\select2;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
      //<?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                         [
              'class' => 'kartik\grid\ExpandRowColumn',
              'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
                 },
                'detail'=> function ($model, $key, $index, $column)
                {
                     return $this->render('list',['id'=>$model->id]);
                },
                        ],
                        ],
    ]); ?>
</div>
