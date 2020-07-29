<?php

namespace app\controllers;

use Yii;
use app\models\Muserschemaprice;
use app\models\MuserschemapriceSearch;
use app\models\Mschemaprice;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class UserschemapriceController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete'=> ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new MuserschemapriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($userid)
    {
        return $this->render('view', [
            'model' => $this->findModel($userid),
        ]);
    }

    public function actionCreate()
    {
        $model = new Muserschemaprice();

        if ($model->load(Yii::$app->request->post())) {
            $model->save(false);

            Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
            return $this->redirect(['index']);
            # code...
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->request->isGet) {
            $session = Yii::$app->session;
            $session->set('halamanFilter', Yii::$app->request->referrer);
            # code...
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            Yii::$app->session->setFlash('success',YIi::$app->params['update']);
            # code...
            if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                return $this->redirect(Yii::$app->session->get('halamanFilter'));
                # code...
            } else {
                return $this->redirect(['index']);
            }
        } else {
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
                # code...
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', Yii::$app->params['delete']);

        return $this->redirect(['index']);
    }

    protected function findModel($userid)
    {
        if (($model = Muserschemaprice::findOne(['userid' => $userid])) !== null) {
            return $model;
            # code...
        } else {
            throw new NotFoundHttpException('The Requested Page does not Exist.');
            
        }
    }
}

?>