<?php
$this->pageTitle=Yii::app()->name . ' - Forgot Password';
$this->breadcrumbs=array(
    'Forgot Password',
);
?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php  
    echo $form->field($resetpasswordmodel, 'password');
    echo $form->field($resetpasswordmodel, 'changepassword');
    echo $form->field($resetpasswordmodel, 'reenterpassword');
    ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>