<?php

namespace app\controllers;

use app\models\Morg;
use Yii;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\DynamicModel;

class NetworktrxController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['orgid', 'startdate', 'enddate', 'productid']);
        $model->addRule(['orgid', 'startdate', 'productid'], 'required')->addRule('enddate', 'string',['max'=>12]);
        
         $model->startdate = date('d-M-Y');
        $model->enddate = date('d-M-Y');

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'ORGID' ORGID, 'product_name' product_name, 'ORGNAME' ORGNAME, 'TRANSAKSI' TRANSAKSI, 'SUM_TRX' SUM_TRX FROM dual
                WHERE ROWNUM < 1
            ");

        // $result = $command->queryAll();
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql
        ]);
        
        $model->productid = '-0-';
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'dataProviderWithNoPaging' => $dataProvider
        ]);
    }


  /* public function actionSearchresults()
    {
        $limit = 10;
        $from  = (isset($_GET['page'])) ? ($_GET['page']-1)*$limit : 0; // Match according to your query string
        $model = new DynamicModel(['orgid', 'startdate', 'enddate', 'productid']);
        $model->addRule(['orgid', 'startdate', 'productid'], 'required')->addRule('enddate', 'string',['max'=>12]);
        
        //use value 0811882343, 01-JAN-2017, 31-DEC-2017 if you want to hardcode the query criteria
        if ($model->load(Yii::$app->request->get()) && $model->validate()) { 
            $params = [
                    ':orgid' => $model->orgid,
                    ':startdate' => $model->startdate,
            ];
            $connection = Yii::$app->getDb();
            $sql = "SELECT trx.orgid, trx.orgname, trx.productid, trx.parentid, trx.lvl, trx.pth, trx.sum_trx, trx.sum_harga, trx.sum_admin, trx.sum_commission, trx.total, trx.sum_point, p.product_name
                FROM (SELECT a.orgid , a.orgname, b.productid, a.parent_orgid parentid, a.lvl, a.pth, nvl(b.sum_trx,'0') sum_trx, nvl(b.sum_harga,'0') sum_harga , nvl(b.sum_admin,'0') sum_admin,  nvl(b.sum_commission,'0') sum_commission,
                    nvl((sum_harga+sum_admin-sum_commission),'0') total, nvl(b.sum_point,'0') sum_point
                    FROM   
                    (SELECT orgid, orgname, parent_orgid, LEVEL lvl, SYS_CONNECT_BY_PATH(orgname,'|') pth
                        FROM m_org
                        WHERE LEVEL <=3 AND LEVEL >1
                        START WITH orgid = :orgid
                        CONNECT BY PRIOR orgid = parent_orgid
                        ORDER SIBLINGS BY orgname) a,   
                    (SELECT orgid, productid, sum(to_number(nvl(data10,'0'))) sum_trx, sum(to_number(nvl(data8,'0'))) sum_harga , sum(to_number(nvl(data9,'0'))) sum_admin,   nvl(sum(commission),'0') sum_commission
                      ,nvl(sum(point),'0') sum_point                        
                      FROM t_front 
                        WHERE TRUNC(tdate) >= :startdate  AND settflag = 2 or settflag = 4";
            
            if (!empty($model->enddate)) {
                $sql .= " AND TRUNC(tdate) <= :enddate ";
                $params[':enddate'] = $model->enddate;
            }
            if ($model->productid != '-0-') {
                $sql .= "AND productid = :productid";
                $params[':productid'] = $model->productid;
            }
                        
            $sql .= " GROUP BY orgid, productid) b   
                    WHERE
                    a.orgid = b.orgid (+)
                    ) trx
                JOIN m_product p
                ON p.productid = trx.productid";
                
            $command = $connection->createCommand($sql, $params);
            $numRows = $connection->createCommand("SELECT COUNT(*) FROM (". $sql . ") a", $params)->queryScalar();

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
    }*/

    public function actionSearchresults()
    {
        $limit = 10;
        $from  = (isset($_GET['page'])) ? ($_GET['page']-1)*$limit : 0; // Match according to your query string
        $model = new DynamicModel(['orgid', 'startdate', 'enddate']);
        $model->addRule(['orgid', 'startdate','enddate'], 'required')->addRule('enddate', 'string',['max'=>12]);

        //use value 0811882343 if you want to hardcode the query criteria
        if ($model->load(Yii::$app->request->get()) && $model->validate()) {


            $params = [
                ':orgid' =>$model->orgid,
                ':startdate' => $model->startdate,
                ':enddate' => $model->enddate,
            ];
            $connection = Yii::$app->getDb();
            $sql = "SELECT A.cdate,
         A.ORGNAME,
         A.ORGID,
         A.PARENT_ORGNAME,
         A.PARENT_ORGID,
         B.LVL,
         COALESCE (c.sum_trx, 0) total
    FROM (SELECT a.cdate,
                 b.orgname,
                 b.orgid,
                 c.orgname parent_orgname,
                 b.parent_orgid
            FROM t_accmutation a, m_org b, m_org c
           WHERE     a.mtype = 10
                 AND a.amount < 0
                 AND a.userid = b.orgid
                 AND b.parent_orgid = c.orgid) A,
         (           SELECT orgid, LEVEL lvl
                       FROM m_org
                      WHERE LEVEL = 2
                 START WITH orgid = :orgid
                 CONNECT BY PRIOR orgid = parent_orgid
          ORDER SIBLINGS BY orgname) B,
         (  SELECT ORGID, SUM (TO_NUMBER (NVL (data10, '0'))) sum_trx
              FROM t_front
             WHERE                                
             TRUNC(tdate) >= :startdate
                   AND     TRUNC(tdate) <= :enddate
                   AND
                    (settflag = 2 OR settflag = 4)
          GROUP BY orgid                               
                        ) C
   WHERE A.orgid = C.orgid(+) AND A.orgid = b.orgid
ORDER BY A.cdate ASC";
            $command = $connection->createCommand($sql, $params);
            $numRows = $connection->createCommand("SELECT COUNT(*) FROM (" . $sql . ") a", $params)->queryScalar();

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
                'startdate' => $model->startdate,
               // 'enddate'=>$model->enddate,
                'model' => $model,
            ]);
        }

        return $this->actionIndex();
    }

}
