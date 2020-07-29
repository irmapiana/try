<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "USER_SESSIONS".
 *
 * @property string $SSID
 * @property string $SECRETKEY
 * @property string $IMEIID
 * @property string $userid
 */
class Usersession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USER_SESSIONS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SSID'], 'required'],
            [['SSID', 'SECRETKEY', 'userid'], 'string', 'max' => 100],
            [['IMEIID'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SSID' => 'ID SESI',
            'SECRETKEY' => 'KUNCI',
            'IMEIID' => 'ID IMEI',
            'userid' => 'LOGIN',
        ];
    }
    
    public function getUser()
    {
        return $this->hasOne(Muser::className(), ['userid' => 'userid']);
    }
}
