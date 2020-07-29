<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "T_ACCTRANSFER_TMP".
 *
 * @property string $TRANSFERID
 * @property string $userid_SOURCE
 * @property string $userid_TARGET
 * @property string $MTYPE
 * @property string $AMOUNT
 * @property string $noteS
 * @property string $BDATE
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Tacctransfertmp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'T_ACCTRANSFER_TMP';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TRANSFERID'], 'required'],
            [['AMOUNT'], 'number'],
            [['TRANSFERID'], 'string', 'max' => 75],
            [['userid_SOURCE', 'userid_TARGET', 'cby', 'mby'], 'string', 'max' => 20],
            [['MTYPE'], 'string', 'max' => 2],
            [['noteS'], 'string', 'max' => 255],
            [['BDATE', 'cdate', 'mdate'], 'string', 'max' => 7],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TRANSFERID' => 'Transferid',
            'userid_SOURCE' => 'userid  Source',
            'userid_TARGET' => 'userid  Target',
            'MTYPE' => 'Mtype',
            'AMOUNT' => 'Amount',
            'noteS' => 'notes',
            'BDATE' => 'Bdate',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
        ];
    }
}
