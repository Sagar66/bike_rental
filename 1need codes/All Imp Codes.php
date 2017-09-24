
Back and Update buttons
<p>
    <?= Html::a('Back', Yii::$app->request->referrer,['class' => 'glyphicon glyphicon-chevron-left btn btn-danger large']); ?>
    <span style="text-align: right;float: right;"><?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'glyphicon glyphicon-refresh btn btn-success large']) ?></span>
</p>


Danger growled
<?=
use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
    'type' => Growl::TYPE_WARNING,
    'title' => 'Warning!',
    'icon' => 'glyphicon glyphicon-exclamation-sign',
    'body' => 'The Delete Action Completed Successfully!!!',
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

Type Success::
        use kartik\growl\Growl;
use yii\web\Session;
$session=new Session();
if($session->hasFlash('success')){
    echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => '',
    'icon' => 'glyphicon glyphicon-ok',
    'body' => 'The Action Completed Successfully!!!',
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



