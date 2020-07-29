<?php

namespace app\controllers;

use Yii;
use app\models\MMenucfg;
use app\models\MMenucfgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Inflector;

/**
 * MmenucfgController implements the CRUD actions for MMenucfg model.
 */
class MmenucfgController extends Controller
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
     * Lists all MMenucfg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MMenucfgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MMenucfg model.
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
     * Creates a new MMenucfg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MMenucfg();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->menucode]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MMenucfg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->menucode]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MMenucfg model.
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
     * Finds the MMenucfg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MMenucfg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MMenucfg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetcontroller()
    {
        
        $controllers = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@app/controllers'), ['recursive' => true]);
        //$actions = [];

        $dataController = MMenucfg::find()->all();
        $countData = count($dataController);
        if($countData == 0){
            $no = 1;
        }
        else{
            $no = $countData+1;
        }
        foreach ($controllers as $controller) {
            $contents = file_get_contents($controller);
            $controllerId = Inflector::camel2id(substr(basename($controller), 0, -14));
            preg_match_all('/public function action(\w+?)\(/', $contents, $result);
            foreach ($result[1] as $action) {
                $actionId = Inflector::camel2id($action);
                $route = $controllerId . '/' . $actionId;
                if($this->cekLink($route)){
                    $model =  new MMenucfg();
                    if($no <= 999 && $no >= 100){
                        $model->menucode = "M0".$no;
                    }
                    elseif ($no <= 99 && $no >= 10) {
                        $model->menucode = "M00".$no;
                    }
                    elseif ($no <= 9) {
                        $model->menucode = "M000".$no;
                    }
                    else{
                        $model->menucode = $no;
                    }
                    
                    $model->menuname = $controllerId;
                    $model->menutitle = $actionId;
                    $model->menulink = $route;
                    $model->save();
                    $no++;
                }
            }
        
        }

        return $this->redirect(['index']);
    }

    private function cekLink($link){
        $data = MMenucfg::find()->where('menulink = :link',['link' => $link])->one();

        if($data == NULL){
            return true;
        }
        else{
            return false;
        }
    }
}
