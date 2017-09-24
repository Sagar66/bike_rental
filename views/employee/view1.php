    <?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

?>
<div class="employee-view row">
    <div class="col col-lg-12">
        <div class="col col-lg-8">


<!--    <p>
             'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'full_name',
            'address',
            'gender',
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
            'document_type',
            'document',
            'status',
        ],
    ]) ?>
</div>
        <div class="col col-lg-4">
              <?php
        if (!empty($model->document)) { 
            ?>
            <img src="<?= Yii::getAlias('@web') . "/uploads/" . $model->document ?>" style="height:240px; width: 240px"/>
                <?php
        } else {
            ?>
            <img src="<?= Yii::getAlias('@web') . "/uploads/dummy.jpg" ?>" style="height:240px; width: 240px"/>
            <?php
        }
        ?>
        </div>
    </div>
</div>