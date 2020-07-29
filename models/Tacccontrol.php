<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "T_ACCCONTROL".
 *
 * @property string $userid
 * @property integer $BBALANCE
 * @property integer $DEBIT
 * @property integer $CREDIT
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Tacccontrol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_rewardcontrol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid'], 'required'],
            [['bbalance', 'debit', 'credit'], 'integer'],
            [['userid', 'cby', 'mby'], 'string', 'max' => 20],
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
            'userid' => 'userid',
            'bbalance' => 'SALDO AWAL',
            'debit' => 'Debit',
            'credit' => 'Credit',
            // 'cby' => 'cby',
            // 'cdate' => 'cdate',
            // 'mby' => 'mby',
            // 'mdate' => 'mdate',
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('now()');
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
}
