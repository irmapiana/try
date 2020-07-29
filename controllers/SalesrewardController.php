<?php

namespace app\controllers;

use Yii;
use app\models\Msalesreward;
use app\models\MsalesrewardSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalesrewardController implements the CRUD actions for Msalesreward model.
 */
class SalesrewardController extends Controller
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
     * Lists all Msalesreward models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new MsalesrewardSearch();
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
     * Displays a single Msalesreward model.
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
     * Creates a new Msalesreward model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate($id)
    // {
    //     $model = new Msalesreward();

    //     $post = Yii::$app->request->post();
    //     $model->SPRICEID = $id;

    //     if ($model->load(Yii::$app->request->post())) {
    //         $model->SPRICEID = $post['SPRICEID'];
    //         // Pas nge save, harus di-set manual value dari tanggalnya
    //         $model->SREWARDID_VALIDFROM = $post['Msalesreward']['SREWARDID_VALIDFROM'];
    //         $model->SREWARDID_VALIDUNTIL = $post['Msalesreward']['SREWARDID_VALIDUNTIL'];

    //         if ($model->save()) {
    //             Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
    //             return $this->redirect(['index']);
    //         } else {
    //             //error
    //         }
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    public function actionCreate()
    {
        $model = new Msalesreward();
        $post = Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $sales = $post['Msalesreward'];

            //$model->spriceid = $post['spriceid'];
            // Pas nge save, harus di-set manual value dari tanggalnya
            $model->rewarditem_validfrom = $sales['rewarditem_validfrom'];
            $model->rewarditem_validuntil = $sales['rewarditem_validuntil'];

            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
                return $this->redirect(['index']);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
                //error
            }
        } else {
            /*$get = Yii::$app->request->get();
            //echo json_encode($get);die;
            $model = new Msalesreward();
            $from['new'] = true;
            $from['id'] = $get['spriceid'];*/
            // var_dump($from);die();
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Msalesreward model.
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

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $post = Yii::$app->request->post();
            $post['Msalesreward']['rewarditem_validfrom'] = $post['Msalesreward']['rewarditem_validfrom'];
            $post['Msalesreward']['rewarditem_validuntil'] = $post['Msalesreward']['rewarditem_validuntil'];

            $model->load(Yii::$app->request->post());
            $model->rewarditem_validfrom = $post['Msalesreward']['rewarditem_validfrom'];
            $model->rewarditem_validuntil = $post['Msalesreward']['rewarditem_validuntil'];
            // var_dump($model);die();
            $model->save();

            $model = $this->findModel($id);
            // var_dump($model);die();
            Yii::$app->session->setFlash('success', Yii::$app->params['update']);
            // Jika method yang dioperasikan adalah update dan url sebelumnya adalah halaman filter index, maka redirect ke halaman filter tsb.
            if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                return $this->redirect(Yii::$app->session->get('halamanFilter'));
            } else {
                return $this->redirect(['index']);
            }
        } else {
            // Karena pas pertama kali di-load, gak sesuai formatnya, maka sesuikan dulu
            $model->rewarditem_validfrom = $model->rewarditem_validfrom ? date_create($model->rewarditem_validfrom)->format('Y-m-d') : "";
            $model->rewarditem_validuntil = $model->rewarditem_validuntil ? date_create($model->rewarditem_validuntil)->format('Y-m-d'): "";
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Msalesreward model.
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
     * Finds the Msalesreward model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Msalesreward the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Msalesreward::findOne($id)) !== null) {
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
