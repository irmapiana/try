<?php

namespace app\controllers;

use Yii;
use app\models\Trxdetail;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\DynamicModel;

class TrxdetailController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['accountno', 'startdate', 'enddate','productid']);
        $model->addRule(['accountno', 'startdate'], 'required');
        
         $model->startdate = date('Y-m-d');
        $model->enddate = date('Y-m-d');

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'accountno' accountno, 'account_name' account_name, 'transaksi' transaksi, 'sum_trx' sum_trx 
            ");

        // $result = $command->queryAll();
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql
        ]);

        $model->productid = '-0-';
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }


    public function actionSearchresults()
    {
        $limit = 10;
        $from  = (isset($_GET['page'])) ? ($_GET['page']-1)*$limit : 0; // Match according to your query string
        $model = new DynamicModel(['accountno', 'startdate', 'enddate','productid']);
        $model->addRule(['accountno', 'startdate', 'productid'], 'required')->addRule('enddate', 'string',['max'=>12]);
        
        //use value 0811882343, 01-JAN-2017, 31-DEC-2017 if you want to hardcode the query criteria
        // $model->startdate = Yii::$app->request->get('startdate');
        // $model->enddate = Yii::$app->request->get('enddate');
        //

        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $params = [
                    ':accountno' => $model->accountno,
                    ':startdate' => $model->startdate,
                    ':enddate' => $model->enddate,
                    //':productid' => $model->productid,
            ];

            $connection = Yii::$app->getDb();
            $sql = "SELECT * from v_detail_transactions";

            if (!empty($model->startdate)) {
                $sql .= " where tdate >= :startdate ";
                $params[':startdate'] = $model->startdate." 00:00:00.000";
            }

            if (!empty($model->enddate)) {
                $sql .= " AND tdate <= :enddate ";
                $params[':enddate'] = $model->enddate." 23:59:59.999";
            }

            if ($model->productid != '-0-') {
                $sql .= " AND productid = :productid";
                $params[':productid'] = $model->productid;
            }
             if (!empty($model->accountno)) {
                $sql .= " AND accountno = :accountno ";
                $params[':accountno'] = $model->accountno;
            }
            
            $command = $connection->createCommand($sql, $params);
            $dataProvider = new SqlDataProvider([
                'sql'       => $command->sql,
                'totalCount'=> count($command->queryAll()),
                'params'    => $params,
                'pagination' => [
                    'pageSize' => $limit,
                ],
            ]);
            // var_dump($model);die();
            
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'model' => $model,
            ]);
        }

        $this->actionIndex();
    }

    public function actionExport(){
    CsvExport::export(
    Trxdetail::model()->findAll(), // a CActiveRecord array OR any CModel array
    array('account_name'=>array('string'),
     'tdate'=>array('date'),
     'productid'=>array('string'),
     'item'=>array('string'),
     'subscriber_id'=>array('string'),
     'rm'=>array('string'),
     'amount'=>array('number')),
    true, // boolPrintRows
    'registers-upto--'.date('d-m-Y').".csv"
   );
}

}
