<?php

namespace app\controllers;

use Yii;
use app\models\Admin;
use app\models\AdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class SettingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('list');
    }

    public function actionList()
    {
    	$searchModel = new \app\models\AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
        public function actionView($id)
    {
        return $this->render('view', [
            'model' => \app\models\Admin::findOne($id),
        ]);
    }
  
     public function actionCreate()
    {
        $model = new Admin();

        if ($model->load(Yii::$app->request->post()) ) {
           
            $model->password=md5($model->password);
           if($model->save()){
               \Yii::$app->session->setFlash('success');
            return $this->redirect(['view', 'id' => $model->id]);
            }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        } } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
              $model->password=md5($model->password);
              
            if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
  
    public function actionManage(){
        $searchModel = new \app\models\AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('manage', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        \Yii::$app->session->setFlash('success');
        return $this->redirect(['manage']);
    }

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionPasschange($id)
    {
       return $this->render('passchange', [
                     'model1' => Admin::find()->where(['id'=>$id])->one()
        ]);
    }
}

