<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_product".
 *
 * @property string $productid
 * @property string $NOTE
 * @property string $cby
 * @property string $CDATE
 * @property string $MBY
 * @property string $MDATE
 * @property string $product_name
 * @property string $ACTIVE
 *
 * @property MSCHEMA[] $mSCHEMAs
 * @property PROTELMSCHEMA[] $pROTELMSCHEMAs
 * @property BMAS0K3MSCHEMA[] $bMAS0K3MSCHEMAs
 * @property PLINK0K3MSCHEMA[] $pLINK0K3MSCHEMAs
 */
class Mproduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid','product_name'], 'required'],
            // [['productid', 'cby', 'MBY'], 'string', 'max' => 20],
            [['note'], 'string', 'max' => 50],
            //[['CDATE', 'MDATE'], 'string', 'max' => 7],
            [['product_name'], 'string', 'max' => 100],
            [['active'], 'string', 'max' => 1],
            // [['productid', 'productid', 'productid', 'productid'], 'unique', 'targetAttribute' => ['productid', 'productid', 'productid', 'productid'], 'message' => 'The combination of  and productid has already been taken.'],
             [['productid'], 'unique', 'targetAttribute' => ['productid'], 'message' => 'ID PRODUK sudah ada.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productid' => 'PRODUK',
            'product_name' => 'NAMA PRODUK',
            'active' => 'AKTIF',
            'note' => 'CATATAN',
            'cby' => 'cby',
            'cdate' => 'Cdate',
            'mby' => 'Mby',
            'mdate' => 'Mdate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMSCHEMAs()
    {
        return $this->hasMany(MSCHEMA::className(), ['productid' => 'productid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPROTELMSCHEMAs()
    {
        return $this->hasMany(PROTELMSCHEMA::className(), ['productid' => 'productid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBMAS0K3MSCHEMAs()
    {
        return $this->hasMany(BMAS0K3MSCHEMA::className(), ['productid' => 'productid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPLINK0K3MSCHEMAs()
    {
        return $this->hasMany(PLINK0K3MSCHEMA::className(), ['productid' => 'productid']);
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
    
    public function getConcat()
    {
        return $this->productid." - ".$this->product_name;
    }

    public static function getProduct()
    {
        return self::find()->select(['product_name' , 'productid'])->indexBy('productid')->column();
    }
}
?>