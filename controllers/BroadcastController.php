<?php

namespace app\controllers;

use Yii;
use app\models\Broadcast;
use app\models\BroadcastSearch;
use yii\web\Controller;
use yii\httpclient\Client;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\DynamicModel;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\activeDataProvider;

/**
 * BroadcastController implements the CRUD actions for Broadcast model.
 */
class BroadcastController extends Controller
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
     * Lists all Broadcast models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BroadcastSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Broadcast model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Broadcast model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Broadcast();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
                return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

     /**
     * Updates an existing Broadcast model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::$app->params['update']); 
            return $this->redirect(['index']);
        } else {
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    

      /**
     * Send Notiffication.
     */    
	public function actionSend($id) {

        $model = $this->findModel($id);

        $client = new Client();

        $payload = array(
            'id' => "",
            'tag' => "announcement",
            'title' => $model->TITLE,
            'to' => "",
            'message' => $model->MESSAGE
        );
        $header = array(
          'ssid'=>"",
			'activityID'=>"",
			'timeStamp'=>"",
			'version'=>"1.0"
        );
        $data = array('header'=>$header, 'payload'=>$payload);

        $json = json_encode($data);
        
        var_dump($json);
        die();

        $response = $client->createRequest()
                ->setMethod('post')
                //->setUrl(Yii::$app->params['k_url_notification_broadcast'])
                ->setUrl(Yii::$app->params['k_url_broadcast_notification'])
                 ->addHeaders(['content-type' => 'application/json'])
                 ->setContent($json)
                ->send();
        if ($response->isOk) {
            Yii::$app->session->setFlash('success', Yii::$app->params['notifsukses']);
        } else {
            Yii::$app->session->setFlash('error', Yii::$app->params['notifgagal']);
        }
                   return $this->redirect(['index']);

    }

    /**
     * Finds the Broadcast model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Broadcast the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
   // protected function findModel($id)
    //{
       // if (($model = Broadcast::findOne($id)) !== null) {
          //  return $model;
        //} else {
           // throw new NotFoundHttpException('The requested page does not exist.');
        //}
   // }
  //      public function actionDelete($id)
    //{
       // $this->findModel($id)->delete();
        //return $this->redirect(['index']);
    //}
    
        public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', Yii::$app->params['delete']);

        //return $this->redirect(Yii::$app->request->referrer);
           return $this->redirect(['index']);

    }


    /**
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Broadcast::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
