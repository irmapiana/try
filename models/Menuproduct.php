<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
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
class Menuproduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_menu_product_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid'], 'required'],
            [['group_menuid'], 'string', 'max' => 50],
            [['next_class'], 'string', 'max' => 100],
            [['productid'], 'string', 'max' => 20],
            [['itemid'], 'string', 'max' => 20],
            [['group_menuid', 'group_menuid', 'group_menuid', 'group_menuid'], 'unique', 'targetAttribute' => ['group_menuid', 'group_menuid', 'group_menuid', 'group_menuid'], 'message' => 'The combination of  and group_menuid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_menuid' => 'GROUP MENU',
            'next_class' => 'KELAS',
            'productid' => 'PRODUCT',
            'itemid' => 'PRODUCT ITEM',
        ];
    }

    public static function getProduct()
    {
        return self::find()->select(['product_name' , 'productid'])->indexBy('productid')->column();
    }

    public static function getItemidList($prod_id)
    {
       $dproductitem = self::find()
       ->select(['itemid', 'itemname'])
       ->where(['productid' => $prod_id])
       ->asArray()
       ->all();

       return $dproductitem;
    }
}
