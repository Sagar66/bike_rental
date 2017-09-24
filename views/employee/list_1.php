<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

            //'id',
            'full_name',
            'address',
            //'gender',
            'phone',
             'email:email',
            [
                'attribute'=> 'department_fk',
                'value'=>function($model,$key){
                    return app\models\Department::findOne($model->department_fk)->department;
                }
            ],
            [
                'attribute'=> 'position_fk',
                'value'=>function($model,$key){
                    return app\models\Position::findOne($model->position_fk)->position;
                }
            ],
            
            // 'document_type',
            // 'document',
            // 'status',

           
        ],
    ]); ?>
</div>
