<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "M_BANK".
 *
 * @property string $BANKCODE
 * @property string $BANKNAME
 * @property string $NOTE
 * @property string $CBY
 * @property string $CDATE
 * @property string $MBY
 * @property string $MDATE
 * @property string $ACTIVE
 */
class Productmessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_product_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid'], 'required'],
            [['productid','itemid'], 'string', 'max' => 20],
            [['message_prefix'], 'string', 'max' => 30],
            [['productid', 'productid', 'productid', 'productid'], 'unique', 'targetAttribute' => ['productid', 'productid', 'productid', 'productid'], 'message' => 'The combination of  and productid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productid' => 'PRODUCT',
            'itemid' => 'PRODUCT ITEM',
            'message_prefix' => 'MESSAGE',
        ];
    }
}
