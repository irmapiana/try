<?php

namespace app\controllers;

use Yii;
use app\models\MsellingFeeitem;
use app\models\MsellingFeeitemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\db\Expression;

/**
 * SellpriceController implements the CRUD actions for Msellprice model.
 */
class SellingFeeItemController extends Controller
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
     * Lists all Msellprice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MsellingFeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Msellprice model.
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
     * Creates a new Msellprice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MsellingFeeitem();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            $model->load(Yii::$app->request->post());
            $model->sfitem_validfrom = $post['MsellingFeeitem']['sfitem_validfrom'];
            $model->sfitem_validuntil = $post['MsellingFeeitem']['sfitem_validuntil'];
           // echo $model->SPRICE_VALIDFROM;
           // die;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
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
     * Updates an existing Msellprice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->isGet) {
            $session = Yii::$app->session;
            $session->set('halamanFilter', Yii::$app->request->referrer);
        }
        $spriceItem = \app\models\Mpurchasepriceitem::find()->where(['spriceid' => $id])->one();
        $schema = \app\models\Mschema::find()->where(['spriceid' => $id])->one();

        $used = false;
        if ($spriceItem || $schema) {
            $used = true;
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            $model->load(Yii::$app->request->post());
            $model->sfitem_validfrom = $post['MsellingFeeitem']['sfitem_validfrom'];
            $model->sfitem_validuntil = $post['MsellingFeeitem']['sfitem_validuntil'];
            $validDate = strtotime($model->sfitem_validfrom);
            $untilDate = strtotime($model->sfitem_validuntil);
            $model->sfitem_validfrom = date('d-m-Y',$validDate);
            $model->sfitem_validfrom = date('d-m-Y',$untilDate);


            if ($model->save()) {
                //  $model = $this->findModel($id);
                Yii::$app->session->setFlash('success', Yii::$app->params['update']);
                // Jika method yang dioperasikan adalah update dan url sebelumnya adalah halaman filter index, maka redirect ke halaman filter tsb.
                if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                    return $this->redirect(Yii::$app->session->get('halamanFilter'));
                } else {
                    return $this->redirect(['index']);
                }
            }
        } else {
            // Karena pas pertama kali di-load, gak sesuai formatnya, maka sesuikan dulu
            $model->sfitem_validfrom = $model->sfitem_validfrom ? date_create($model->sfitem_validfrom)->format('Y-m-d') : "";
            $model->sfitem_validuntil = $model->sfitem_validuntil ? date_create($model->sfitem_validuntil)->format('Y-m-d') : "";
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
     * Deletes an existing Msellprice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $msellingFeeitem = \app\models\MsellingFeeitem::find()->where(['spriceid' => $id])->one();
        $schema = \app\models\Mschema::find()->where(['spriceid' => $id])->one();

        $msg = "Data tidak dapat dihapus. Data masih digunakan di tabel yang lain.";
        
        if ($spriceItem || $schema) {
            Yii::$app->session->setFlash('warning', $msg);
        } else {
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', 'Data terhapus');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Msellprice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Msellprice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MsellingFeeitem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
