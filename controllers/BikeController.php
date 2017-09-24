<?php

namespace app\controllers;

use Yii;
use app\models\Bike;
use app\models\BikeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BikeController implements the CRUD actions for Bike model.
 */
class BikeController extends Controller {
    
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bike models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new BikeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionList() {
        $searchModel = new BikeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionManage() {
        $searchModel = new BikeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('manage', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bike model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
                     'model1' => \app\models\BikeDoc::find()->where(['bike_fk'=>$id])->one()
        ]);
    }

    /**
     * Creates a new Bike model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Bike();
        $model1 = new \app\models\BikeDoc();
        $model2 = new \app\models\Rent();
        if ($model->load(Yii::$app->request->post())) {
        //first instance of uploaded file
            $bikeImage= UploadedFile::getInstance($model, 'images');
            //getinf file name
//            $model ->validate();
            if($bikeImage!=null){
            $model->images=$bikeImage->baseName.'.'.$bikeImage->extension;
            $bikeImage->saveAs('uploads/'.$model->images);
            }
            else{
                $model->images='dummy.jpg';
            }
             $model->save();
                 //uploaded
             
            \Yii::$app->session->setFlash('success');
        }
           if ($model1->load(Yii::$app->request->post())){
                       //first instance of uploaded file
            $bikedoc= UploadedFile::getInstance($model1, 'document');
            //getinf file name
            //$model ->validate();
            if($bikedoc!=null){
            $model1->document=$bikedoc->baseName.'.'.$bikedoc->extension;
             $bikedoc->saveAs('uploads/'.$model1->document);
            }else{
                $model1->document='dummy1.png';
            }
             $model1->save();
             
            $model1->bike_fk=$model->id;
            $model1->save();
            $model2->load(Yii::$app->request->post());
            $model2->bike_id=$model->id;
            $model2->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'model1' => $model1,
                        'model2' => $model2,
            ]);
        }
    }
    /**
     * Updates an existing Bike model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
            {
        $model = $this->findModel($id);
        $model1 = \app\models\BikeDoc::find()->where(['bike_fk'=>$model->id])->one();
          if(count($model1)!=1)
            $model1=new \app\models\BikeDoc();
        $model2= \app\models\Rent::find()->where(['bike_id'=>$model->id])->one();
        if(count($model2)!=1)
            $model2=new \app\models\Rent();

        if ($model->load(Yii::$app->request->post())) {
                    //first instance of uploaded file
            $bikeImage= UploadedFile::getInstance($model, 'images');
            //getinf file name
//            $model ->validate();
            if($bikeImage!=null){
            $model->images=$bikeImage->baseName.'.'.$bikeImage->extension;
            $bikeImage->saveAs('uploads/'.$model->images);
            }
            else{
                $model->images='dummy.jpg';
            }
             $model->save();
                 //uploaded
             
            \Yii::$app->session->setFlash('success');
        }
            if ($model1->load(Yii::$app->request->post())){
            //first instance of uploaded file
            $bikedoc= UploadedFile::getInstance($model1, 'document');
            //getinf file name
            //$model ->validate();
            if($bikedoc!=null){
            $model1->document=$bikedoc->baseName.'.'.$bikedoc->extension;
             $bikedoc->saveAs('uploads/'.$model1->document);
            }else{
                $model1->document='dummy1.png';
            }
             $model1->save();
            $model2->load(Yii::$app->request->post());
            $model2->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'model1' => $model1,
                         'model2'=>$model2,
            ]);
        }
    }

    /**
     * Deletes an existing Bike model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        
        \app\models\Rent::deleteAll(['bike_id'=>$id]);
        \app\models\BikeDoc::deleteAll(['bike_fk'=>$id]);
        \app\models\Bike::deleteAll(['id'=>$id]);
       // $this->findModel($id)->delete();
            \Yii::$app->session->setFlash('success');

        return $this->redirect(['manage']);
    }

    /**
     * Finds the Bike model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bike the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Bike::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
