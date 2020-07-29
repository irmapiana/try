<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "d_productitem".
 *
 * @property string $productid
 * @property string $itemid
 * @property string $NOTE
 * @property string $cby
 * @property string $CDATE
 * @property string $MBY
 * @property string $MDATE
 * @property string $itemname
 * @property string $ACTIVE
 *
 * @property PLINKSITMSCHEMA[] $pLINKSITMSCHEMAs
 */
class Dproductitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_productitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid','itemid','itemname'], 'required'],
            [['productid', 'itemid', 'transaction_type'], 'string', 'max' => 20],
            [['note'], 'string', 'max' => 256],
            [['itemname', 'header_receipt', 'nominal_alias'], 'string', 'max' => 100],
            [['active'], 'string', 'max' => 1],
            [['denom', 'denom_notation'], 'integer'],
            [['shortname'], 'string', 'max' => 140],
            [['footer_receipt'], 'string', 'max' => 500],
            [['logo'], 'string', 'max' => 10],

            [['productid', 'productid', 'productid', 'productid', 'itemid', 'itemid', 'itemid', 'itemid'], 'unique', 'targetAttribute' => ['productid', 'productid', 'productid', 'productid', 'itemid', 'itemid', 'itemid', 'itemid'], 'message' => 'The combination of productid and itemid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productid' => 'PRODUK',
            'itemid' => 'ITEM',
            'itemname' => 'NAMA ITEM',
            'note' => 'CATATAN',
            'cby' => 'DIBUAT OLEH',
            'cdate' => 'DIBUAT TANGGAL',
            'mby' => 'DIUBAH OLEH',
            'mdate' => 'TERAKHIR DIUBAH',
            'active' => 'AKTIF',
            'transaction_type' => 'TIPE TRANSAKSI',
            'denom' => 'DENOM',
            'shortname' => 'SHORT NAME',
            'header_receipt' => 'HEADER',
            'nominal_alias' => 'NOMINAL',
            'footer_receipt' => 'FOOTER',
            'denom_notation' => 'DENOM NOTATION',
            'logo' => 'LOGO',
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
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                return true;
            }
        }
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPLINKSITMSCHEMAs()
    {
        return $this->hasMany(PLINKSITMSCHEMA::className(), ['productid' => 'productid', 'itemid' => 'itemid']);
    }
     public static function getProduct()
    {
        return self::find()->select([ 'productid'])->indexBy('productid')->column();
    }

    public static function getItemidList($prod_id)
    {
       $dproductitems = self::find()
       ->select(['itemid', 'itemname'])
       ->where(['productid' => $prod_id])
       ->asArray()
       ->all();

       return $dproductitem;
    }

    public static function getDproductitems($prod_id)
    {
        return self::find()->select(['itemname' , 'itemid'])->where(['productid' => $prod_id])->indexBy('productid')->column();
    }
}
