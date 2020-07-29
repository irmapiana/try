<?php

namespace app\controllers;

use Yii;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\DynamicModel;

class NetworkbalanceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['orgid']);
        $model->addRule(['orgid'], 'required');

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'ORGNAME' ORGNAME, 'ADDRESS' ADDRESS, 'EMAIL' EMAIL, 'BALANCE' BALANCE FROM dual
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
        $model = new DynamicModel(['orgid']);
        $model->addRule(['orgid'], 'required');
        
        //use value 0811882343 if you want to hardcode the query criteria
        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $params = [
                ':orgid' => $model->orgid,
            ];
            $connection = Yii::$app->getDb();

            $sql = "
                SELECT a.orgid, a.orgname, a.parent_orgid parentid, a.lvl, a.pth, b.balance, c.poin
                FROM
                (SELECT orgid, orgname, parent_orgid, LEVEL lvl, SYS_CONNECT_BY_PATH(orgname,'|') pth
                FROM m_org ";
            if (Yii::$app->user->identity->role != Yii::$app->params['roleSuperUser']) {
                $sql .= "WHERE LEVEL <=3 AND LEVEL >1";
            }
            $sql .= "START WITH orgid = :orgid
                 CONNECT BY PRIOR orgid = parent_orgid
                ORDER SIBLINGS BY orgname) a,
                 (SELECT userid, (bbalance - debit + credit) balance
                FROM t_acccontrol) b , 
                (SELECT userid, (bbalance - debit + credit) poin
                FROM t_rewcontrol) c WHERE a.orgid = b.userid 
                and b.userid  = c.userid (+)
                ";

            $command = $connection->createCommand($sql, $params);
            $numRows = $connection->createCommand("SELECT COUNT(*) FROM (" . $sql . ") a", $params)->queryScalar();


            $dataProvider = new SqlDataProvider([
                'sql'       => $command->sql,
                'totalCount'=> $numRows,
                'params'    => [':orgid' => $model->orgid],
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
