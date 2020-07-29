<?php

namespace app\controllers;

use Yii;
use app\models\Maccount;
use app\models\MaccountSearch;
use app\models\Trewcontrol;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccountController implements the CRUD actions for Maccount model.
 */
class AccountController extends Controller
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
     * Lists all Maccount models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Maccount model.
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
     * Creates a new Maccount model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();

        $model = new Maccount();
        $modelrewcontrol = new Trewcontrol();

        if ($model->load(Yii::$app->request->post())) {

            $modelrewcontrol->userid = $model->userid;
            $modelrewcontrol->bbalance = $model->bbalance;
            $modelrewcontrol->debit = 0;
            $modelrewcontrol->credit = 0;

            if($model->save() && $modelrewcontrol->save()){
                $transaction->commit();
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
                return $this->redirect(['index']);
            }
            else{
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', "Ada kesalahan saat menyimpan data");
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
     * Updates an existing Maccount model.
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
        $schema = \app\models\Mschema::find()->where(['orgid' => $id])->one();
        $accmutationtmp = \app\models\Taccmutationtmp::find()->where(['userid' => $id])->one();
        $used = false;
        if ($schema || $accmutationtmp) {
            $used = true;
        }

        $model = $this->findModel($id);
        if ($model && $model->rewcontrol) {
            $model->bbalance = $model->rewcontrol->bbalance;
        }

        if ($model->load(Yii::$app->request->post())) {
            $connection = \Yii::$app->db;
            $transaction = $connection->beginTransaction();
            if ($model->rewcontrol) {
                $model->rewcontrol->userid = $model->userid;
                $model->rewcontrol->bbalance = empty($model->bbalance) ? 0 : $model->bbalance;
                $model->rewcontrol->save();
            } else {
                //create new acc control based on this account
                $modelcontrol = new Trewcontrol();
                $modelcontrol->userid = $model->userid;
                $modelcontrol->bbalance = $model->bbalance == '' ? 0 : $model->bbalance;
                $modelcontrol->save();
            }

            if($model->save()){
                $transaction->commit();
                Yii::$app->session->setFlash('success', Yii::$app->params['update']);
                // Jika method yang dioperasikan adalah update dan url sebelumnya adalah halaman filter index, maka redirect ke halaman filter tsb.
                if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                    return $this->redirect(Yii::$app->session->get('halamanFilter'));
                } else {
                    return $this->redirect(['index']);
                }
            } else {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', "Ada kesalahan saat menyimpan data");
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
     * Deletes an existing Maccount model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // $schema = \app\models\Mschema::find()->where(['ORGID' => $id])->one();
        // $accmutationtmp = \app\models\Taccmutationtmp::find()->where(['userid' => $id])->one();
        
        // if ($schema || $accmutationtmp) {
        //     Yii::$app->session->setFlash('warning', 'Data tidak dapat dihapus. Data masih digunakan di tabel yang lain.');
        // } else {
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', 'Data terhapus');
        //Yii::$app->session->setFlash('warning', 'Pengguna Tidak Dapat Dihapus');
        // }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Maccount model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Maccount the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Maccount::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
