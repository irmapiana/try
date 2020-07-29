<?php

namespace app\controllers;

use Yii;
use app\models\Mresource;
use app\models\MresourceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BroadcastController implements the CRUD actions for Broadcast model.
 */
class ResourceController extends Controller
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
        $searchModel = new MresourceSearch();
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
        $model = new Mresource();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                # code...
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
                return $this->redirect(['index']);
            } else {
            return $this->render('create', [
                'model' => $model,
            ]);
            }
        }else {
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
        if (Yii::$app->request->isGet) {
            $session = Yii::$app->session;
            $session->set('halamanFilter', Yii::$app->request->referrer);
            # code...
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::$app->params['update']);
            if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                 # code...
                return $this->redirect(Yii::$app->session->get('halamanFilter'));
             } else{
                return $this->redirect(['index']);
             }     
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
    
    public function actionDelete($id)
    {
        $delete = $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'data terhapus');

        //return $this->redirect(Yii::$app->request->referrer);
           return $this->redirect(Yii::$app->request->referrer);

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
        if (($model = Mresource::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
