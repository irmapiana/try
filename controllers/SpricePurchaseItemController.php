<?php

namespace app\controllers;

use Yii;
use app\models\Mpurchasepriceitem;
use app\models\MpurchasepriceitemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Dproductitem;

/**
 * SpriceItemController implements the CRUD actions for Mpurchasepriceitem model.
 */
class SpricePurchaseItemController extends Controller
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
     * Lists all Mpurchasepriceitem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MpriceitemSearch();
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
     * Displays a single Mpurchasepriceitem model.
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
     * Creates a new Mpurchasepriceitem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate($id)
    // {
    //     $model = new Mpurchasepriceitem();
    //     $post = Yii::$app->request->post();
    //     $model->spriceid = $id;
        
    //     if ($model->load(Yii::$app->request->post())) {
    //         $model->spriceid = $post['spriceid'];
    //         // Pas nge save, harus di-set manual value dari tanggalnya
    //         $model->PPITEM_VALIDFROM = $post['Mpurchasepriceitem']['PPITEM_VALIDFROM'];
    //         $model->SPIPEM_VALIDUNTIL = $post['Mpurchasepriceitem']['SPIPEM_VALIDUNTIL'];

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

    public function actionCreate($id)
    {
        $model = new Mpurchasepriceitem();
        $post = Yii::$app->request->post();
        $model->spriceid = $id;

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $model->spriceid = $post['spriceid'];
            // Pas nge save, harus di-set manual value dari tanggalnya
            $model->PPITEM_VALIDFROM = $post['Mpurchasepriceitem']['PPITEM_VALIDFROM'];
            $model->PPITEM_VALIDFROM = date('d/M/Y',strtotime($model->PPITEM_VALIDFROM));
            //echo $model->PPITEM_VALIDFROM;die;
            $model->SPIPEM_VALIDUNTIL = $post['Mpurchasepriceitem']['SPIPEM_VALIDUNTIL'];
            $model->SPIPEM_VALIDUNTIL = date('d/M/Y',strtotime($model->SPIPEM_VALIDUNTIL));

            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
                return $this->redirect(['index']);
            } else {
                //error
            }
        } else {
            $get = Yii::$app->request->get();
            $model = new Mpurchasepriceitem();
            $from['new'] = true;
            $from['spriceid'] = $get['id'];
            // var_dump($from);die();
            return $this->render('create', [
                'model' => $model,
                'from' => $from
            ]);
        }
    }

    /**
     * Updates an existing Mpurchasepriceitem model.
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

            //
            $post = Yii::$app->request->post();
            // $post['Mpurchasepriceitem']['PPITEM_VALIDFROM'] = $post['Mpurchasepriceitem']['PPITEM_VALIDFROM'];
            // $post['Mpurchasepriceitem']['SPIPEM_VALIDUNTIL'] = $post['Mpurchasepriceitem']['SPIPEM_VALIDUNTIL'];
            // // $post['Msellprice']['SPIPEM_VALIDUNTIL'] = new Expression("TO_DATE(" . $post['Msellprice']['SPIPEM_VALIDUNTIL'] . ", 'YYYY-MM-DD')");
            // // $post['Msellprice']['SPIPEM_VALIDUNTIL'] = "30-DEC-17";

            // $model->load(Yii::$app->request->post());
            // $model->PPITEM_VALIDFROM = $post['Mpurchasepriceitem']['PPITEM_VALIDFROM'];
            // $model->SPIPEM_VALIDUNTIL = $post['Mpurchasepriceitem']['SPIPEM_VALIDUNTIL'];
            // var_dump($model);die();
            //$model->spriceid = $post['spriceid'];
            // Pas nge save, harus di-set manual value dari tanggalnya
            $model->PPITEM_VALIDFROM = $post['Mpurchasepriceitem']['PPITEM_VALIDFROM'];
            $model->PPITEM_VALIDFROM = date('d/M/Y',strtotime($model->PPITEM_VALIDFROM));
            //echo $model->PPITEM_VALIDFROM;die;
            $model->SPIPEM_VALIDUNTIL = $post['Mpurchasepriceitem']['SPIPEM_VALIDUNTIL'];
            $model->SPIPEM_VALIDUNTIL = date('d/M/Y',strtotime($model->SPIPEM_VALIDUNTIL));

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
            $model->PPITEM_VALIDFROM = $model->PPITEM_VALIDFROM ? date_create($model->PPITEM_VALIDFROM)->format('Y-m-d') : "";
            $model->SPIPEM_VALIDUNTIL = $model->PPITEM_VALIDFROM ? date_create($model->SPIPEM_VALIDUNTIL)->format('Y-m-d'): "";
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mpurchasepriceitem model.
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
     * Finds the Mpurchasepriceitem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mpurchasepriceitem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mpurchasepriceitem::findOne($id)) !== null) {
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
            echo "<option value=''disabled selected></option>";
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
