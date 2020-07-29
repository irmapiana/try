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
class productmenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_product_group_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_menuid'], 'required'],
            [['group_menuid'], 'string', 'max' => 50],
            [['itemid'], 'string', 'max' => 20],
            [['item_seq'], 'integer'],
            [['next_class'], 'string', 'max' => 100],
            [['active'], 'string', 'max' => 1],
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
            'itemid' => 'PRODUCT ITEM',
            'item_seq' => 'ITEM SEQ',
            'next_class' => 'NEXT CLASS',
            'active' => 'ACTIVE',
        ];
    }
}
