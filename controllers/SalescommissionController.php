<?php

namespace app\controllers;

use Yii;
use app\models\Msalescommission;
use app\models\MsalescommissionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * SalescommissionController implements the CRUD actions for Msalescommission model.
 */
class SalescommissionController extends Controller
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
     * Lists all Msalescommission models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MsalescommissionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $tampil = false;


        if(Yii::$app->request->queryParams != null)
        {
            $tampil = true;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'tampil' => $tampil,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Msalescommission model.
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
     * Creates a new Msalescommission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Msalescommission();

        //$post = Yii::$app->request->post();
        $model->spriceid = $id;

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $model->spriceid = $id;
            //$model->spriceid = $post['spriceid'];
            // Pas nge save, harus di-set manual value dari tanggalnya
            $model->SCOMMISSION_VALIDFROM = $post['Msalescommission']['SCOMMISSION_VALIDFROM'];
            $model->SCOMMISSION_VALIDUNTIL = $post['Msalescommission']['SCOMMISSION_VALIDUNTIL'];
            $validFrom = strtotime($model->SCOMMISSION_VALIDFROM);
            $validUntil = strtotime($model->SCOMMISSION_VALIDUNTIL);
            $model->SCOMMISSION_VALIDFROM = date('d/m/Y',$validFrom);
            $model->SCOMMISSION_VALIDUNTIL = date('d/m/Y',$validUntil);
            $model->SCOMMISSION_VALIDFROM = new Expression("TO_DATE('" . $model->SCOMMISSION_VALIDFROM . "', 'dd/mm/yyyy')");
            $model->SCOMMISSION_VALIDUNTIL = new Expression("TO_DATE('" . $model->SCOMMISSION_VALIDUNTIL . "', 'dd/mm/yyyy')");

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
    public function actionCreateNew()
    {
        $model = new Msalescommission();
        $post = Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post())) {
            $model->spriceid = $post['spriceid'];
            // Pas nge save, harus di-set manual value dari tanggalnya
            $model->SCOMMISSION_VALIDFROM = $post['Msalescommission']['SCOMMISSION_VALIDFROM'];
            $model->SCOMMISSION_VALIDUNTIL = $post['Msalescommission']['SCOMMISSION_VALIDUNTIL'];

            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
                return $this->redirect(['index']);
            } else {
                //error
            }
        } else {
            $get = Yii::$app->request->get();
            $model = new Msalescommission();
            $from['new'] = true;
            $from['spriceid'] = $get['spriceid'];
            // var_dump($from);die();
            return $this->render('create', [
                'model' => $model,
                'from' => $from
            ]);
        }
    }

    /**
     * Updates an existing Msalescommission model.
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
        //echo $model->spriceid;die;

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            // $model->spriceid = "AGENT_PRICE";
            $model->SCOMMISSION_VALIDFROM = $post['Msalescommission']['SCOMMISSION_VALIDFROM'];
            $model->SCOMMISSION_VALIDUNTIL = $post['Msalescommission']['SCOMMISSION_VALIDUNTIL'];
            $validFrom = strtotime($model->SCOMMISSION_VALIDFROM);
            $validUntil = strtotime($model->SCOMMISSION_VALIDUNTIL);
            $model->SCOMMISSION_VALIDFROM = date('d/m/Y',$validFrom);
            $model->SCOMMISSION_VALIDUNTIL = date('d/m/Y',$validUntil);
            $model->SCOMMISSION_VALIDFROM = new Expression("TO_DATE('" . $model->SCOMMISSION_VALIDFROM . "', 'dd/mm/yyyy')");
            $model->SCOMMISSION_VALIDUNTIL = new Expression("TO_DATE('" . $model->SCOMMISSION_VALIDUNTIL . "', 'dd/mm/yyyy')");
            // var_dump($model);die();
            $model->save();

            $model = $this->findModel($id);
            Yii::$app->session->setFlash('success', Yii::$app->params['update']);
            // Jika method yang dioperasikan adalah update dan url sebelumnya adalah halaman filter index, maka redirect ke halaman filter tsb.
            if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                return $this->redirect(Yii::$app->session->get('halamanFilter'));
            } else {
                return $this->redirect(['index']);
            }
        } else {
            // Karena pas pertama kali di-load, gak sesuai formatnya, maka sesuikan dulu
            $model->SCOMMISSION_VALIDFROM = $model->SCOMMISSION_VALIDFROM ? date_create($model->SCOMMISSION_VALIDFROM)->format('Y-m-d') : "";
            $model->SCOMMISSION_VALIDUNTIL = $model->SCOMMISSION_VALIDUNTIL ? date_create($model->SCOMMISSION_VALIDUNTIL)->format('Y-m-d') : "";
            
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Msalescommission model.
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
     * Finds the Msalescommission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Msalescommission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Msalescommission::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionLists($id)
    {
        $countItem = Dproductitem::find()->where(['productid' => $id])->count();

        $items = Dproductitem::find()->where(['productid' => $id])->all();

        if($countItem>0){
            foreach($items as $item){
                echo "<option value='".$item->itemid."'>".$item->itemname."</option>";
            }
        }
        else
        {
            echo "<option value='-'>Tidak Ada Data</option>";
        }
    }
}
