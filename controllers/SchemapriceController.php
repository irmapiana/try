<?php 

namespace app\controllers;

use Yii;
use app\models\Mschemaprice;
use app\models\MschemapriceSearch;
use yii\web\Controller;
use yii\web\NotFountHttpException;
use yii\filters\VerbFilter;

/**
 * SchemaController implements the CRUD actions for Mschema model.
 */
class SchemapriceController extends Controller
{
    
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
        # code...
    }
    /**
     * Lists all Mschema models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MschemapriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

        /**
     * Displays a single Mschema model.
     * @param string $SCHEMAID
     * @param string $sch_updatedD
     * @return mixed
     */
    public function actionView($spriceid, $sch_updated)
    {
        return $this->render('view', [
            'model' => $this->findModel($spriceid, $sch_updated),
        ]);
    }

    /**
     * Creates a new Mschema model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mschemaprice();

        if ($model->load(Yii::$app->request->post())) {
            $model->sch_updated = "1";
            ($model->save());

                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
                return $this->redirect(['index']);
                # code...
            }else{
            return $this->render('create',[
                'model' => $model,
            ]);
            # code...
    }
}
    /**
     * Updates an existing Mschema model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $SCHEMAID
     * @param string $sch_updatedD
     * @return mixed
     */
    public function actionUpdate($spriceid, $sch_updated)
    {
        if (Yii::$app->request->isGet) {
            $session = Yii::$app->session;
            $session->set('halamanFilter', Yii::$app->request->referrer);
            # code...
        }
        $model = $this->findModel($spriceid, $sch_updated);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::$app->params['update']);
            // Jika method yang dioperasikan adalah update dan url sebelumnya adalah halaman filter index, maka redirect ke halaman filter tsb.
            # code...
            if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                return $this->redirect(Yii::$app->session->get('halamanFilter'));
            }else{
                return $this->redirect(['index']);
            }
        }else{
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
                # code...
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mschema model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $SCHEMAID
     * @param string $sch_updatedD
     * @return mixed
     */

    public function actionDelete($spriceid, $sch_updated)
    {
        $this->findModel($spriceid, $sch_updated)->delete();
        Yii::$app->session->setFlash('success', Yii::$app->params['Data Terhapus']);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mschema model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $SCHEMAID
     * @param string $sch_updatedD
     * @return Mschema the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($spriceid, $sch_updated)
    {
        if(($model = Mschemaprice::findOne(['spriceid'=>$spriceid, 'sch_updated'=>$sch_updated])) !== null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');  
        }
    }
}
?>