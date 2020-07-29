<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;
/**
 * This is the model class for table "M_ORG".
 *
 * @property integer $ISOBIT
 * @property string $ISOVALUE
 * @property string $ADDRESS
 * @property string $PIC
 * @property string $EMAIL
 * @property string $TLP
 * @property integer $BALANCE
 * @property string $CHECKLIMIT
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 * @property string $ORGNAME
 * @property string $ORGID
 * @property string $ITEXT
 * @property string $PRINT
 * @property string $PARENT_ORGID
 * @property string $ISDEALER
 */
class Morg extends \yii\db\activeRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_schema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ISOBIT', 'bbalance'], 'integer'],
            [['orgid'], 'required'],
            [['ISOVALUE', 'address'], 'string', 'max' => 255],
            [['PIC', 'EMAIL', 'orgid', 'PARENT_ORGID'], 'string', 'max' => 50],
            // [['TLP', 'cby', 'mby'], 'string', 'max' => 20],
            [['CHECKLIMIT', 'PRINT', 'ISDEALER'], 'string', 'max' => 1],
            // [['cdate', 'mdate'], 'string', 'max' => 7],
            [['ITEXT'], 'string', 'max' => 1000],
            [['orgid', 'orgid', 'orgid', 'orgid'], 'unique', 'targetAttribute' => ['orgid', 'orgid', 'orgid', 'orgid'], 'message' => 'The combination of  and Orgid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ISOBIT' => 'Isobit',
            'ISOVALUE' => 'Isovalue',
            'address' => 'ALAMAT',
            'PIC' => 'PIC',
            'EMAIL' => 'EMAIL',
            'TLP' => 'TELEPON',
            'bbalance' => 'SALDO AWAL',
            'CHECKLIMIT' => 'CHECK LIMIT',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
            'orgid' => 'KODE ORG',
            'ITEXT' => 'Itext',
            'PRINT' => 'Print',
            'PARENT_ORGID' => 'ORG PARENT',
            'ISDEALER' => 'DEALER',
        ];
    }

    public function getIsDealerLabel()
    {
        return $this->ISDEALER ? 'Y' : 'N';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->ISOBIT = 42;
                $this->ISOVALUE = "0MSP00";
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                return true;
            }
        }
        return false;
    }

    public function getConcat()
    {
        return $this->orgid . " (" . $this->orgid . ")";
    }

    public static function getList()
    {

        //Jika Role Super User
        if (Yii::$app->user->identity->role == Yii::$app->params['roleSuperUser']) {
            return ArrayHelper::map(Morg::find()->all(), 'orgid', 'concat');
        }

        //Jika Role Direct Marketing

        if (Yii::$app->user->identity->role == Yii::$app->params['roleDirectMarketing']) {

            $orgidList = null;
            $network = Morg::getNetworkAll(Yii::$app->user->identity->id)->getModels();
            if($network)
            {
                foreach ($network as $net)
                {
                    $orgidList[] = $net['orgid'];
                }
            }
            return ArrayHelper::map(Morg::find()->where(['orgid' => $orgidList])->all(), 'orgid', 'concat');
        }

        //Jika role Loket
        if (Yii::$app->user->identity->role == Yii::$app->params['roleLoket']) {
            return ArrayHelper::map(Morg::find()->where(['orgid' => Yii::$app->user->identity->id])->all(), 'orgid', 'concat');
        }

    }

    public static function getNetwork($orgid)
    {
        $connection = Yii::$app->getDb();

        $params = [
            ':orgid' => $orgid,

        ];
        $sql = "SELECT A.cdate, A.orgid, A.PARENT_ORGNAME, A.PARENT_ORGID, B.LVL FROM 
                (SELECT a.cdate, b.orgid, parent_orgname, b.parent_orgid
                FROM t_accmutation a, m_schema b, m_schema c
                WHERE  a.mtype = 10
                    AND a.amount < 0
                    AND a.userid = b.orgid
                    AND b.parent_orgid = c.orgid) A,
                (SELECT orgid, LEVEL lvl
                    FROM m_org
                    WHERE LEVEL <=3
                    START WITH orgid = :orgid
                    CONNECT BY PRIOR orgid = parent_orgid
                    ORDER SIBLINGS BY orgname) B
                WHERE A.orgid = B.orgid
                ORDER BY A.cdate ASC
                ";
        $command = $connection->createCommand($sql, $params);
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql,
            'params'    => $params,

        ]);

        return $dataProvider;
    }

    public static function getNetworkAll($orgid)
    {
        $connection = Yii::$app->getDb();

        $params = [
            ':orgid' => $orgid,

        ];
        $sql = "SELECT A.cdate, A.ORGNAME, A.ORGID, A.PARENT_ORGNAME, A.PARENT_ORGID, B.LVL FROM 
                (SELECT a.cdate, b.orgname, b.orgid, c.orgname parent_orgname, b.parent_orgid
                FROM t_accmutation a, m_org b, m_org c
                WHERE  a.mtype = 10
                    AND a.amount < 0
                    AND a.userid = b.orgid
                    AND b.parent_orgid = c.orgid) A,
                (SELECT orgid, LEVEL lvl
                    FROM m_org
                    START WITH orgid = :orgid
                    CONNECT BY PRIOR orgid = parent_orgid
                    ORDER SIBLINGS BY orgname) B
                WHERE A.orgid = B.orgid
                ORDER BY A.cdate ASC
                ";
        $command = $connection->createCommand($sql, $params);
        $dataProvider = new SqlDataProvider([
            'sql'       => $command->sql,
            'params'    => $params,

        ]);

        return $dataProvider;
    }

    public static function getTrxLevelSatuTotal($orgid)
    {
        //$orgid,$startdate,$enddate
       // $orgid = "081286374705";
        $startdate = "01-May-1900";
        $enddate = "30-May-1900";

        if(Yii::$app->request->queryParams != null)
        {

            if(isset(Yii::$app->request->queryParams['DynamicModel']['startdate'])){

                $startdate =  Yii::$app->request->queryParams['DynamicModel']['startdate'];


            }

            if(isset(Yii::$app->request->queryParams['DynamicModel']['enddate'])){

                $enddate =  Yii::$app->request->queryParams['DynamicModel']['enddate'];


            }

        }
        $params = [
            ':orgid' =>$orgid,
            ':startdate' => $startdate,
            ':enddate' => $enddate,
        ];
        $connection = Yii::$app->getDb();

        $sql = "SELECT sum(trx_total) as total FROM (
SELECT trx.orgid, trx.orgname, trx.productid, trx.parentid, trx.lvl, trx.pth, trx.sum_trx as trx_total, trx.sum_harga, trx.sum_admin, trx.sum_commission, trx.total, trx.sum_point, p.product_name
                FROM (SELECT a.orgid , a.orgname, b.productid, a.parent_orgid parentid, a.lvl, a.pth, nvl(b.sum_trx,'0') sum_trx, nvl(b.sum_harga,'0') sum_harga , nvl(b.sum_admin,'0') sum_admin,  nvl(b.sum_commission,'0') sum_commission,
                    nvl((sum_harga+sum_admin-sum_commission),'0') total, nvl(b.sum_point,'0') sum_point
                    FROM   
                    (SELECT orgid, orgname, parent_orgid, LEVEL lvl, SYS_CONNECT_BY_PATH(orgname,'|') pth
                        FROM m_org
                        WHERE LEVEL = 1
                        START WITH orgid = :orgid
                        CONNECT BY PRIOR orgid = parent_orgid
                        ORDER SIBLINGS BY orgname) a,   
                    (SELECT orgid, productid, sum(to_number(nvl(data10,'0'))) sum_trx, sum(to_number(nvl(data8,'0'))) sum_harga , sum(to_number(nvl(data9,'0'))) sum_admin,   nvl(sum(commission),'0') sum_commission
                      ,nvl(sum(point),'0') sum_point                        
                      FROM t_front 
                        WHERE 
                        TRUNC(tdate) >= :startdate  AND 
                        TRUNC(tdate) <= :enddate AND
                        settflag = 2 or settflag = 4
                        GROUP BY orgid, productid) b   
                    WHERE
                    a.orgid = b.orgid (+)
                    ) trx
                JOIN m_product p
                ON p.productid = trx.productid
                )";

       // $command = $connection->createCommand($sql, $params);

       $dataProvider = new SqlDataProvider([
            'sql'       => $sql,
         //   'totalCount'=> $numRows,
            'params'    => $params,

       ]);
       $model = $dataProvider->getModels();

        return $model[0]['TOTAL'];

    }

    public static function getTrxLevelDuaTotal($orgid)
    {
        $startdate = "01-May-1900";
        $enddate = "30-May-1900";

        if(Yii::$app->request->queryParams != null)
        {

            if(isset(Yii::$app->request->queryParams['DynamicModel']['startdate'])){

                $startdate =  Yii::$app->request->queryParams['DynamicModel']['startdate'];


            }

            if(isset(Yii::$app->request->queryParams['DynamicModel']['enddate'])){

                $enddate =  Yii::$app->request->queryParams['DynamicModel']['enddate'];


            }

        }


        $params = [
            ':orgid' =>$orgid,
            ':startdate' => $startdate,
            ':enddate' => $enddate,
        ];
        $connection = Yii::$app->getDb();

        $sql = "SELECT sum(trx_total) as total FROM (
SELECT trx.orgid, trx.orgname, trx.productid, trx.parentid, trx.lvl, trx.pth, trx.sum_trx as trx_total, trx.sum_harga, trx.sum_admin, trx.sum_commission, trx.total, trx.sum_point, p.product_name
                FROM (SELECT a.orgid , a.orgname, b.productid, a.parent_orgid parentid, a.lvl, a.pth, nvl(b.sum_trx,'0') sum_trx, nvl(b.sum_harga,'0') sum_harga , nvl(b.sum_admin,'0') sum_admin,  nvl(b.sum_commission,'0') sum_commission,
                    nvl((sum_harga+sum_admin-sum_commission),'0') total, nvl(b.sum_point,'0') sum_point
                    FROM   
                    (SELECT orgid, orgname, parent_orgid, LEVEL lvl, SYS_CONNECT_BY_PATH(orgname,'|') pth
                        FROM m_org
                        WHERE LEVEL = 2
                        START WITH orgid = :orgid
                        CONNECT BY PRIOR orgid = parent_orgid
                        ORDER SIBLINGS BY orgname) a,   
                    (SELECT orgid, productid, sum(to_number(nvl(data10,'0'))) sum_trx, sum(to_number(nvl(data8,'0'))) sum_harga , sum(to_number(nvl(data9,'0'))) sum_admin,   nvl(sum(commission),'0') sum_commission
                      ,nvl(sum(point),'0') sum_point                        
                      FROM t_front 
                        WHERE 
                        TRUNC(tdate) >= :startdate  AND 
                        TRUNC(tdate) <= :enddate AND
                        settflag = 2 or settflag = 4
                        GROUP BY orgid, productid) b   
                    WHERE
                    a.orgid = b.orgid (+)
                    ) trx
                JOIN m_product p
                ON p.productid = trx.productid
                )";

        // $command = $connection->createCommand($sql, $params);

        $dataProvider = new SqlDataProvider([
            'sql'       => $sql,
            //   'totalCount'=> $numRows,
            'params'    => $params,

        ]);
        $model = $dataProvider->getModels();

        return $model[0]['TOTAL'];

    }

    public static function getLevelDuaTotal($orgid)
    {

        $params = [
            ':orgid' => $orgid,

        ];

        $connection = Yii::$app->getDb();
        $sql = "SELECT A.cdate, A.ORGNAME, A.ORGID, A.PARENT_ORGNAME, A.PARENT_ORGID, B.LVL FROM 
                (SELECT a.cdate, b.orgname, b.orgid, c.orgname parent_orgname, b.parent_orgid
                FROM t_accmutation a, m_org b, m_org c
              ";


        $sql .= " WHERE a.mtype = 10
                    AND a.amount < 0
                    AND a.userid = b.orgid
                    AND b.parent_orgid = c.orgid) A,
                (SELECT orgid, LEVEL lvl
                    FROM m_org
                    WHERE LEVEL = 2 
                    START WITH orgid = :orgid
                    CONNECT BY PRIOR orgid = parent_orgid
                    ORDER SIBLINGS BY orgname) B
                WHERE A.orgid = B.orgid
                ORDER BY A.cdate ASC";
        $command = $connection->createCommand($sql, $params);
        $numRows = $connection->createCommand("SELECT COUNT(*) FROM (" . $sql . ") a", $params)->queryScalar();

        return $numRows;
    }



}
