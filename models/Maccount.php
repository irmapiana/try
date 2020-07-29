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
class Maccount extends \yii\db\ActiveRecord
{
    public $bbalance;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'account_name'/*,'BBALANCE'*/], 'required'],
            [['userid', 'cby', 'mby'], 'string', 'max' => 20],
            [['account_name'], 'string', 'max' => 50],
            [['bbalance'],'integer'],
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
            'bbalance' => 'SALDO AWAL'
            // 'cby' => 'cby',
            // 'cdate' => 'cdate',
            // 'mby' => 'mby',
            // 'mdate' => 'mdate',
        ];
    }

    public function getRewcontrol()
    {
        return $this->hasOne(Trewcontrol::className(), ['userid' => 'userid']);
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
        return $this->userid. " (".$this->account_name.")";
    }

}
