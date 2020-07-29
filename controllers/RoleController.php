<?php

namespace app\controllers;

use Yii;
use app\models\Mwebgroup;
use app\models\MwebgroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MMenugroup;
use app\models\MGroup;

/**
 * RoleController implements the CRUD actions for Mwebgroup model.
 */
class RoleController extends Controller
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
     * Lists all Mwebgroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MwebgroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mwebgroup model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $item = MMenugroup::find()->where(['group_user' => $id])->one();
        $used = false;
        if (!is_null($item)) {
            $used = true;
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'used'=> $used
        ]);
    }

    /**
     * Creates a new Mwebgroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //$model_webgrp = Mwebgroup::find()->all();
        // $model_grp = MGroup::find()->all();
        // foreach ($model_grp as $key => $value) {
        //     //echo $value->GROUPID;
        //     if($this->actionGetwebgrp($value->GROUPID)){
        //         $model = new Mwebgroup();
        //         $model->group_user = $value->GROUPID;
        //         $model->GUSERNAME = "admin";
        //         $model->note = $value->GROUPNAME;
        //         $model->save();
        //     }
        // }
        //die;
        // $model_grp = MGroup::find()->all();
        // foreach ($model_grp as $key => $value) {
        //     echo json_encode($value->GROUPID);
        // }
        // die;

        $model = new Mwebgroup();

        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']); 
                return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    private function actionGetwebgrp($GROUPID){
        $model = Mwebgroup::find()->where('group_user = :grp',[':grp' => $GROUPID])->one();

        if(!$model == NULL){
            return false;
        }
        else{
            return true;
        }
    }

    /**
     * Updates an existing Mwebgroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $item = MMenugroup::find()->where(['group_user' => $id])->one();
        $used = false;
        if (!is_null($item)) {
            $used = true;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'used'=> $used
            ]);
        }
    }

    /**
     * Deletes an existing Mwebgroup model.
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
     * Finds the Mwebgroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mwebgroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mwebgroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSetpermission($roleName, $permissionName)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $msg = 'no exec';
        $model = new MMenugroup;
        $model->group_user = $roleName;
        $model->menucode = $permissionName;
        if($model->save()){
            $msg = "Set Permision";
        }

        return ['data' => $msg];
    }

    public function actionRemovepermission($roleName, $permissionName)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $msg = 'no exec';
        $model = MMenugroup::find()->where('group_user = :grp and menucode = :code',[
            ':grp' => $roleName,
            ':code' => $permissionName
        ])->one();
        $model->delete();


        $msg = 'Remove Permision';

        return ['data' => $msg];
    }
}
