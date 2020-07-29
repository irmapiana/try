<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "M_GROUP".
 *
 * @property string $GROUPID
 * @property string $note
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 * @property string $GROUPNAME
 *
 * @property PROTELMARTMUSER[] $pROTELMARTMUSERs
 * @property MUSER[] $mUSERs
 * @property PROTELMUSER[] $pROTELMUSERs
 * @property BMAS0K3MUSER[] $bMAS0K3MUSERs
 * @property PLINK0K3MUSER[] $pLINK0K3MUSERs
 */
class MGroup extends \yii\db\activeRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'M_GROUP';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GROUPID'], 'required'],
            [['GROUPID', 'cby', 'mby'], 'string', 'max' => 20],
            [['note', 'GROUPNAME'], 'string', 'max' => 50],
            [['cdate', 'mdate'], 'string', 'max' => 7],
            [['GROUPID', 'GROUPID', 'GROUPID', 'GROUPID', 'GROUPID'], 'unique', 'targetAttribute' => ['GROUPID', 'GROUPID', 'GROUPID', 'GROUPID', 'GROUPID'], 'message' => 'The combination of  and Groupid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GROUPID' => 'Groupid',
            'note' => 'note',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
            'GROUPNAME' => 'Groupname',
        ];
    }

    /**
     * @return \yii\db\activeQuery
     */
    public function getPROTELMARTMUSERs()
    {
        return $this->hasMany(PROTELMARTMUSER::className(), ['GROUPID' => 'GROUPID']);
    }

    /**
     * @return \yii\db\activeQuery
     */
    public function getMUSERs()
    {
        return $this->hasMany(MUSER::className(), ['GROUPID' => 'GROUPID']);
    }

    /**
     * @return \yii\db\activeQuery
     */
    public function getPROTELMUSERs()
    {
        return $this->hasMany(PROTELMUSER::className(), ['GROUPID' => 'GROUPID']);
    }

    /**
     * @return \yii\db\activeQuery
     */
    public function getBMAS0K3MUSERs()
    {
        return $this->hasMany(BMAS0K3MUSER::className(), ['GROUPID' => 'GROUPID']);
    }

    /**
     * @return \yii\db\activeQuery
     */
    public function getPLINK0K3MUSERs()
    {
        return $this->hasMany(PLINK0K3MUSER::className(), ['GROUPID' => 'GROUPID']);
    }
}
