<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "D_DEVICEREGISTER".
 *
 * @property string $cdate
 * @property string $userid
 * @property string $MACADDRESS
 * @property string $LOGIN_STATUS
 */
class Ddeviceregister extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'D_DEVICEREGISTER';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'MACADDRESS'], 'required'],
            [['cdate'], 'string', 'max' => 7],
            [['userid'], 'string', 'max' => 20],
            [['MACADDRESS'], 'string', 'max' => 3900],
            [['LOGIN_STATUS'], 'string', 'max' => 1],
            [['userid', 'userid', 'userid', 'userid', 'userid', 'MACADDRESS', 'MACADDRESS', 'MACADDRESS', 'MACADDRESS', 'MACADDRESS'], 'unique', 'targetAttribute' => ['userid', 'userid', 'userid', 'userid', 'userid', 'MACADDRESS', 'MACADDRESS', 'MACADDRESS', 'MACADDRESS', 'MACADDRESS'], 'message' => 'The combination of userid and Macaddress has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cdate' => 'cdate',
            'userid' => 'userid',
            'MACADDRESS' => 'Macaddress',
            'LOGIN_STATUS' => 'Login  Status',
        ];
    }
}
