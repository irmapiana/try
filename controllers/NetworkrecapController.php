<?php

namespace app\controllers;

use Yii;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\DynamicModel;
use yii\data\Pagination;

class NetworkrecapController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['orgid']);
        $model->addRule(['orgid'], 'required');

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'HARGA' HARGA, 'ADMIN' ADMIN, 'PTH' PTH, 'TRANSAKSI' TRANSAKSI, 'ITEM' ITEM, 'productid' productid, 'ORGID' ORGID, 'NAMAPRODUK' NAMAPRODUK FROM dual
                WHERE ROWNUM < 1
            ");

        // $result = $command->queryAll();
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dataProviderWithNoPaging' => $dataProvider,
            'model' => $model
        ]);
    }
    
    public function actionSearchresults()
    {
        $limit = 10;
        $from  = (isset($_GET['page'])) ? ($_GET['page']-1)*$limit : 0; // Match according to your query string
        $model = new DynamicModel(['orgid']);
        $model->addRule(['orgid'], 'required');
        
        //use value 0811882343 if you want to hardcode the query criteria
        if ($model->load(Yii::$app->request->get()) && $model->validate()) { 
            $connection = Yii::$app->getDb();
            $sql = "SELECT net.HARGA, net.ADMIN, net.TRANSAKSI, net.ITEM, net.productid, net.ORGID, p.product_name NAMAPRODUK  FROM (
                    SELECT SUM(TO_NUMBER(A.DATA8)) HARGA, SUM(TO_NUMBER(A.DATA9)) ADMIN, SUM(TO_NUMBER(NVL(A.DATA10,'0'))) TRANSAKSI, A.DATA11 ITEM, A.productid, B.ORGID
                    FROM (
                    SELECT orgid --, orgname, parent_orgid, LEVEL lvl, SYS_CONNECT_BY_PATH(orgname,'|') pth
                            FROM m_org ";
                 if (Yii::$app->user->identity->role != Yii::$app->params['roleSuperUser']) {
                     $sql .= "WHERE LEVEL <=3 AND LEVEL >1";
                 }
                            $sql .=  "START WITH orgid = :orgid
                            CONNECT BY PRIOR orgid = parent_orgid
                            ORDER SIBLINGS BY orgname) B, T_FRONT A
                    WHERE A.ORGID = B.ORGID       
                    GROUP BY B.ORGID, A.productid, A.DATA11
                ) net
                JOIN m_product p
                ON net.productid = p.productid
                ";
            $command = $connection->createCommand($sql, [':orgid' => $model->orgid]);
            $numRows = $connection->createCommand("SELECT COUNT(*) FROM (
                SELECT net.HARGA, net.ADMIN, net.TRANSAKSI, net.ITEM, net.productid, net.ORGID, p.product_name NAMAPRODUK  FROM (
                    SELECT SUM(TO_NUMBER(A.DATA8)) HARGA, SUM(TO_NUMBER(A.DATA9)) ADMIN, SUM(TO_NUMBER(NVL(A.DATA10,'0'))) TRANSAKSI, A.DATA11 ITEM, A.productid, B.ORGID
                    FROM (
                    SELECT orgid --, orgname, parent_orgid, LEVEL lvl, SYS_CONNECT_BY_PATH(orgname,'|') pth
                            FROM m_org
                            WHERE LEVEL <=3
                            START WITH orgid = :orgid
                            CONNECT BY PRIOR orgid = parent_orgid
                            ORDER SIBLINGS BY orgname) B, T_FRONT A
                    WHERE A.ORGID = B.ORGID       
                    GROUP BY B.ORGID, A.productid, A.DATA11
                ) net
                JOIN m_product p
                ON net.productid = p.productid
                ) a ", [':orgid' => $model->orgid])->queryScalar();

            $dataProvider = new SqlDataProvider([
                'sql'       => $command->sql,
                'totalCount'=> $numRows,
                'params'    => [':orgid' => $model->orgid], 
                'pagination' => [
                    'pageSize' => $limit,
                ],
            ]);
            $dataProviderWithNoPaging = new SqlDataProvider([
                'sql'       => $command->sql,
                'totalCount'=> $numRows,
                'params'    => [
                    ':orgid' => $model->orgid,
                    ],
            ]);
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'dataProviderWithNoPaging' => $dataProviderWithNoPaging,
                'model' => $model,
            ]);
        }
        
        return $this->actionIndex();
    }
}
