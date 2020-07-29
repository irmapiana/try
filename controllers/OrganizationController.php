<?php

namespace app\controllers;

use Yii;
use app\models\Morg;
use app\models\MorgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * OrganizationController implements the CRUD actions for Morg model.
 */
class OrganizationController extends Controller
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
     * Lists all Morg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MorgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Morg model.
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
     * Creates a new Morg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Morg();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
                return $this->redirect(['index']);
        } else {
            $dataParent = ArrayHelper::map(Morg::find()->all(), 'PARENT_ORGID', 'concat');
            return $this->render('create', [
                'model' => $model,
                'dataParent' => $dataParent,
            ]);
        }
    }

    /**
     * Updates an existing Morg model.
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
        $post = Yii::$app->request->post();
        // $post['Morg']['BALANCE'] = intval($post['Morg']['BALANCE']);
        // var_dump($post['Morg']['BALANCE']);die();
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
            $dataParent = ArrayHelper::map(Morg::find()->all(), 'ORGID', 'concat');
            return $this->render('update', [
                'model' => $model,
                'dataParent' => $dataParent,
            ]);
        }
    }

    /**
     * Deletes an existing Morg model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // $org = \app\models\Morg::find()->where(['PARENT_ORGID' => $id])->one();
        // $schema = \app\models\Mschema::find()->where(['ORGID' => $id])->one();

        $dataSchema = \app\models\Mschema::find()->where('ORGID = :id',[':id' => $id])->one();
        $dataFront = \app\models\Tfront::find()->where('ORGID = :id',[':id' => $id])->one();
        $dataOrg = \app\models\Morg::find()->where('PARENT_ORGID = :id',['id' => $id])->one();

        if ($dataOrg != null && $dataSchema != null && $dataFront != null) {
            Yii::$app->session->setFlash('warning', 'Data tidak dapat dihapus. Data masih digunakan pada tabel lain.');
        } 
        else {
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', 'Data terhapus');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Morg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Morg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Morg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
