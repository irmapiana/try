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
class Mgroupmenuitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_group_menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_menuid'], 'required'],
            [['group_menuid'], 'string', 'max' => 50],
            [['resourceid'], 'string', 'max' => 40],
            [['itemid'], 'string', 'max' => '20'],
            [['item_seq'], 'integer', 'max' => '19'],
            [['cby', 'mby'], 'string', 'max' => 20],
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
            'itemid' => 'Itemid',
            'resourceid' => 'Resource ID',
            'item_seq' => 'Item Seq',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
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
