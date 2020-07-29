<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_rewarditem".
 *
 * @property string $SREWARDID
 * @property string $spriceid
 * @property string $productid
 * @property string $itemid
 * @property integer $SREWARD_POINT_0
 * @property integer $SREWARD_POINT_1
 * @property integer $SREWARD_POINT_2
 * @property string $SREWARD_VALIDFROM
 * @property string $SREWARD_VALIDUNTIL
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Msalesreward extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_rewarditem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reward_typeid'], 'required'],
            [['reward_minimum', 'reward_maximum'], 'integer'],
            [['reward_typeid','spriceid'], 'string', 'max'=>50],
            [['productid', 'itemid', 'cby', 'mby'], 'string', 'max' => 20],
            [['reward_typeid', 'reward_typeid'], 'unique', 'targetAttribute' => ['reward_typeid', 'reward_typeid'], 'message' => 'The combination of  and reward_typeid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reward_typeid' => 'KODE REWARD PENJUALAN',
            'spriceid' => 'KODE HARGA',
            'productid' => 'PRODUK',
            'itemid' => 'ITEM',
            'reward_minimum' => 'REWARD Minimum',
            'reward_maximum' => 'REWARD Maximum',
            'rewarditem_validfrom' => 'TANGGAL BERLAKU',
            'rewarditem_validuntil' => 'TANGGAL BERAKHIR',
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
                $this->rewarditem_validfrom = new Expression("TO_DATE('" . $this->rewarditem_validfrom . "', 'yyyy/mm/dd')");
                $this->rewarditem_validuntil = new Expression("TO_DATE('" . $this->rewarditem_validuntil . "', 'yyyy/mm/dd')");
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
