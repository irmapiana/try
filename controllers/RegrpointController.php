<?php

namespace app\controllers;

use Yii;
use app\models\Mregrpoint;
use app\models\MregrpointSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * RegrpointController implements the CRUD actions for Mregrpoint model.
 */
class RegrpointController extends Controller
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
     * Lists all Mregrpoint models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MregrpointSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mregrpoint model.
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
     * Creates a new Mregrpoint model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->request->isGet) {
            $session = Yii::$app->session;
            $session->set('halamanFilter', Yii::$app->request->referrer);
        }
        $model = new Mregrpoint();
        $post = Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post())) {
            // Cek dulu apakah sudah ada data dengan ID yang sama atau tidak
            $exist = Mregrpoint::find()->where(['RRPOINTID' => $post['Mregrpoint']['RRPOINTID']])->one();
            // var_dump($exist);die();
            if ($exist) {
                Yii::$app->session->setFlash('error', "Data dengan ID ini sudah ada. Silahkan isi dengan ID yang berbeda.");
                return $this->redirect(Yii::$app->request->referrer);
            }
            $model->RRPOINT_VALIDFROM = $post['Mregrpoint']['RRPOINT_VALIDFROM'];
            $model->RRPOINT_VALIDUNTIL = $post['Mregrpoint']['RRPOINT_VALIDUNTIL'];
            // $model->RRPOINT_VALIDUNTIL = $post['Mregrpoint']['RRPOINT_VALIDUNTIL'];

            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
                // Jika method yang dioperasikan adalah update dan url sebelumnya adalah halaman filter index, maka redirect ke halaman filter tsb.
                if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                    return $this->redirect(Yii::$app->session->get('halamanFilter'));
                } else {
                    return $this->redirect(['index']);
                }
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
     * Updates an existing Mregrpoint model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            $model->RRPOINT_VALIDFROM = $post['Mregrpoint']['RRPOINT_VALIDFROM'];
            $model->RRPOINT_VALIDUNTIL = $post['Mregrpoint']['RRPOINT_VALIDUNTIL'];

            $model->save();

            Yii::$app->session->setFlash('success', Yii::$app->params['update']);
            return $this->redirect(['index']);
        } else {
            // Karena pas pertama kali di-load, gak sesuai formatnya, maka sesuikan dulu
            $model->RRPOINT_VALIDFROM = $model->RRPOINT_VALIDFROM ? date_create($model->RRPOINT_VALIDFROM)->format('d-m-Y') : "";
            $model->RRPOINT_VALIDUNTIL = $model->RRPOINT_VALIDUNTIL ? date_create($model->RRPOINT_VALIDUNTIL)->format('d-m-Y') : "";
            
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
     * Deletes an existing Mregrpoint model.
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
     * Finds the Mregrpoint model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mregrpoint the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mregrpoint::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
