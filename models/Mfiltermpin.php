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
class Mfiltermpin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_filter_mpin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mpin'], 'required'],
            [['mpin'], 'string', 'max' => 6],
            [['mpin', 'mpin', 'mpin', 'mpin'], 'unique', 'targetAttribute' => ['mpin', 'mpin', 'mpin', 'mpin'], 'message' => 'The combination of  and Bankcode has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mpin' => 'Mobile Pin',
        ];
    }
}
