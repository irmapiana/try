<?php

namespace app\controllers;

use Yii;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\DynamicModel;
use yii\data\Pagination;

class TrxaccmutationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['orgid', 'startdate', 'enddate']);
        $model->addRule(['orgid', 'startdate'], 'required');
        
         $model->startdate = date('d-M-Y');
        $model->enddate = date('d-M-Y');

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'AKUN' AKUN, 'TANGGAL' TANGGAL, 'TRANSAKSI' TRANSAKSI, 'SALDO AWAL' SALDO_AWAL, 'SALDO_AKHIR' SALDO_AKHIR, 'AMOUNT' AMOUNT FROM dual
                WHERE ROWNUM < 1
            ");

        // $result = $command->queryAll();
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }
    
    public function actionSearchresults()
    {
        $limit = 10;
        $from  = (isset($_GET['page'])) ? ($_GET['page']-1)*$limit : 0; // Match according to your query string
        $model = new DynamicModel(['orgid', 'startdate', 'enddate']);
        $model->addRule(['orgid', 'startdate'], 'required')->addRule('enddate', 'string',['max'=>12]);
        
        //use value 0811882343 if you want to hardcode the query criteria
        if ($model->load(Yii::$app->request->get()) && $model->validate()) { 
            $connection = Yii::$app->getDb();

            $params =  [
                    ':orgid' => $model->orgid,
                    ':startdate' => $model->startdate,
                ];
                    
            if (!empty($model->enddate)) {
                $params[':enddate'] = $model->enddate;
            }

            $sql = "SELECT * FROM (
                (select orgid AKUN, cdate TANGGAL, data11 TRANSAKSI, 
                to_number(nvl(data31,'0'))+to_number(nvl(data8,'0'))+to_number(nvl(data9,'0'))-to_number(nvl(commission,'0')) SALDO_AWAL, 
                to_number(nvl(data8,'0'))+to_number(nvl(data9,'0'))-to_number(nvl(commission,'0')) AMOUNT, to_number(nvl(data31,'0')) SALDO_AKHIR from t_front)
                union
                (select A.userid AKUN, A.cdate TANGGAL, B.mname TRANSAKSI, to_number(nvl(A.endbalance,'0')) - to_number(nvl(A.amount,'0')) SALDO_AWAL, to_number(nvl(A.amount,'0')) AMOUNT, to_number(nvl(A.endbalance,'0')) SALDO_AKHIR 
                FROM T_ACCMUTATION a, M_MUTATIONTYPE b
                WHERE A.MTYPE = B.MTYPE)) A
                WHERE A.AKUN = :orgid
                AND TRUNC(TANGGAL) >= :startdate";

                if (!empty($model->enddate)) {
                    $sql .= " AND TRUNC(TANGGAL) <= :enddate";
                 }

                $sql .= " ORDER BY AKUN, TANGGAL ASC";

            $command = $connection->createCommand($sql, [':orgid' => $model->orgid]);
            $numRowsSql = "SELECT COUNT(*) FROM (
                SELECT * FROM (
                (select orgid AKUN, cdate TANGGAL, data11 TRANSAKSI, 
                to_number(nvl(data31,'0'))+to_number(nvl(data8,'0'))+to_number(nvl(data9,'0'))-to_number(nvl(commission,'0')) SALDO_AWAL, 
                to_number(nvl(data8,'0'))+to_number(nvl(data9,'0'))-to_number(nvl(commission,'0')) AMOUNT, to_number(nvl(data31,'0')) SALDO_AKHIR from t_front)
                union
                (select A.userid AKUN, A.cdate TANGGAL, B.mname TRANSAKSI, to_number(nvl(A.endbalance,'0')) - to_number(nvl(A.amount,'0')) SALDO_AWAL, to_number(nvl(A.amount,'0')) AMOUNT, to_number(nvl(A.endbalance,'0')) SALDO_AKHIR 
                FROM T_ACCMUTATION a, M_MUTATIONTYPE b
                WHERE A.MTYPE = B.MTYPE)) A
                WHERE A.AKUN = :orgid
                AND TRUNC(TANGGAL) >= :startdate";

                if (!empty($model->enddate)) {
                    $numRowsSql .= " AND TRUNC(TANGGAL) <= :enddate";
                 }

                $numRowsSql .= " ORDER BY AKUN, TANGGAL ASC ) a";
            $numRows = $connection->createCommand($numRowsSql, $params)->queryScalar();

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
        
        return $this->actionIndex();
    }
}