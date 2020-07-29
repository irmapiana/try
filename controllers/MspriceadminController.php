<?php

namespace app\controllers;

use Yii;
use app\models\Mspriceadmin;
use app\models\MspriceadminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Dproductitem;

/**
 * MspriceadminController implements the CRUD actions for Mspriceadmin model.
 */
class MspriceadminController extends Controller
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
     * Lists all Mspriceadmin models.
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     $searchModel = new MspriceadminSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    public function actionIndex()
    {
        $searchModel = new MspriceadminSearch();
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
     * Displays a single Mspriceadmin model.
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
     * Creates a new Mspriceadmin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Mspriceadmin();
        $post = Yii::$app->request->post();
        $model->spriceid = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->aitemid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mspriceadmin model.
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
            // Jika method yang dioperasikan adalah update dan url sebelumnya adalah halaman filter index, maka redirect ke halaman filter tsb.
            if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
                return $this->redirect(Yii::$app->session->get('halamanFilter'));
            } else {
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mspriceadmin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mspriceadmin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mspriceadmin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mspriceadmin::findOne($id)) !== null) {
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
