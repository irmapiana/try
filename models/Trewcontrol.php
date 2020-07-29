<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "T_REWCONTROL".
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
class Trewcontrol extends \yii\db\ActiveRecord
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
            //[['cdate', 'mdate'], 'string', 'max' => 7],
            [['userid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'userid',
            'bbalance' => 'Bbalance',
            'debit' => 'Debit',
            'credit' => 'Credit',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
        ];
    }
}
