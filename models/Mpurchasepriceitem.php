<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_purchasepriceitem".
 *
 * @property string $PPitemid
 * @property string $spriceid
 * @property string $productid
 * @property string $itemid
 * @property string $SPITEM_PRICE
 * @property string $SPITEM_VALIDFROM
 * @property string $SPIPEM_VALIDUNTIL
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Mpurchasepriceitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'M_PURCHASEPRICEITEM';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PPitemid'], 'required'],
            [['spriceid'], 'required'],
            [['productid', 'itemid'], 'string', 'max' => 20],
            [['PPITEM_PRICE'], 'number'],
            [['PPitemid', 'spriceid'], 'string', 'max' => 50],
            
            [['PPitemid', 'PPitemid', 'PPitemid'], 'unique', 'targetAttribute' => ['PPitemid', 'PPitemid', 'PPitemid'], 'message' => 'The combination of  and PPitemid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PPitemid' => 'KODE HARGA ITEM',
            'spriceid' => 'KODE HARGA',
            'productid' => 'PRODUK',
            'itemid' => 'ITEM',
            'PPITEM_PRICE' => 'HARGA',
            'PPITEM_VALIDFROM' => 'TANGGAL BERLAKU',
            'SPIPEM_VALIDUNTIL' => 'TANGGAL BERAKHIR',
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
                // $this->SPIPEM_VALIDUNTIL = new Expression("TO_DATE('" . $this->SPIPEM_VALIDUNTIL . "', 'yyyy/mm/dd')");
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                // $this->SPITEM_VALIDFROM = new Expression("TO_DATE('" . $this->SPITEM_VALIDFROM . "', 'yyyy/mm/dd')");
                // $this->SPIPEM_VALIDUNTIL = new Expression("TO_DATE('" . $this->SPIPEM_VALIDUNTIL . "', 'yyyy/mm/dd')");
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
