<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "T_FRONT".
 *
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
 * @property string $BACK_SCHEMAID
 * @property string $sch_updatedD
 * @property string $BACK_sch_updatedD
 * @property string $DATA31
 * @property string $COMMISSION
 * @property string $POINT
 */
class Tfront extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_front';
    }
     public function relations()
    {
        return array(
            'message' => array(self::HAS_ONE, 't_front', 'm_rc_mapper.message'),
        );
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['front_trxid'], 'required'],
            [['settlflag', 'PRINT', 'sch_updated', 'BACK_sch_updated'], 'string', 'max' => 1],
            [['cdate', 'mdate', 'tdate'], 'string', 'max' => 7],
            [['rc', 'data20'], 'string', 'max' => 30],
            [['data1', 'data2', 'data3', 'data4', 'data5', 'data6', 'data7', 'data8', 'data9', 'data10', 'data11', 'data12', 'data13', 'data14', 'data15', 'data16', 'data17', 'data18', 'data19', 'data21', 'data22', 'data23', 'data24', 'data25', 'data26', 'data27', 'data28', 'data29', 'data30', 'front_trxid', 'data31'], 'string', 'max' => 50],
            [['cby', 'mby', 'itemid', 'productid'], 'string', 'max' => 20],
            [['front_trxid', 'front_trxid', 'front_trxid', 'front_trxid'], 'unique', 'targetAttribute' => ['front_trxid', 'front_trxid', 'front_trxid', 'front_trxid'], 'message' => 'The combination of  and Front  Trxid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'settlflag' => 'Settflag',
            'rc' => 'Rc',
            'itemid' => 'itemid',
            'productid' => 'productid',
            'front_trxid' => 'Front  Trxid',
            'tdate' => 'Tdate',
        ];
    }

    public function getRcmapper()
    {
        return $this->hasOne(Rcmapper::className(), ['productid' => 'productid']);
    }
}
