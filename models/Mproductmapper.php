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
class Mproductmapper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_product_mapper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid1', 'itemid1', 'switch'], 'required'],
            [['productid1','itemid1', 'productid2', 'itemid2'], 'string', 'max' => 20],
            [['info'], 'string', 'max' => 100],
            [['switch'], 'string', 'max' => 3],
            //[['CDATE', 'MDATE'], 'string', 'max' => 7],
            [['active'], 'string', 'max' => 1],
            // [['productid', 'productid', 'productid', 'productid'], 'unique', 'targetAttribute' => ['productid', 'productid', 'productid', 'productid'], 'message' => 'The combination of  and productid has already been taken.'],
             [['productid1'], 'unique', 'targetAttribute' => ['productid1'], 'message' => 'ID PRODUK sudah ada.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productid1' => 'KODE PRODUK 1',
            'itemid1' => 'KODE ITEM 1',
            'productid2' => 'KODE  PRODUCT 2',
            'itemid2' => 'KODE ITEM 2',
            'switch' => 'SWITCH',
            'active' => 'AKTIF',
            'info' => 'INFO',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getConcat()
    {
        return $this->productid1;
    }
}
?>