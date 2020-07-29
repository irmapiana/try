<?php

namespace app\controllers;

use Yii;
use app\models\Mmconfig;
use app\models\MmconfigSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class MconfigController extends Controller
{
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

    public function actionIndex()
    {
        $searchModel = new MmconfigSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryPArams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function ActionView($identifier)
    {
        return $this->render('view', [
            'model' => $this->findModel($identifier),
        ]);
    }

    public function actionCreate()
    {
        $model = new Mmconfig();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
                # code...
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            # code...
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($identifier)
    {
        if(Yii::$app->request->isGet){
            $session = Yii::$app->session;
            $session->set('halamanFilter', Yii::$app->request->referrer);
        }
        $model = $this->findModel($identifier);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::$app->params['update']);
            if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                return $this->redirect(Yii::$app->session->get('halamanFilter'));
                # code...
            }else{
                return $this->redirect(['index']);
            }
            # code...
        }else {
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
                # code...
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    public function actionDelete($identifier)
    {
        $this->findModel($identifier)->delete();
        Yii::$app->session->setFlash('success',Yii::$app->params['delete']);

        return $this->redirect(['index']);
    }

    protected function findModel($identifier)
    {
        if (($model = Mmconfig::findOne(['identifier' => $identifier])) !== null) {
            return $model;
            # code...
        }else{
            throw new NotFoundHttpException('The requested page does note exist');
        }
    }
    
}


?>