<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "V_ACCMUTATION".
 *
 * @property string $MUTATION_STATUS_CODE
 * @property string $BANK_ACCOUNT_ID
 * @property string $MUTATIONID
 * @property string $ACCID
 * @property string $MTYPE
 * @property string $AMOUNT
 * @property string $NOTES
 * @property string $BDATE
 * @property string $CBY
 * @property string $CDATE
 * @property string $MBY
 * @property string $MDATE
 * @property string $SCHEMAID
 * @property string $SCH_UPDATED
 * @property integer $ENDBALANCE
 */
class Vaccmutation extends \yii\db\ActiveRecord
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
            [['end_balance'], 'integer'],
            [['userid', 'cby', 'mby'], 'string', 'max' => 20],
            [['reward_mutationid'], 'string', 'max' => 75],
            [['mtype'], 'string', 'max' => 2],
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
            'mtype' => 'TIPE',
            'cby' => 'Cby',
            'cdate' => 'Tanggal Awal',
            'mby' => 'Mby',
            'mdate' => 'Tanggal',
            'end_balance' => 'Endbalance',
        ];
    }

    public function getMutationtype()
    {
        return $this->hasOne(Mmutationtype::className(), ['mtype' => 'mtype']);
    }


}
