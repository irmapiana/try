<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "D_DATAREGISTER".
 *
 * @property string $DID
 * @property string $RID
 * @property string $DVALUE
 * @property string $TTL
 * @property string $STIME
 */
class Dataregister extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'D_DATAREGISTER';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DID', 'RID'], 'required'],
            [['DID'], 'string', 'max' => 32],
            [['RID'], 'string', 'max' => 50],
            [['DVALUE'], 'string', 'max' => 1000],
            [['TTL'], 'string', 'max' => 5],
            [['STIME'], 'string', 'max' => 7],
            [['DID', 'DID', 'DID', 'DID', 'RID', 'RID', 'RID', 'RID'], 'unique', 'targetAttribute' => ['DID', 'DID', 'DID', 'DID', 'RID', 'RID', 'RID', 'RID'], 'message' => 'The combination of Did and Rid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DID' => 'Did',
            'RID' => 'Rid',
            'DVALUE' => 'Dvalue',
            'TTL' => 'Ttl',
            'STIME' => 'Stime',
        ];
    }
}
