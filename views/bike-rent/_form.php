 <?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
$model->start_from= date('Y-m-d');
$model->admin_fk=Yii::$app->user->id;
/* @var $this yii\web\View */
/* @var $model app\models\BikeRent */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="bike-rent-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bike_fk')->widget(Select2::classname(), [
    'data' => yii\helpers\ArrayHelper::map(app\models\Bike::find()->where(['status'=>'Available'])->all(),'id','brand'),
    'options' => ['placeholder' => 'Select a Bike  ....'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>

    <?= $form->field($model, 'customer_fk')->widget(Select2::classname(), [
    'data' =>yii\helpers\ArrayHelper::map(app\models\Customer::find()->all(),'id','full_name'),
    'options' => ['placeholder' => 'Select Customer ....'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>

            <?= $form->field($model, 'start_from')->hiddenInput()->label(false);?>
    
    <?= $form->field($model, 'end_to')->widget( DatePicker::className(), [
        // inline too, not bad
         'pluginOptions'=>['autoclose'=>true,'format'=>'yyyy-mm-dd']
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
      
])?>

    <?= $form->field($model, 'purpose')->textarea(['rows' => 4,'maxlength' => true]) ?>

    <?= $form->field($model, 'admin_fk')->hiddenInput()->label(false);?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success large' : 'btn btn-primary large']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
