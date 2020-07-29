<?php

namespace app\controllers;

use Yii;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\DynamicModel;

class TrxbalanceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['orgid']);
        $model->addRule(['orgid'], 'required');

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'orgid' orgid, 'groupid' groupid, 'address' address, 'email' email FROM dual
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
            $connection = Yii::$app->getDb();
            $command = $connection->createCommand("
                SELECT a.orgid, a.orgname, a.parent_orgid parentid, b.balance, a.address, a.email
                FROM   
                (SELECT orgid, orgname, NVL(parent_orgid,'No Parent') parent_orgid, address, NVL(email,'NA') email
                    FROM m_org
                    WHERE orgid = :orgid
                    ) a,
                (SELECT userid, (bbalance - debit + credit) balance
                    FROM t_acccontrol) b   
                WHERE
                a.orgid = b.userid (+)
                ", [':orgid' => $model->orgid]);
            $numRows = $connection->createCommand("SELECT COUNT(*) FROM (
                SELECT a.orgid, a.orgname, a.parent_orgid parentid, b.balance, a.address, a.email
                FROM   
                (SELECT orgid, orgname, NVL(parent_orgid,'No Parent') parent_orgid, address, NVL(email,'NA') email
                    FROM m_org
                    WHERE orgid = :orgid
                    ) a,
                (SELECT userid, (bbalance - debit + credit) balance
                    FROM t_acccontrol) b   
                WHERE
                a.orgid = b.userid (+)
            ) a", [':orgid' => $model->orgid])->queryScalar();

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
