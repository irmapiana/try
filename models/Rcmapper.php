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
class Rcmapper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_rc_mapper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid'], 'required'],
            [['productid'], 'string', 'max' => 20],
            [['rc'], 'string', 'max' => 4],
            [['message'], 'string', 'max' => 120],
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
            'rc' => 'RC',
            'message' => 'MESSAGE',
        ];
    }
}
