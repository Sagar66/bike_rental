<?php

namespace app\controllers;

use Yii;
use app\models\BikeRent;
use app\models\BikeRentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BikeRentController implements the CRUD actions for BikeRent model.
 */
class BikeRentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
     * Lists all BikeRent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BikeRentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionList()
    {
        $searchModel = new BikeRentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionManage()
    {
        $searchModel = new BikeRentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['status'=>'Booked']);

        return $this->render('manage', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BikeRent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BikeRent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BikeRent();

        if ($model->load(Yii::$app->request->post())) {
            $model->start_from= strtotime($model->start_from);
            $model->end_to= strtotime($model->end_to);
            if($model->save())
            $model1= \app\models\Bike::findOne($model->bike_fk);
            $model1->status='Not Available';
            $model1->save();
             \Yii::$app->session->setFlash('success');
            return $this->redirect(['manage', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BikeRent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $bike= \app\models\Bike::findOne($model->bike_fk);
        $bike->status='Available';
        $bike->save();
        $model->status='Returned';
        $model->end_to= strtotime(date('Y-m-d'));
        $model->save();
            return $this->redirect(['manage']);
            \Yii::$app->session->setFlash('success');
        
    }

    /**
     * Deletes an existing BikeRent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        \Yii::$app->session->setFlash('success');

        return $this->redirect(['manage']);
    }

    /**
     * Finds the BikeRent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BikeRent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BikeRent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
