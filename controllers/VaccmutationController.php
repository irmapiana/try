<?php

namespace app\controllers;

use Yii;
use app\models\Vaccmutation;
use app\models\VaccmutationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * BankController implements the CRUD actions for Bank model.
 */
class VaccmutationController extends Controller
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
     * Lists all Bank models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
        'query' => Vaccmutation::find(),
            'pagination' => [
            'pageSize' => Yii::$app->params['pageLimit'],
            ],
        ]);
        // returns an array of Post objects
        //$posts = $provider->getModels();

        $searchModel = new VaccmutationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // var_dump($dataProvider);die();
        if ($dataProvider == false) {
            Yii::$app->session->setFlash('warning', "Tanggal tidak valid");
            return $this->redirect(Yii::$app->request->referrer);
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bank model.
     * @param string $id
     * @return mixed
     */
}
