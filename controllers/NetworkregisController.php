<?php

namespace app\controllers;

use Yii;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\DynamicModel;
use yii\data\Pagination;

class NetworkregisController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['orgid', 'startdate', 'enddate']);
        $model->addRule(['orgid', 'startdate'], 'required');
        
         $model->startdate = date('d-M-Y');
        $model->enddate = date('d-M-Y');

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'ORGID' ORGID, 'ORGNAME' ORGNAME, 'PARENT_ORGNAME' PARENT_ORGNAME, 'PARENT_ORGID' PARENT_ORGID, 'LVL' LVL FROM dual
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
            $params = [
                    ':orgid' => $model->orgid,
                    ':startdate' => $model->startdate,
            ];
            $connection = Yii::$app->getDb();
            $sql = "SELECT A.cdate, A.ORGNAME, A.ORGID, A.PARENT_ORGNAME, A.PARENT_ORGID, B.LVL FROM 
                (SELECT a.cdate, b.orgname, b.orgid, c.orgname parent_orgname, b.parent_orgid
                FROM t_accmutation a, m_org b, m_org c
                WHERE TRUNC(a.cdate) >= :startdate ";
            
            if (!empty($model->enddate)) {
                $sql .= " AND TRUNC(a.cdate) <= :enddate ";
                $params[':enddate'] = $model->enddate;
            }

                $sql .= " AND a.mtype = 10
                    AND a.amount < 0
                    AND a.userid = b.orgid
                    AND b.parent_orgid = c.orgid) A,
                (SELECT orgid, LEVEL lvl
                    FROM m_org ";

            if (Yii::$app->user->identity->role != Yii::$app->params['roleSuperUser']) {
                $sql .= "WHERE LEVEL <=3 AND LEVEL >1";
            }

            $sql .= "START WITH orgid = :orgid
                    CONNECT BY PRIOR orgid = parent_orgid
                    ORDER SIBLINGS BY orgname) B
                WHERE A.orgid = B.orgid
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
                'model' => $model,
            ]);
        }
        
        return $this->actionIndex();
    }
}
