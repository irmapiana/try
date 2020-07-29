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
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_code'], 'required'],
            [['bank_code'], 'string', 'max' => 10],
            [['bank_name'], 'string', 'max' => 100],
            [['network'], 'string', 'max' => 10],
            [['bank_code', 'bank_code', 'bank_code', 'bank_code'], 'unique', 'targetAttribute' => ['bank_code', 'bank_code', 'bank_code', 'bank_code'], 'message' => 'The combination of  and Bankcode has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bank_code' => 'KODE BANK',
            'bank_name' => 'Bankname',
            'network' => 'Jaringan',
        ];
    }
}
