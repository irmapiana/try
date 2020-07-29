<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "M_BANK_ACCOUNT".
 *
 * @property string $BANK_CODE
 * @property string $BANK_NAME
 * @property string $ACCOUNT_NO
 * @property string $ACCOUNT_NAME
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 * @property string $active
 */
class Mbankaccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'M_BANK_ACCOUNT';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BANK_CODE'], 'string', 'max' => 11],
            [['BANK_NAME', 'ACCOUNT_NAME'], 'string', 'max' => 50],
            [['ACCOUNT_NO'], 'string', 'max' => 40],
            [['cby', 'mby'], 'string', 'max' => 20],
            [['cdate', 'mdate'], 'string', 'max' => 7],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BANK_CODE' => 'Bank  Code',
            'BANK_NAME' => 'BANK',
            'ACCOUNT_NO' => 'Account  No',
            'ACCOUNT_NAME' => 'Account  Name',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
            'active' => 'active',
        ];
    }
}
