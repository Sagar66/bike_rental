<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 " style="background-color: transparent">
        
    </div>
    <div class="col-md-4 sl">
            <div class="login_head">
                <h1>Please Login!</h1>
            </div>
            

            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'form-horizontal'],
//                        'fieldConfig' => [
//                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
//                        ],
            ]);
            ?>

            <?=  $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?=
            $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-lg-offset-1 col-lg-6\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ])
            ?>
            <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
            </div>
            </div>
            <?php ActiveForm::end(); ?>
        <div class="col-md-4">
            
    </div>
    <div class="row">
    
    </div>
</div>
