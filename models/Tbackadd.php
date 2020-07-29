<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "T_BACK".
 *
 * @property string $BACK_TRXID
 * @property string $BANKCODE
 * @property string $MERCHANTID
 * @property string $TERMINALID
 * @property string $BATCHNUMBER
 * @property string $SETTFLAG
 * @property string $SETTDATE
 * @property string $ISOMSG
 * @property string $RC
 * @property string $DATA1
 * @property string $DATA2
 * @property string $DATA3
 * @property string $DATA4
 * @property string $DATA5
 * @property string $DATA6
 * @property string $DATA7
 * @property string $DATA8
 * @property string $DATA9
 * @property string $DATA10
 * @property string $DATA11
 * @property string $DATA12
 * @property string $DATA13
 * @property string $DATA14
 * @property string $DATA15
 * @property string $DATA16
 * @property string $DATA17
 * @property string $DATA18
 * @property string $DATA19
 * @property string $DATA20
 * @property string $DATA21
 * @property string $DATA22
 * @property string $DATA23
 * @property string $DATA24
 * @property string $DATA25
 * @property string $DATA26
 * @property string $DATA27
 * @property string $DATA28
 * @property string $DATA29
 * @property string $DATA30
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 * @property string $PID
 * @property string $ORGID
 * @property string $SCHEMAID
 * @property string $itemid
 * @property string $productid
 * @property string $FOOTPRINT
 * @property string $noteS
 * @property string $FRONT_TRXID
 * @property string $PRINT
 * @property string $TDATE
 * @property string $sch_updatedD
 * @property string $COMMISSION
 * @property string $POINT
 */
class Tbackadd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_front_add';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['front_trxid'], 'required'],
            [['isomsg'], 'string', 'max' => 4000],
            [['front_trxid', 'front_trxid', 'front_trxid', 'front_trxid'], 'unique', 'targetAttribute' => ['front_trxid', 'front_trxid', 'front_trxid', 'front_trxid'], 'message' => 'The combination of  and Front  Trxid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'front_trxid' => 'Back  Trxid',
            'isomsg' => 'ISO Mesage',
        ];
    }
}
