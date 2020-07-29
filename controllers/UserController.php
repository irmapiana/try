<?php

namespace app\controllers;

use Yii;
use app\models\Muser;
use app\models\MuserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * UserController implements the CRUD actions for Muser model.
 */
class UserController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Muser models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MuserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Muser model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Muser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Muser();

        if ($model->load(Yii::$app->request->post())) {
            $model->setPassword($model->new_password);
            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
                 return $this->redirect(['index']);
            } else {
                //Yii::$app->session->setFlash('error', Yii::$app->params['gagal']);
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
     * Updates an existing Muser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        /* $groups = ArrayHelper::map(Mgroup::find()->all(), 'GROUPID', 'GROUPNAME');
          $dealers = [1 => 1, 0 => 0]; */

        if ($model->load(Yii::$app->request->post())) {

            if (!empty($model->new_password)) {

                $model->setPassword($model->new_password);
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::$app->params['update']);
            } else {
                Yii::$app->session->setFlash('error', Yii::$app->params['gagal']);
            }
            return $this->redirect(['index']);
        } else {
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
            }
            return $this->render('update', [
                        'model' => $model,
                            //  'groups' => $groups,
                            // 'dealers' => $dealers,
            ]);
        }
    }

    /**
     * Deletes an existing Muser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        // $this->findModel($id)->delete();
        // Yii::$app->session->setFlash('success', Yii::$app->params['delete']);
        Yii::$app->session->setFlash('warning', 'Pengguna Tidak Dapat Dihapus');
        return $this->redirect(Yii::$app->request->referrer);
        //return $this->redirect(['index']);
    }

    /**
     * Finds the Muser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Muser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Muser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
