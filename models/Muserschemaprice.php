<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
* 
*/
class Muserschemaprice extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'm_user_price_schema';
        # code...
    }

    public function rules()
    {
        return [
            [['userid'], 'required'],
            [['spriceid'], 'string', 'max' => 20],
            [['cby', 'mby'], 'string', 'max' => 20],
            [['userid', 'userid', 'userid', 'userid'], 'unique', 'targetAttribute' => ['userid', 'userid', 'userid', 'userid'], 'message' => 'The combination of userid has already been taken.'],
            [['spriceid'], 'exist', 'skipOnError' => true, 'targetClass' => Mschemaprice::className(), 'targetAttribute' => ['spriceid' => 'spriceid']],

        ];
    }

    public function attributeLabels()
    {
        return [
            'spriceid' => 'Skema Price',
            'userid' => 'User ID',
            'cby' => 'Dibuat Oleh',
            'cdate' => 'Tanggal Dibuat',
            'mby' => 'Diubah Oleh',
            'mdate' => 'Terakhir Dibuat',
        ];
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
        return $this->userid;
    }
}

?>