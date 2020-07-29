<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_purchasepriceitem".
 *
 * @property string $SPitemid
 * @property string $spriceid
 * @property string $productid
 * @property string $itemid
 * @property string $SPITEM_PRICE
 * @property string $SPITEM_VALIDFROM
 * @property string $SPITEM_VALIDUNTIL
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Mspriceitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_default_sellingfeeitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sfitemid'], 'required'],
            [['itemid'], 'string'],
            [['sfitemid', 'spriceid'], 'string', 'max' => 50],
            [['productid', 'itemid'], 'string', 'max' => 20],
            [['sfitemid', 'sfitemid', 'sfitemid'], 'unique', 'targetAttribute' => ['sfitemid', 'sfitemid', 'sfitemid'], 'message' => 'The combination of  and sfitemid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sfitemid' => 'KODE HARGA ITEM',
            'spriceid' => 'KODE HARGA',
            'productid' => 'PRODUK',
            'itemid' => 'ITEM',
            'sfitem_fee' => 'HARGA',
            'sfitem_validfrom' => 'TANGGAL BERLAKU',
            'sfitem_validuntil' => 'TANGGAL BERAKHIR',
            /*'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',*/
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');
                // $this->SPITEM_VALIDFROM = new Expression("TO_DATE('" . $this->SPITEM_VALIDFROM . "', 'yyyy/mm/dd')");
                // $this->SPITEM_VALIDUNTIL = new Expression("TO_DATE('" . $this->SPITEM_VALIDUNTIL . "', 'yyyy/mm/dd')");
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                // $this->SPITEM_VALIDFROM = new Expression("TO_DATE('" . $this->SPITEM_VALIDFROM . "', 'yyyy/mm/dd')");
                // $this->SPITEM_VALIDUNTIL = new Expression("TO_DATE('" . $this->SPITEM_VALIDUNTIL . "', 'yyyy/mm/dd')");
                return true;
            }
        }
        return false;
    }
    public function getHarga()
    {
        return $this->hasOne(Msellprice::className(), ['spriceid' => 'spriceid']);
    }
    public function getProduct()
    {
        return $this->hasOne(Mproduct::className(), ['productid' => 'productid']);
    }
    public function getItem()
    {
        return $this->hasOne(Dproductitem::className(), ['itemid' => 'itemid']);
    }
}
