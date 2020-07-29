<?php

namespace app\controllers;

use Yii;
use app\models\Mregcommission;
use app\models\MregcommissionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * MregcommissionController implements the CRUD actions for Mregcommission model.
 */
class MregcommissionController extends Controller
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
     * Lists all Mregcommission models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MregcommissionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mregcommission model.
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
     * Creates a new Mregcommission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mregcommission();
        $post = Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post())) {
            // Cek dulu apakah sudah ada data dengan ID yang sama atau tidak
            $exist = Mregcommission::find()->where(['RCOMMISSIONID' => $post['Mregcommission']['RCOMMISSIONID']])->one();
            // var_dump($exist);die();
            if ($exist) {
                Yii::$app->session->setFlash('error', "Data dengan ID ini sudah ada. Silahkan isi dengan ID yang berbeda.");
                return $this->redirect(Yii::$app->request->referrer);
            }
            $model->RCOMMISSION_VALIDFROM = $post['Mregcommission']['RCOMMISSION_VALIDFROM'];
            $model->RCOMMISSION_VALIDUNTIL = $post['Mregcommission']['RCOMMISSION_VALIDUNTIL'];

            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
                return $this->redirect(['index']);
            } else {
                //error
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mregcommission model.
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            $model->RCOMMISSION_VALIDFROM = $post['Mregcommission']['RCOMMISSION_VALIDFROM'];
            $model->RCOMMISSION_VALIDUNTIL = $post['Mregcommission']['RCOMMISSION_VALIDUNTIL'];

            $model->save();

            Yii::$app->session->setFlash('success', Yii::$app->params['update']);
            // Jika method yang dioperasikan adalah update dan url sebelumnya adalah halaman filter index, maka redirect ke halaman filter tsb.
            if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                return $this->redirect(Yii::$app->session->get('halamanFilter'));
            } else {
                return $this->redirect(['index']);
            }
        } else {
            // Karena pas pertama kali di-load, gak sesuai formatnya, maka sesuikan dulu
            $model->RCOMMISSION_VALIDFROM = $model->RCOMMISSION_VALIDFROM ? date_create($model->RCOMMISSION_VALIDFROM)->format('d-m-Y') : "";
            $model->RCOMMISSION_VALIDUNTIL = $model->RCOMMISSION_VALIDUNTIL ? date_create($model->RCOMMISSION_VALIDUNTIL)->format('d-m-Y') : "";
            
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
            }
            // var_dump($model);die();
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mregcommission model.
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
     * Finds the Mregcommission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mregcommission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mregcommission::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
