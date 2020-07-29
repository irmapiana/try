<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "D_GROUPMODULE".
 *
 * @property string $GROUPID
 * @property string $MODID
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Dgroupmodule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'D_GROUPMODULE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GROUPID', 'MODID'], 'required'],
            [['GROUPID', 'cby', 'mby'], 'string', 'max' => 20],
            [['MODID'], 'string', 'max' => 10],
            [['cdate', 'mdate'], 'string', 'max' => 7],
            [['GROUPID', 'GROUPID', 'GROUPID', 'GROUPID', 'MODID', 'MODID', 'MODID', 'MODID'], 'unique', 'targetAttribute' => ['GROUPID', 'GROUPID', 'GROUPID', 'GROUPID', 'MODID', 'MODID', 'MODID', 'MODID'], 'message' => 'The combination of Groupid and Modid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GROUPID' => 'Groupid',
            'MODID' => 'Modid',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
        ];
    }
}
