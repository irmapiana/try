<?php

namespace app\controllers;

use Yii;
use app\models\Inflokasi;
use app\models\InflokasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LokasiController implements the CRUD actions for Inflokasi model.
 */
class LokasiController extends Controller
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
     * Lists all Inflokasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InflokasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inflokasi model.
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
     * Creates a new Inflokasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inflokasi();

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
     * Updates an existing Inflokasi model.
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
     * Deletes an existing Inflokasi model.
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
     * Finds the Inflokasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Inflokasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inflokasi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
     public function actionKabupaten($id)
    {
        $countPropinsi = Inflokasi::find()->where(['LOKASI_PROPINSI' => $id])->count();

        $kabupaten = Inflokasi::find()->where(['LOKASI_PROPINSI' => $id,'LOKASI_KECAMATAN'=>0,'LOKASI_KELURAHAN'=>0])->andWhere(['!=', 'LOKASI_KABUPATENKOTA', 0])->orderBy('LOKASI_NAMA DESC')->all();

        if($countPropinsi>0){
            echo "<option value=''disabled selected></option>";
            foreach($kabupaten as $kabupaten){
                echo "<option value='".$kabupaten->LOKASI_NAMA."'>".$kabupaten->LOKASI_NAMA."</option>";
            }
        }
        else{
            echo "<option value='-'>Tidak Ada Data</option>";
        }
    }
    
     public function actionKecamatan($idProv, $idKab)
    {
       
        $kecamatan = Inflokasi::find()->where(['LOKASI_PROPINSI' => $idProv,'LOKASI_KABUPATENKOTA'=>$idKab,'LOKASI_KELURAHAN'=>0])->andWhere(['!=', 'LOKASI_KECAMATAN', 0])->orderBy('LOKASI_NAMA DESC')->all();
        $countKecamatan = count($kecamatan);
        if($countKecamatan>0){
            echo "<option value=''disabled selected></option>";
            foreach($kabupaten as $kabupaten){
                echo "<option value='".$kecamatan->LOKASI_NAMA."'>".$kecamatan->LOKASI_NAMA."</option>";
            }
        }
        else{
            echo "<option value='-'>Tidak Ada Data</option>";
        }
    }
    
   

}
