<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "V_REWMUTATION".
 *
 * @property string $MUTATIONID
 * @property string $userid
 * @property string $MTYPE
 * @property string $POINT
 * @property integer $ENDBALANCE
 * @property string $SOURCE_ACCOUNT
 * @property string $SOURCE_LEVEL
 * @property string $REMARK
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Vrewmutation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_rewardmutation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reward_mutationid'], 'required'],
            [['point'], 'number'],
            [['end_balance'], 'integer'],
            [['reward_mutationid'], 'string', 'max' => 75],
            [['userid', 'cby', 'mby'], 'string', 'max' => 20],
            [['mtype'], 'string', 'max' => 2],
            [['remark'], 'string', 'max' => 100],
            [['cdate', 'mdate'], 'string', 'max' => 7],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reward_mutationid' => 'NO. MUTASI',
            'userid' => 'AKUN',
            'mtype' => 'TIPE MUTASI',
            'point' => 'POIN',
            'end_balance' => 'Endbalance',
            'remark' => 'CATATAN',
            'cby' => 'cby',
            'cdate' => 'TANGGAL',
            'mby' => 'mby',
            'mdate' => 'mdate',
        ];
    }
    
    public function getMutationtype()
    {
        return $this->hasOne(Mmutationtype::className(), ['mtype' => 'mtype']);
    }
}
