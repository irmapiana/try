<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "M_BANK".
 *
 * @property string $BANKCODE
 * @property string $BANKNAME
 * @property string $note
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 * @property string $active
 */
class Mgroupmenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_group_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_menuid'], 'required'],
            [['group_menuid'], 'string', 'max' => 50],
            [['label', 'resourceid', 'parent'], 'string', 'max' => 40],
            [['group_menu_seq'], 'integer', 'max' => '19'],
            [['cby', 'mby'], 'string', 'max' => 20],
            [['level'], 'integer'],
            [['bar_type'], 'integer'],
            [['has_group_child'], 'integer'],
            [['category'], 'string', 'max' => 16],
            [['next_class'], 'string', 'max' => 100],
            [['active'], 'string', 'max' => 1],
            //[['cdate', 'mdate'], 'string', 'max' => 7],
            [['group_menuid', 'group_menuid', 'group_menuid', 'group_menuid'], 'unique', 'targetAttribute' => ['group_menuid', 'group_menuid', 'group_menuid', 'group_menuid'], 'message' => 'The combination of  and group_menuid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_menuid' => 'Menu ID',
            'label' => 'Label',
            'resourceid' => 'Resource ID',
            'parent' => 'Parent',
            'group_menu_seq' => 'Menu Seq',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
            'level' => 'Level',
            'bar_type' => 'BAR Type',
            'has_group_child' => 'Group Child',
            'category' => 'Kategori',
            'next_class' => 'Next Class',
            'active' => 'Aktif',
        ];
    }

    public function beforeSave($insert){
        if(parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');
                return true;
                # code...
            }else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                return true;
            }
        }
        return false;
    }
    public function getConcat()
    {
        return $this->group_menuid." - ".$this->label;
    }
}
