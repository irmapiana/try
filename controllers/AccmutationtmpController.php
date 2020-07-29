<?php

namespace app\controllers;

use Yii;
use app\models\Taccmutationtmp;
use app\models\TaccmutationtmpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Taccmutationdetails;
use yii\httpclient\Client;
use app\models\Mmutationtype;

/**
 * AccmutationtmpController implements the CRUD actions for Taccmutationtmp model.
 */
class AccmutationtmpController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Taccmutationtmp models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TaccmutationtmpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Taccmutationtmp model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Taccmutationtmp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        //transaction
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();


        $model = new Taccmutationtmp(['scenario' => 'create']);
        // $model->BDATE = date('Y-m-d');
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            $dateB = $model->BDATE;
            $datesB = date('d-M-Y',strtotime($dateB));
            $model->BDATE = $datesB;
            $model->note = $this->actionGetnotes($model->MTYPE);
            // $post = Yii::$app->request->post();
            // $model->load(Yii::$app->request->post());
            //$model->BDATE = $post['Taccmutationtmp']['BDATE'];
            //DIRECT
            if ($model->ISDIRECT == '1') {
                //$this->insertAccmutation();
                //$model->insertAccmutationdetailDirect(); //S = 0003
                //set scenario to insertdetail
                $model->scenario = "insertdetail";

                //redirect to view
                if ($model->insertAccmutation() && $model->insertAccmutationdetailDirect() && $model->updateCreditAccControl()) {
                    $transaction->commit();
                    return $this->redirect(['/vaccmutation/index']);
                } else {
                    $transaction->rollBack();
                }
            }

            //NOT DIRECT

            if ($model->ISDIRECT == '2') {

                //$model->insertAccmutationTmp();
                //$this->insertAccmutationTmp($model);
                //$model->insertAccmutationdetailNotdirect(); //S = 0002

                if ($model->insertAccmutationTmp() && $model->insertAccmutationdetailNotdirect()) {
                    $transaction->commit();
                } else {

                    $transaction->rollBack();
                }
            }
            Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
            return $this->redirect(['/vaccmutation/index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionApprove($id) {
        //transaction
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();

        $model = $this->findModel($id);
        // S= 0003
        if ($model->updateAccmutationDetail() && $model->insertAccmutation() && $model->deleteAccmutationtmp() && $model->updateCreditAccControl()) {
            $transaction->commit();
            Yii::$app->session->setFlash('success', Yii::$app->params['approveSuccess']);
            if($model->MTYPE == Yii::$app->params['mutationTypeTopup'])
            {
             $this->sendNotif(15, "Personal", "Deposit", $model->userid, $model->AMOUNT, $model->getSaldo($model->userid));
            }
            return $this->redirect(['/vaccmutation/index']);
        } else {

            $transaction->rollBack();
            Yii::$app->session->setFlash('error', Yii::$app->params['approveFailed']);
            return $this->redirect(['/vaccmutation/index']);
        }
    }

    /**
     * Updates an existing Taccmutationtmp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        //CaNCEL rEKON = s
        // Sttatus mutation code = 0004
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();

        $model = $this->findModel($id);
        $detail = $this->findDetail($id);
        
        if($model->load(Yii::$app->request->post())){
            if (Yii::$app->request->post('submits') == 'update') {
                if ($model->load(Yii::$app->request->post())) {
                    $detail->BANK_ACCOUNT_ID = $model->BANKCODE;
                    $dateB = $model->BDATE;
                    $datesB = date('d-M-Y',strtotime($dateB));
                    $model->BDATE = $datesB;
                    $model->noteS = $this->actionGetnotes($model->MTYPE);
                    if ($model->save() && $detail->save()) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', Yii::$app->params['update']);
                    } else {
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('error', Yii::$app->params['gagal']);
                    }

                    return $this->redirect(['/vaccmutation/index']);
                } 
            }

            if (Yii::$app->request->post('submits') == 'approve') {
                if ($model->load(Yii::$app->request->post())) {
                    $detail->BANK_ACCOUNT_ID = $model->BANKCODE;
                    $dateB = $model->BDATE;
                    $datesB = date('d-M-Y',strtotime($dateB));
                    $model->BDATE = $datesB;
                    $model->noteS = $this->actionGetnotes($model->MTYPE);
                    if ($model->save() && $detail->save()) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', Yii::$app->params['update']);
                        $connection_apr = \Yii::$app->db;
                        $transaction_apr = $connection_apr->beginTransaction();

                        $model_apr = $this->findModel($id);
                        $dateB = $model_apr->BDATE;
                        $datesB = date('d-M-Y',strtotime($dateB));
                        $model_apr->BDATE = $datesB;
                        $model_apr->noteS = $this->actionGetnotes($model_apr->MTYPE);
                        if ($model_apr->updateAccmutationDetail() && $model_apr->insertAccmutation() && $model_apr->deleteAccmutationtmp() && $model_apr->updateCreditAccControl()) {
                            $transaction_apr->commit();
                            Yii::$app->session->setFlash('success', Yii::$app->params['approveSuccess']);
                            if($model_apr->MTYPE == Yii::$app->params['mutationTypeTopup'])
                            {
                             $this->sendNotif(15, "Personal", "Deposit", $model_apr->userid, $model_apr->AMOUNT, $model_apr->getSaldo($model_apr->userid));
                            }
                        }
                        else {
                            $transaction_apr->rollBack();
                            Yii::$app->session->setFlash('error', Yii::$app->params['approveFailed']);
                        }
                    } else {
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('error', Yii::$app->params['gagal']);
                    }

                    return $this->redirect(['/vaccmutation/index']);
                } 
            }
        }
        else {
            $model->BDATE = $model->BDATE ? date_create($model->BDATE)->format('Y-m-d') : "";

            return $this->render('update', [
                        'model' => $model,
                        'detail' => $detail
            ]);
        }
    }

    /**
     * Deletes an existing Taccmutationtmp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', Yii::$app->params['delete']);

        return $this->redirect(['index']);
    }

    public function actionBatal($id) {
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();

        $model = $this->findModel($id);

        if ($model->updateAccmutationDetailBatal()) {
            $transaction->commit();
            Yii::$app->session->setFlash('success', Yii::$app->params['batal']);
        } else {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', Yii::$app->params['gagal']);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Taccmutationtmp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Taccmutationtmp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Taccmutationtmp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findDetail($id) {
        $model = Taccmutationdetails::find()->where(['MUTATION_ID' => $id])->one();
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function sendNotif($id, $tag, $title, $to, $amount, $saldo) {

        $message = "Deposit ke akun anda " . $to . " sebesar Rp. " . number_format($amount, 2, ',', '.') . " telah berhasil dilakukan. Saldo anda saat ini menjadi Rp. " . number_format($saldo, 2, ',', '.') . ". Terima kasih telah menggunakan layanan ProtelMart.";
        $client = new Client();

        $payload = array(
            'id' => $id,
            'tag' => $tag,
            'title' => $title,
            'to' => $to,
            'message' => $message
        );
        $header = array(
          'ssid'=>"",
			'activityID'=>"",
			'timeStamp'=>"",
			'version'=>"1.0"
        );
        $data = array('header'=>$header, 'payload'=>$payload);

        $json = json_encode($data);
        
//        var_dump($json);
//        die();

        $response = $client->createRequest()
                ->setMethod('post')
                ->setUrl(Yii::$app->params['k_url_notification'])
                 ->addHeaders(['content-type' => 'application/json'])
                 ->setContent($json)
                ->send();
        if ($response->isOk) {
            Yii::$app->session->setFlash('success', Yii::$app->params['notifsukses']);
        } else {
            Yii::$app->session->setFlash('error', Yii::$app->params['notifgagal']);
        }
    }

    public function actionGetnotes($id){
        $model = Mmutationtype::find()->where('MTYPE = :type',[':type' => $id])->one();
        return $model->noteS != NULL ? $model->noteS : "";
    }

    public function actionCallws() {


        /* $client = new Client();
          $response = $client->createRequest()
          ->setMethod('post')
          ->setUrl('http://e-planning.sumuttekno.com/service')
          // ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
          ->send();
          if ($response->isOk) {
          var_dump($response->data);
          } */

        $id = 23;
        $tag = "personal";
        $title = "Deposit";
        $amount = 100000;
        $saldo = 1000000;
        $to = "081376420032";


        $this->sendNotif($id, $tag, $title, $to, $amount, $saldo);
        return $this->redirect(['index']);
    }

}
