<?php

namespace app\controllers;

use Yii;

public function actionResetProfilePassword()
{
    $resetpasswordmodel = new ResetProfilePasswordForm();
    if ($resetpasswordmodel->load(Yii::$app->request->post())) {
        $user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
        # here we run our validation rules on the model
        if ($resetpasswordmodel->validate()) {
            # if it is ok - setting the password property of user
            $user->password = $resetpasswordmodel->changepassword;
            # and finally save it
            $user->save();
     }
     return $this->render('ResetProfilePassword', [
         'resetpasswordmodel' => $resetpasswordmodel
     ]);
}
}