<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_webgroup".
 *
 * @property string $group_user
 * @property string $gusername
 * @property string $note
 * @property string $cdate
 * @property string $cby
 * @property string $mdate
 * @property string $mby
 */
class Mwebgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_webgroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_user'], 'required'],
            [['group_user', 'cby', 'mby'], 'string', 'max' => 30],
            [['gusername'], 'string', 'max' => 100],
            [['note'], 'string', 'max' => 150],
           // [['cdate', 'mdate'], 'string', 'max' => 7],
            [['group_user', 'group_user'], 'unique', 'targetAttribute' => ['group_user', 'group_user'], 'message' => 'The combination of  and Group  User has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_user' => 'ID Group',
            'gusername' => 'Nama Group',
            'note' => 'Catatan',
            'cdate' => 'cdate',
            'cby' => 'cby',
            'mdate' => 'mdate',
            'mby' => 'mby',
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


}
