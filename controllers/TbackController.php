<?php

namespace app\controllers;

use Yii;
use app\models\Tback;
use app\model\TbackSearch;
use app\model\Tbackadd;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
/**
* 
*/
class TbackController extends Controller
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

	public function actionIndex()
	{

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'isomsg' isomsg
            ");

        // $result = $command->queryAll();
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql
        ]);

		$searchModel = new TbackSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	public function actionCreate()
	{
		$model = new Tback();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
			return $this->redirect(['index']);
			# code...
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->session->setFlash('success', Yii::$app->params['update']);
			return $this->redirect(['index']);
			# code...
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

	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		Yii::$app->session->setFlash('success', Yii::$app->params['delete']);

		return $this->redirect(['index']);
	}
}

  ?>