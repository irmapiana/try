<?php

namespace app\controllers;

use Yii;
use yii\db\Connection;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\base\DynamicModel;
use yii\data\Pagination;

class NetworkorgController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['orgid']);
        $model->addRule(['orgid'], 'required');

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT 'ORGID' ORGID, 'ORGNAME' ORGNAME, 'PARENT_ORGID' PARENT_ORGID, 'LVL' LVL, 'PTH' PTH, 'ADDRESS' ADDRESS, 'EMAIL' EMAIL FROM dual
                WHERE ROWNUM < 1
            ");

        // $result = $command->queryAll();
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'data' => $command
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
            $sql = "SELECT org_lvl.*, m_org.address, m_org.email FROM (
                        SELECT orgid, orgname, parent_orgid, LEVEL lvl, SYS_CONNECT_BY_PATH(orgname,'|') pth
                        FROM m_org ";
            if (Yii::$app->user->identity->role != Yii::$app->params['roleSuperUser']) {
                $sql .= "WHERE LEVEL <=3 AND LEVEL >1";
            }
           $sql .= "START WITH orgid = :orgid
                        CONNECT BY PRIOR orgid = parent_orgid
                        ORDER SIBLINGS BY orgname) org_lvl
                    JOIN m_org ON org_lvl.orgid = m_org.orgid
                ";
            $command = $connection->createCommand($sql, [':orgid' => $model->orgid]);
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
