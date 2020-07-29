<?php

namespace app\controllers;

use Yii;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\DynamicModel;

class NetworktrxdetailController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['orgid', 'startdate', 'enddate','productid']);
        $model->addRule(['orgid', 'startdate'], 'required');
        
         $model->startdate = date('d-M-Y');
        $model->enddate = date('d-M-Y');

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'ORGID' ORGID, 'ORGNAME' ORGNAME, 'TRANSAKSI' TRANSAKSI, 'SUM_TRX' SUM_TRX FROM dual
                WHERE ROWNUM < 1
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
        $model = new DynamicModel(['orgid', 'startdate', 'enddate','productid']);
        $model->addRule(['orgid', 'startdate','productid'], 'required')->addRule('enddate', 'string',['max'=>12]);
        
        //use value 0811882343, 01-JAN-2017, 31-DEC-2017 if you want to hardcode the query criteria
        if ($model->load(Yii::$app->request->get()) && $model->validate()) { 
            $params = [
                    ':orgid' => $model->orgid,
                    ':startdate' => $model->startdate,
            ];
            $query = "SELECT a.orgid,b.tdate,b.productid,b.settflag,b.data11,b.data1,b.data2,b.data10,b.data8,b.data9,b.commission,(b.data8+b.data9-b.commission) komisi,nvl(b.point,'0') point, a.orgname, a.parent_orgid parentid, a.lvl, a.pth, b.transaksi, b.sum_trx 
                    FROM   
                    (SELECT orgid, orgname, parent_orgid, LEVEL lvl, SYS_CONNECT_BY_PATH(orgname,'|') pth
                        FROM m_org ";
            if (Yii::$app->user->identity->role != Yii::$app->params['roleSuperUser']) {
                $query .= "WHERE LEVEL <=3 AND LEVEL >1";
            }
                $query .= "START WITH orgid = :orgid
                        CONNECT BY PRIOR orgid = parent_orgid
                        ORDER SIBLINGS BY orgname) a,   
                    (SELECT orgid,productid,data11,settflag,tdate,data1,data2,data10,data8,data9,nvl(commission,'0') commission,point, to_number(nvl(data10,'0')) transaksi , to_number(nvl(data8,'0')) sum_trx 
                        FROM t_front 
                        WHERE TRUNC(tdate) >= :startdate AND settflag = 2 or settflag = 4";


                if (!empty($model->enddate)) {
                    $query .= " AND TRUNC(tdate) <= :enddate";
                    $params[':enddate'] = $model->enddate;
                }
                    $query .= ") b   
                        WHERE a.orgid = b.orgid (+)
                        AND b.transaksi > 0 ";
                if ($model->productid != '-0-') {
                    $query .= " AND productid = :productid";
                    $params[':productid'] = $model->productid;
                }
            
            $connection = Yii::$app->getDb();
            $command = $connection->createCommand($query, $params);
            $numRows = $connection->createCommand("SELECT COUNT(*) FROM (" . $query . ") a", $params)->queryScalar();

            $dataProvider = new SqlDataProvider([
                'sql'       => $command->sql,
                'totalCount'=> $numRows,
                'params'    => $params,
                'pagination' => [
                    'pageSize' => $limit,
                ],
            ]);
            
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'model' => $model,
            ]);
        }
        $this->actionIndex();
    }

}
