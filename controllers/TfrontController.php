<?php

namespace app\controllers;

use Yii;
use app\models\Tfront;
use app\models\TfrontSearch;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TfrontController implements the CRUD actions for Tfront model.
 */
class TfrontController extends Controller
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
     * Lists all Tfront models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TfrontSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $connection = Yii::$app->getDb();
        $sql="SELECT substring(pgp_sym_decrypt(enc_subscriber_id, current_setting('mbb.key'), 'cipher-algo=3des'),1,6) 
||
'XXXXXXXX'
||
substring(pgp_sym_decrypt(enc_subscriber_id, current_setting('mbb.key'), 'cipher-algo=3des'),15,2) as enc_subscriber_id 
,front_trxid, subscriber_name, userid, accountno, productid, itemid, amount, admin_fee, purchase_price, selling_fee, rc, settlflag
from t_front
where productid = 'CCARD'
union
select 
substring(pgp_sym_decrypt(enc_subscriber_id, current_setting('mbb.key'), 'cipher-algo=3des'),1,6) 
||
'XXXXXXXX'
||
substring(pgp_sym_decrypt(enc_subscriber_id, current_setting('mbb.key'), 'cipher-algo=3des'),15,2) as enc_subscriber_id ,
front_trxid, subscriber_name, userid, accountno, productid, itemid, amount, admin_fee, purchase_price, selling_fee, rc, settlflag
from t_front
where productid <> 'CCARD' and itemid = 'BRIZZI'  
union
select 
pgp_sym_decrypt(enc_subscriber_id, current_setting('mbb.key'), 'cipher-algo=3des') as enc_subscriber_id 
,front_trxid, subscriber_name, userid, accountno, productid, itemid, amount, admin_fee, purchase_price, selling_fee, rc, settlflag
from t_front
where productid <> 'CCCARD' and itemid <> 'BRIZZI'";
$command = $connection->createCommand($sql);
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        $this->actionIndex();
    }

    /**
     * Displays a single Tfront model.
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
     * Creates a new Tfront model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tfront();

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
     * Updates an existing Tfront model.
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
     * Deletes an existing Tfront model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', Yii::$app->params['delete']);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tfront model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Tfront the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tfront::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
