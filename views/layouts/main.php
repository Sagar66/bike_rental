<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
$controller=Yii::$app->controller->id;
$action=Yii::$app->controller->action->id;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Bike Rental System',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            Yii::$app->user->isGuest ?'':['label' => 'Home', 'url' => ['/site/index']],
            Yii::$app->user->isGuest ?'':['label' => 'Employees', 'url' => ['/employee/index']],
            Yii::$app->user->isGuest ?'':['label' => 'Bikes', 'url' => ['/bike/index']],
            Yii::$app->user->isGuest ?'':['label' => 'Bike Rents', 'url' => ['/bike-rent/index']],
            Yii::$app->user->isGuest ?'':['label' => 'Customer', 'url' => ['/customer/index']],
            ['label' => 'AboutUs', 'url' => ['/site/about']],
            //Yii::$app->user->isGuest ?'':['label' => 'ContactUs', 'url' => ['/site/contact']], 
            Yii::$app->user->isGuest?'':((Yii::$app->user->identity->username=='admin' || Yii::$app->user->identity->username=='sagar')?['class' => 'btn btn-link glyphicon glyphicon-cog','label' => 'Settings', 'url' => ['/setting/list']]:''),
                 Yii::$app->user->isGuest ? (
                                ['label' => '']
                                ) : (
                                '<li>'
                                . Html::beginForm(['/site/logout'], 'post')
                                . Html::submitButton(
                                        ' Logout ('. Yii::$app->user->identity->username.')', ['class' => 'btn btn-link large glyphicon glyphicon-log-in']
                                )
                                . Html::endForm()
                                . '</li>'
                                )
                    ],
                ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class='<?= ($controller=='site'&&$action=='index')?'col-lg-12 my':'col-lg-10 my'?>'>
        <?= $content ?>
        </div>
<?php if(($controller=='site'&&$action!='index')||$controller!='site'){?>
        <div class="col-lg-2" style="float: right;">
       <?php
        switch($controller){
            case 'setting':
           echo $this->render('setting');
           break;
       case 'customer':
           echo $this->render('customer');
           break;
            case 'bike':
               echo $this->render('bike');
                break;
            case 'bike-rent':
                echo $this->render('rent');
                break;
            case 'employee':
                  echo $this->render('employee');
                  break;
                   case 'department':
                  echo $this->render('employee');
                  break;
                   case 'position':
                  echo $this->render('employee');
                  break;
                default:
                echo $this->render('nomenu');
        }
       ?>
        </div>
        <?php 
    }
        ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Bike Rental System <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
