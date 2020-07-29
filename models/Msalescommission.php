<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_default_sellingfeeitem".
 *
 * @property string $SCOMMISSIONID
 * @property string $spriceid
 * @property string $productid
 * @property string $itemid
 * @property string $SCOMMISSION_0
 * @property string $SCOMMISSION_1
 * @property string $SCOMMISSION_2
 * @property string $SCOMMISSION_VALIDFROM
 * @property string $SCOMMISSION_VALIDUNTIL
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Msalescommission extends \yii\db\ActiveRecord
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
            [['sfitemid','sfitem_validfrom','spriceid'], 'required'],
            [['sfitem_fee'], 'string', 'max' => 19],
            [['spriceid'], 'string', 'max' => 50],
            [['productid', 'itemid', 'cby', 'mby'], 'string', 'max' => 20],
            [['sfitemid', 'sfitemid', 'sfitemid'], 'unique', 'targetAttribute' => ['sfitemid', 'sfitemid', 'sfitemid'], 'message' => 'The combination of  and Scommissionid has already been taken.'],
            [
                ['sfitem_validuntil'],
                'default',
                'value' => null,
                'isEmpty' => function () {
                    return true;
                }
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sfitemid' => 'KODE KOMISI PENJUALAN',
            'spriceid' => 'KODE HARGA',
            'productid' => 'PRODUK',
            'itemid' => 'ITEM',
            'sfitem_fee' => 'KOMISI',
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
                // $this->SCOMMISSION_VALIDFROM = new Expression("TO_DATE('" . $this->SCOMMISSION_VALIDFROM . "', 'yyyy/mm/dd')");
                // $this->SCOMMISSION_VALIDUNTIL = new Expression("TO_DATE('" . $this->SCOMMISSION_VALIDUNTIL . "', 'yyyy/mm/dd')");
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
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
