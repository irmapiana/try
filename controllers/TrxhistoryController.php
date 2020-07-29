<?php

namespace app\controllers;

use Yii;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\DynamicModel;

class TrxhistoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['accountno', 'startdate', 'enddate', 'productid']);
        $model->addRule(['accountno', 'startdate'], 'required');

        $model->startdate = date('Y-m-d');
        $model->enddate = date('Y-m-d');

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'accountno' accountno, 'product_name' product_name, 'account_name' account_name, 'sum_trx' sum_trx, 'sum_amount' sum_amount, 'sum_admin_fee' sum_admin_fee, 'sum_selling_fee' sum_selling_fee, 'tdate' tdate, 'total' total
            ");
        //trx = alias dari table a dan table b

        // $result = $command->queryAll();
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql
        ]);
        
        $model->productid = '-0-';
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'dataProviderWithNoPaging' => $dataProvider,

        ]);
    }


    public function actionSearchresults()
    {
        $limit = 5;
        $from  = (isset($_GET['page'])) ? ($_GET['page']-1)*$limit : 0; // Match according to your query string
        $model = new DynamicModel(['accountno', 'startdate', 'enddate', 'productid']);
        $model->addRule(['accountno', 'startdate', 'productid'], 'required')->addRule('enddate', 'string',['max'=>12]);
        
        //use value 0811882343, 01-JAN-2017, 31-DEC-2017 if you want to hardcode the query criteria
        if ($model->load(Yii::$app->request->get()) && $model->validate()) { 
            $params = [
                    ':accountno' => $model->accountno,
                    ':startdate' => $model->startdate,
                    ':enddate' => $model->enddate,
                    //':productid' => $model->productid,
            ];  

            $connection = Yii::$app->getDb();
            $sql = "SELECT trx.accountno, trx.account_name, trx.productid, trx.sum_trx, trx.sum_amount, trx.sum_admin_fee, trx.sum_selling_fee, trx.total, p.product_name
                FROM (
                SELECT b.productid, a.accountno , a.account_name, b.tdate, b.sum_trx, b.sum_amount, b.sum_admin_fee, b.sum_selling_fee,
                    b.sum_amount+b.sum_admin_fee-b.sum_selling_fee total
                    FROM   
                    (SELECT account_name, accountno
                        FROM m_user_account) a,  
                    (SELECT productid,accountno, cast(coalesce(data10,'0')as integer) sum_trx, cast(coalesce(data8,'0')as integer) sum_amount , cast(coalesce(data9,'0')as integer) sum_admin_fee, cast(coalesce(selling_fee,'0')as integer) sum_selling_fee, tdate
                       
                      FROM t_front 
                       WHERE settlflag in ('2','4'))
                       b)
                       trx, m_product p where trx.productid = p.productid"; 

            if (!empty($model->accountno)) {
                $sql .= " AND trx.accountno = :accountno ";
                $params['accountno'] = $model->accountno;
            }

            if (!empty($model->startdate)) {
                $sql .= " AND trx.tdate >= :startdate ";
                $params['startdate'] = $model->startdate." 00:00:00.000";
            

            if (!empty($model->enddate)) {
                $sql .= " AND trx.tdate <= :enddate ";
                $params['enddate'] = $model->enddate." 23:59:59.999";
            }

            if ($model->productid != '-0-') {
                $sql .= " AND productid = :productid ";
                $params['productid'] = $model->productid;
            }

            //$sql = "SELECT COUNT(*) FROM ( ".$sql." ) c"; 
            //echo($sql);exit();

            $command = $connection->createCommand($sql, $params);
            $numRows = $connection->createCommand($sql, $params)->queryScalar();

            $dataProvider = new SqlDataProvider([
                'sql'       => $command->sql,
                'totalCount'=> $numRows,
                'params'    => $params,
                'pagination' => [
                    'pageSize' => $limit,
                ],
            ]);
            $dataProviderWithNoPaging = new SqlDataProvider([
                'sql'       => $command->sql,
                'totalCount'=> $numRows,
                'params'    => $params,
            ]);
            $dataProviderWithNoPaging->pagination = false;
            
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'model' => $model,
                'dataProviderWithNoPaging' => $dataProviderWithNoPaging
            ]);
        }
        $this->actionIndex();
    }
}
}