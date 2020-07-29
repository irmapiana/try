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
class Mspriceadmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_default_adminitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aitemid'], 'required'],
            [['aitem_fee'], 'number'],
            [['aitemid', 'spriceid'], 'string', 'max' => 50],
            [['productid', 'itemid'], 'string', 'max' => 20],
            [['aitem_validfrom', 'aitem_validuntil'], 'string', 'max' => 10],
            // [['cby', 'mby'], 'string', 'max' => 100],
            [['aitemid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'aitemid' => 'KODE ADMIN',
            'spriceid' => 'KODE HARGA',
            'productid' => 'PRODUK',
            'itemid' => 'ITEM',
            'aitem_fee' => 'ADMIN',
            'aitem_validfrom' => 'TGL BERLAKU',
            'aitem_validuntil' => 'TGL BERAKHIR',
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
