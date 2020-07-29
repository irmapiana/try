<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "M_MENU_GROUP".
 *
 * @property string $menucode
 * @property string $group_user
 * @property string $cdate
 * @property string $cby
 * @property string $mdate
 * @property string $mby
 */
class MMenugroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_menu_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menucode', 'group_user'], 'required'],
            [['menucode'], 'string', 'max' => 5],
            [['group_user'], 'string', 'max' => 30],
           // [['cdate', 'mdate'], 'string', 'max' => 7],
            [['cby', 'mby'], 'string', 'max' => 20],
            [['group_user', 'group_user', 'group_user', 'group_user', 'menucode', 'menucode', 'menucode', 'menucode'], 'unique', 'targetAttribute' => ['group_user', 'group_user', 'group_user', 'group_user', 'menucode', 'menucode', 'menucode', 'menucode'], 'message' => 'The combination of menucode and Group  User has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menucode' => 'menucode',
            'group_user' => 'Group  User',
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
