<?php

namespace app\controllers;

use Yii;
use app\models\MMenugroup;
use app\models\MMenugroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MmenugroupController implements the CRUD actions for MMenugroup model.
 */
class MmenugroupController extends Controller
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
     * Lists all MMenugroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MMenugroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MMenugroup model.
     * @param string $group_user
     * @param string $menucode
     * @return mixed
     */
    public function actionView($group_user, $menucode)
    {
        return $this->render('view', [
            'model' => $this->findModel($group_user, $menucode),
        ]);
    }

    /**
     * Creates a new MMenugroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MMenugroup();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MMenugroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $group_user
     * @param string $menucode
     * @return mixed
     */
    public function actionUpdate($group_user, $menucode)
    {
        $model = $this->findModel($group_user, $menucode);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'group_user' => $model->group_user, 'menucode' => $model->menucode]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MMenugroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $group_user
     * @param string $menucode
     * @return mixed
     */
    public function actionDelete($group_user, $menucode)
    {
        $this->findModel($group_user, $menucode)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MMenugroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $group_user
     * @param string $menucode
     * @return MMenugroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($group_user, $menucode)
    {
        if (($model = MMenugroup::findOne(['group_user' => $group_user, 'menucode' => $menucode])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
