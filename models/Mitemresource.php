<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use app\models\Dproductitem;

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
class Mitemresource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_item_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid'], 'required'],
            // [['productid', 'cby', 'MBY'], 'string', 'max' => 20],
            [['itemid', 'resourceid'], 'string', 'max' => 20],
            //[['CDATE', 'MDATE'], 'string', 'max' => 7],
            // [['productid', 'productid', 'productid', 'productid'], 'unique', 'targetAttribute' => ['productid', 'productid', 'productid', 'productid'], 'message' => 'The combination of  and productid has already been taken.'],
             [['itemid'], 'unique', 'targetAttribute' => ['itemid'], 'message' => 'ID Item sudah ada.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemid' => 'ITEM ID',
            'resourceid' => 'RESOURCE ID',
            'cby' => 'cby',
            'cdate' => 'Cdate',
            'mby' => 'Mby',
            'mdate' => 'Mdate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
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

    public function getProductItem()
    {
        return $this->hasOne(Dproductitem::className(), ['itemid' => 'itemid']);
    }
}
?>