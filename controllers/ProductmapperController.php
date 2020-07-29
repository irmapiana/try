<?php

namespace app\controllers;

use Yii;
use app\models\Mproductmapper;
use app\models\MproductmapperSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MgroupController implements the CRUD actions for MGroup model.
 */
class ProductmapperController extends Controller
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
     * Lists all MGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MproductmapperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MGroup model.
     * @param string $id
     * @return mixed
     */
    public function actionView($productid1)
    {
        return $this->render('view', [
            'model' => $this->findModel($productid1),
        ]);
    }

    /**
     * Creates a new MGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mproductmapper();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
                # code...
                return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,    
            ]);

        }
    } else {
        return $this->render('create', [
            'model' => $model,
        ]);
    }
}

    /**
     * Updates an existing MGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($productid1)
    {
        if (Yii::$app->request->isGet) {
            $session = Yii::$app->session;
            $session->set('halamanFilter', Yii::$app->request->referrer);
            # code...
        }

        $model = $this->findModel($productid1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::$app->params['update']);
            if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                # code...
                return $this->redirect(Yii::$app->session->get('halamanFilter'));
            }else{
                return $this->redirect(['index']);
            }
            
        } else {
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error',$message);
                # code...
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($productid1)
    {
        $delete = $this->findModel($productid1)->delete();
        Yii::$app->session->setFlash('success', 'Data Terhapus');

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the MGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($productid1)
    {
        if (($model = Mproductmapper::findOne(['productid1' => $productid1])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
