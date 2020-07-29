<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_schema".
 *
 * @property string $productid
 * @property string $itemid
 * @property string $SCHEMAID
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 * @property string $CLASSNAME
 * @property string $ITYPE
 * @property integer $CA_ADMINFEE
 * @property string $FIX_CA_ADMINFEE
 * @property string $CASHBACKID
 * @property integer $MINUS_FACTOR
 * @property integer $PLUS_FACTOR
 * @property string $INVOICE_METHOD
 * @property integer $PPN
 * @property string $BANKCODE
 * @property string $ORGID
 * @property string $active
 * @property string $CONVERTER
 * @property string $DESTINATIONID
 * @property string $RECON_CODE
 * @property string $PID
 * @property string $userid
 * @property string $CID
 * @property string $MULTIPLY_FACTOR
 * @property string $FEEBASE
 * @property string $UPDATED
 * @property string $sch_updatedD
 * @property string $CALENDARID
 * @property string $ADMININCLUDE
 * @property string $INPUT1
 * @property string $INPUT2
 * @property string $INPUT3
 * @property string $INPUT4
 * @property string $spriceid
 * @property string $PPRICEID
 *
 * @property MPRODUCT $pRODUCT
 */
class Mschemaprice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_price_schema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['spriceid', 'sch_updated'], 'required'],
            [['active'], 'string', 'max' => 1],
            [['schedule_rules'], 'string', 'max' => 40],
            [['priority'], 'integer'],
            [['cby', 'mby'], 'string', 'max' => 20],
           /* [['cdate', 'mdate'], 'string', 'max' => 7],*/
            [['spriceid', 'spriceid', 'spriceid', 'spriceid', 'sch_updated', 'sch_updated', 'sch_updated', 'sch_updated'], 'unique', 'targetAttribute' => ['spriceid', 'spriceid', 'spriceid', 'spriceid', 'sch_updated', 'sch_updated', 'sch_updated', 'sch_updated'], 'message' => 'The combination of spriceid and Sch  Update has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'spriceid' => 'PRICE SKEMA',
            'cby' => 'DIBUAT OLEH',
            'cdate' => 'TANGGAL DIBUAT',
            'mby' => 'DIUBAH OLEH',
            'mdate' => 'TERAKHIR DIUBAH',
            'active' => 'AKTIF',
            'sch_updated' => 'SCH UPDATE',
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');
                return true;
            }else{
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                return true;
            }
        }
        return false;
    }

    /**
     * @return \yii\db\activeQuery
     */
    /*public function getPRODUCT()
    {
        return $this->hasOne(Mproduct::className(), ['productid' => 'productid']);
    }

    /*public function getOrg(){
        return $this->hasOne(Morg::className(), ['orgid' => 'orgid']);
    }

    public function getBank(){
        return $this->hasOne(Bank::className(), ['bankcode' => 'bankcode']);
    }

    public function getAcc(){
        return $this->hasOne(Maccount::className(), ['userid' => 'userid']);
    }*/
}
