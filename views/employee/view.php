    <?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Success!',
    'icon' => 'glyphicon glyphicon-hand-left',
    'body' => 'Employee is Succesfully Added!!!',
    'showSeparator' => true,
    'delay' => 200,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);
}
/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view row">
    <div class="col col-lg-12">
        <div class="col col-lg-8">
<p>
    <?= Html::a('Back', Yii::$app->request->referrer,['class' => 'glyphicon glyphicon-chevron-left btn btn-danger large']); ?>
    <span style="text-align: right;float: right;"><?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'glyphicon glyphicon-refresh btn btn-success large']) ?></span>
</p>
<h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

<!--    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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