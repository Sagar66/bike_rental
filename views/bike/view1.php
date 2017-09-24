<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bike */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Bikes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-view row">
    <div class="col col-lg-12">
        <div class="col col-lg-8">

    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'no_plate',
            'eng_num',
            'brand',
            'model',
            'name',
            'color',
            'details',
            'images',
      
            'is_maintained',
            //'status',
        ],
    ]) ?>
        </div>
        <div class="col col-lg-4">
            <div style="">
           <p>Bike</p>
              <?php
  
        if (!empty($model->images)) { 
            ?>
            <img src="<?= Yii::getAlias('@web') . "/uploads/" . $model->images ?>" style="height:200px; width: 300px; border-radius: 20px;"/>
            <?php
        } else {
            ?>
            <img src="<?= Yii::getAlias('@web') . "/uploads/dummy.jpg" ?>" style="height:200px; width: 280px; border-radius:20px; "/>
            <?php
        }
        ?>
            </div>
            <div class="gap">
<!--            <p>Document</p>
              <?php
//              $bikeImage = $model1->find()->select(['document'])->where(['id'=>id])->one();
//              var_dump($model1);
        if (!empty($model1->document)) { 
            ?>
            <img src="<?= Yii::getAlias('@web') . "/uploads/" . $model1->document ?>" style="height:200px; width: 300px; border-radius: 20px;"/>
            <?php
        } else {
            ?>
            <img src="<?= Yii::getAlias('@web') . "/uploads/dummy1.png" ?>" style="height:200px; width: 280px; border-radius:20px; "/>
            <?php
        }
        ?>                -->
            </div>
        </div>
</div>
</div>