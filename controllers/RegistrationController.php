<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Mregistration;
use yii\db\Query;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\base\DynamicModel;
use app\models\MregistrationSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Response;
use app\models\Usersession;
use yii\httpclient\Client;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Mproduct model.
 */
class RegistrationController extends Controller
{
    /**
     * @inheritdoc
     */
    /*public function behaviors()
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
     * Lists all Mproduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MregistrationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $connection = Yii::$app->getDb();
        $sql="SELECT account_no, account_name, alamat, propinsi, kota, terminal_id,substring(pgp_sym_decrypt(enc_card_number, current_setting('mbb.key'), 'cipher-algo=3des'),1,6) 
||
'XXXXXXXX'
||
substring(pgp_sym_decrypt(enc_card_number, current_setting('mbb.key'), 'cipher-algo=3des'),15,2)as enc_card_number from m_registration_validation";
        $command = $connection->createCommand($sql);
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql
        ]);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

        $this->actionIndex();
        /*$this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));*/
        /*$connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'account_no' account_no, 'account_name' account_name, 'alamat' alamat, 'propinsi' propinsi, 'kota' kota, 'terminal_id' terminal_id, 'enc_card_number' enc_card_number
            ");
        //trx = alias dari table a dan table b

        // $result = $command->queryAll();
        /
        $enc_card_number = Yii::app()->db->createCommand('SELECT pgp_sym_decrypt(enc_card_number,current_setting('mbb.key'),'cipher-algo=3des')from m_registration_validation;');
        /*$searchModel = new MregistrationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }

    /**
     * Displays a single Mproduct model.
     * @param string $id
     * @return mixed
     */
    public function actionForm()
    {
        $models = new Mregistration();
                
        //$models = new TestModel(); // same class with extends from `yii\db\ActiveRecord` return no error

        return $this->render('_form', ['model'=> $models]); 
    }

    /**
     * Creates a new Mproduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $models = new Mregistration();
        //$user=Usersession::find()->where(['userid'=>Yii::$app->user->identity->userid])->one();
        //$model->flag = '0';
        if ($models->load(Yii::$app->request->post()) && $models->validate())
        {
            $client = new Client();

            $payload = array(
                'accountNo' => $models->account_no,
                'accountName' => $models->account_name,
                'flag' => $models->flag = '0',
                'user'=> $user=Yii::$app->user->identity->username,
                'cardNumber' => $models->enc_card_number,
                'alamat' => $models->alamat,
                'kota' => $models->kota,
                'propinsi' => $models->propinsi,
                'terminalId' => $models->terminal_id 
            );
            //var_dump($payload);
            //die;
            $header = array(
                'activityID'=>"",
            );
            $data = array('header'=>$header, 'payload'=>$payload);
            $json = json_encode($data);

            //var_dump($json);
            //die();
            $response = $client->createRequest()
            ->setMethod('post')
                        //->setUrl(Yii::$app->params['k_url_notification_broadcast'])
                        ->setUrl(Yii::$app->params['k_url_register'])
                         ->addHeaders(['content-type' => 'application/json'])
                         ->setContent($json)
                        ->send();
                    if ($response->isOk) {
                        Yii::$app->session->setFlash('success', Yii::$app->params['sukses']);
        } else {
            Yii::$app->session->setFlash('error', Yii::$app->params['gagal']);
        }
                        # code...
                    
                    return $this->redirect(['index']);
        }
        else
            return $this->render('create', ['model'=> $models]);
        }

        /*$model = new Mregistration();
        $model->flag = '0';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save(false)) {
                //Yii::$app->db->createCommand()->insert('m_registration_validation', ['enc_card_number' => $enc_card_number,])->execute();
                //echo var_dump($enc_card_number);
                //die();
                Yii::$app->session->setFlash('success', Yii::$app->params['berhasil']);
                return $this->redirect(['index']);
            } else {
                //Yii::$app->session->setFlash('error', "Ada error ketika meyimpan data");
                //return $this->redirect(Yii::$app->request->referrer);
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            //return $this->redirect(['view', 'id' => $model->productid]); 
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    /**
     * Updates an existing Mproduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->isGet) {
            $session = Yii::$app->session;
            $session->set('halamanFilter', Yii::$app->request->referrer);
            // var_dump(Yii::$app);
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
            foreach ($model->getErrors() as $key => $message) {
                Yii::$app->session->setFlash('error', $message);
            }
            return $this->render('update', [
                'model' => $model,
                'used' => $used,
            ]);
        }
    }

    /**
     * Deletes an existing Mproduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
     public function actionDelete($account_no, $flag)
    {
        
        //$post=$request->post();
        //$model = $this->findModel($flag);

        if ($flag == 1) {
            //$delete = $this->findModel($account_no)->delete();
            Yii::$app->session->setFlash('warning', 'Pengguna Tidak Dapat Dihapus');
            # code...
        }elseif($flag == 0){
        //$delete = \app\models\Mregistration::find()->where(['account_no' => $id])->one();
        // $msg = "Data tidak dapat dihapus. Data masih digunakan di tabel yang lain.";
        // if () {
        //     Yii::$app->session->setFlash('warning', $msg);
        // } else {
            $this->findModel($account_no)->delete();
            //return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', 'Data terhapus');
            //return $this->redirect(Yii::$app->request->referrer);
        // }
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Mproduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mproduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mregistration::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
?>