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
class Mblock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_unblock_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid'], 'required'],
            [['userid'], 'string', 'max' => 20],
	    [['logindate'], 'string'],
	    [['flag'], 'integer'],
            [['account_name'], 'string', 'max' => 32],
            [['accountno'], 'string', 'max' => 20],
	    [['card_number'], 'string', 'max'=>19],
            //[['userid', 'userid', 'userid', 'userid'], 'userid', 'targetAttribute' => ['userid', 'userid', 'userid', 'userid'], 'message' => 'The combination of  and userid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'accountno' => 'NO REK',
            'account_name' => 'NAMA',
            'userid' => 'USERID',
	    'logindate' => 'LOGIN DATE',
	    'flag' => 'FLAG',
	    'card_number' => 'NO KARTU',
        ];
    }
}
