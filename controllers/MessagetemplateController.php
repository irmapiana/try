<?php

namespace app\controllers;

use Yii;
use app\models\Mmessagetemplate;
use app\ models\MmessagetemplateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class MessagetemplateController extends Controller
{
	public function behavior()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'action' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	public function actionIndex()
	{
		$searchModel = new MmessagetemplateSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionView($id)
	{
		return $this->render('view',[
			'model' => $this->findModel($id),
		]);
	}

	public function actionCreate()
	{
		$model = new Mmessagetemplate();

		if ($model->load(Yii::$app->request->post())) {
			if($model->save()) {
				Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
				return $this->redirect(['index']);

			}else {
				return $this->render('create', [
					'model' => $model,
				]);
				# code...
			}
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
			if (Yii::$app->controller->action->id == 'update' && !is_null(Yii::$app->session->get('halamanFilter'))) {
				return $this->redirect(Yii::$app->session->get('halamanFilter'));
				# code...
			}else{
				return $this->redirect(['index']);
			}
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
		$delete = $this->findModel($id)->delete();
		YIi::$app->session->setFlash('success', 'Data terhapus');

		return $this->redirect(Yii::$app->request->referrer);
	}

	protected function findModel($id)
	{
		if (($model = Mmessagetemplate::findOne($id)) !== null) {
			return $model;
			# code...
		}else{
			throw new NotFoundHttpException('The requested page does not exist');
		}
	}
}
?>