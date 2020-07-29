<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_menu_cfg".
 *
 * @property string $menucode
 * @property string $menuname
 * @property string $menutitle
 * @property string $menulink
 * @property string $menuicon
 * @property string $menuparent
 * @property string $menuorder
 * @property string $status
 * @property string $cdate
 * @property string $cby
 * @property string $mdate
 * @property string $mby
 */
class MMenucfg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_menu_cfg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menucode'], 'required'],
            [['menuorder', 'status'], 'number'],
            [['menucode', 'menuparent'], 'string', 'max' => 5],
            [['menuname', 'cby', 'mby'], 'string', 'max' => 20],
            [['menutitle'], 'string', 'max' => 30],
            [['menulink', 'menuicon'], 'string', 'max' => 50],
            [['cdate', 'mdate'], 'string', 'max' => 7],
            [['menucode', 'menucode', 'menucode', 'menucode'], 'unique', 'targetAttribute' => ['menucode', 'menucode', 'menucode', 'menucode'], 'message' => 'The combination of  and menucode has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menucode' => 'menucode',
            'menuname' => 'menuname',
            'menutitle' => 'menutitle',
            'menulink' => 'menulink',
            'menuicon' => 'menuicon',
            'menuparent' => 'menuparent',
            'menuorder' => 'menuorder',
            'status' => 'status',
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
