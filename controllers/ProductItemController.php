<?php

namespace app\controllers;

use Yii;
use app\models\Dproductitem;
use app\models\DproductitemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductitemController implements the CRUD actions for Dproductitem model.
 */
class ProductItemController extends Controller
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
     * Lists all Dproductitem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DproductitemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dproductitem model.
     * @param string $productid
     * @param string $itemid
     * @return mixed
     */
    public function actionView($productid, $itemid)
    {
        return $this->render('view', [
            'model' => $this->findModel($productid, $itemid),
        ]);
    }

    /**
     * Creates a new Dproductitem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dproductitem();

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
     * Updates an existing Dproductitem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $productid
     * @param string $itemid
     * @return mixed
     */
    public function actionUpdate($productid, $itemid)
    {
        if (Yii::$app->request->isGet) {
            $session = Yii::$app->session;
            $session->set('halamanFilter', Yii::$app->request->referrer);
        }
        $spriceItem = \app\models\Mspriceitem::find()->where(['itemid' => $itemid])->one();
        $salesCommission = \app\models\Msalescommission::find()->where(['itemid' => $itemid])->one();
        $salesReward = \app\models\Msalesreward::find()->where(['itemid' => $itemid])->one();
        $schema = \app\models\Mschema::find()->where(['itemid' => $itemid])->one();
        $used = false;
        if ($spriceItem || $salesCommission || $salesReward || $schema) {
            $used = true;
        }

        $model = $this->findModel($productid, $itemid);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           Yii::$app->session->setFlash('success', Yii::$app->params['update']);
            // Jika method yang dioperasikan adalah update dan url sebelumnya adalah halaman filter index, maka redirect ke halaman filter tsb.
            if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                return $this->redirect(Yii::$app->session->get('halamanFilter'));
            } else {
                return $this->redirect(['index']);
            }
        } else {
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
            }
            return $this->render('update', [
                'model' => $model,
                'used' => $used,
            ]);
        }
    }

    /**
     * Deletes an existing Dproductitem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $productid
     * @param string $itemid
     * @return mixed
     */
    public function actionDelete($productid, $itemid)
    {
        // $spriceItem = \app\models\Mspriceitem::find()->where(['productid' => $productid, 'itemid' => $itemid])->one();
        // $salesCommission = \app\models\Msalescommission::find()->where(['productid' => $productid, 'itemid' => $itemid])->one();
        // $salesReward = \app\models\Msalesreward::find()->where(['productid' => $productid, 'itemid' => $itemid])->one();
        // $schema = \app\models\Mschema::find()->where(['productid' => $productid, 'itemid' => $itemid])->one();

        $msg = "Data tidak dapat dihapus. Data masih digunakan di tabel yang lain.";
        
        // if ($spriceItem || $salesCommission || $salesReward || $schema) {
        //     Yii::$app->session->setFlash('warning', $msg);
        // } else {
            $this->findModel($productid, $itemid)->delete();
            Yii::$app->session->setFlash('success', 'Data terhapus');
        // }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Dproductitem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $productid
     * @param string $itemid
     * @return Dproductitem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($productid, $itemid)
    {
        if (($model = Dproductitem::findOne(['productid' => $productid, 'itemid' => $itemid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
