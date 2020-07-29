<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "M_SPRICEADMIN".
 *
 * @property string $SPADMINID
 * @property string $spriceid
 * @property string $productid
 * @property string $itemid
 * @property string $SPADMIN_PRICE
 * @property string $SPADMIN_VALIDFROM
 * @property string $SPADMIN_VALIDUNTIL
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Madminandfee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_admin_and_fees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['ks_fee', 'admin', 'fix_admin', 'merchant_fee', 'fix_merchant_fee'], 'number'],
            [['id', 'spriceid'], 'string', 'max' => 50],
            [['productid', 'itemid'], 'string', 'max' => 20],
            //[['valid_from', 'valid_until'], 'string', 'max' => 10],
            // [['cby', 'mby'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'KODE ADMIN',
            'spriceid' => 'SKEMA HARGA',
            'productid' => 'PRODUK',
            'itemid' => 'ITEM',
            'ks_fee' => 'KS FEE',
            'admin' => 'ADMIN',
            'fix_admin' => 'FIX ADMIN',
            'merchant_fee' => 'MERCHANT FEE',
            'fix_merchant_fee' => 'FIX MERCHANT FEE',
            'valid_from' => 'TGL BERLAKU',
            'valid_until' => 'TGL BERAKHIR',
            /*'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',*/
        ];
    }


    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                // $this->SPITEM_VALIDFROM = new Expression("TO_DATE('" . $this->SPITEM_VALIDFROM . "', 'yyyy/mm/dd')");
                // $this->SPITEM_VALIDUNTIL = new Expression("TO_DATE('" . $this->SPITEM_VALIDUNTIL . "', 'yyyy/mm/dd')");
                return true;
            } else {
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
