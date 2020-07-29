<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_account".
 *
 * @property string $userid
 * @property string $NAME
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Museraccount extends \yii\db\ActiveRecord
{
    public $bbalance;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_user_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'account_name'/*,'BBALANCE'*/], 'required'],
            [['accountno', 'cby', 'mby'], 'string', 'max' => 20],
            [['account_name'], 'string', 'max' => 50],
            [['primary_account'],'string', 'max' => 1],
            [['card_number'], 'string', 'max' => 19],
            // [['cdate', 'mdate'], 'string', 'max' => 7],
            [['userid', 'userid', 'userid', 'userid'], 'unique', 'targetAttribute' => ['userid', 'userid', 'userid', 'userid'], 'message' => 'The combination of  and userid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'KODE AKUN',
            'account_name' => 'NAMA AKUN',
            'accountno' => 'accountno',
            'primary_account' => 'primary account',
            'card_number' => 'card number',
            // 'cby' => 'cby',
            // 'cdate' => 'cdate',
            // 'mby' => 'mby',
            // 'mdate' => 'mdate',
        ];
    }

    public function getTfront()
    {
        return $this->hasOne(Tfront::className(), ['accountno' => 'accountno']);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                return true;
            }
        }
        return false;
    }
    
      public function getConcat()
    {
        return $this->accountno. " (".$this->account_name.")";
    }

}
