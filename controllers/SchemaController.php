<?php

namespace app\controllers;

use Yii;
use app\models\Mschema;
use app\models\MschemaSearch;
use app\models\Dproductitem;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchemaController implements the CRUD actions for Mschema model.
 */
class SchemaController extends Controller
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
     * Lists all Mschema models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MschemaSearch();
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
    public function actionView($schemaid, $sch_updated)
    {
        return $this->render('view', [
            'model' => $this->findModel($schemaid, $sch_updated),
        ]);
    }

    /**
     * Creates a new Mschema model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mschema();
        
        if ($model->load(Yii::$app->request->post())) {
            $model->sch_updated = "1";
            $model->save();
         
            Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
                return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mschema model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $SCHEMAID
     * @param string $sch_updatedD
     * @return mixed
     */
    public function actionUpdate($schemaid, $sch_updated)
    {
        if (Yii::$app->request->isGet) {
            $session = Yii::$app->session;
            $session->set('halamanFilter', Yii::$app->request->referrer);
        }
        $model = $this->findModel($schemaid, $sch_updated);

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
    public function actionDelete($schemaid, $sch_updated)
    {
        $this->findModel($schemaid, $sch_updated)->delete();
        Yii::$app->session->setFlash('success', Yii::$app->params['delete']);

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
    protected function findModel($schemaid, $sch_updated)
    {
        if (($model = Mschema::findOne(['schemaid' => $schemaid, 'sch_updated' => $sch_updated])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLists($id)
    {
        $countProductitems = Dproductitem::find()->where(['productid' => $id])->count();

        $productitems = Dproductitem::find()->where(['productid' => $id])->orderBy('productid DESC')->all();

        if($countProductitems>0){
            echo "<option value=''disabled selected></option>";
            foreach($productitems as $productitem){
                echo "<option value='".$productitem->productid."'>".$productitem->itemname."</option>";
            }
        }
        else{
            echo "<option value='-'>Tidak Ada Data</option>";
        }
    }
}
