<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "M_REGCOMMISSION".
 *
 * @property string $RCOMMISSIONID
 * @property string $RCLEVEL_CODE
 * @property string $REGCOST
 * @property string $CASHBACK_0
 * @property string $RCOMMISSION_1
 * @property string $RCOMMISSION_2
 * @property string $RCOMMISSION_VALIDFROM
 * @property string $RCOMMISSION_VALIDUNTIL
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Mregcommission extends \yii\db\activeRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'M_REGCOMMISSION';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RCOMMISSIONID'], 'required'],
            [['REGCOST','CASHBACK_0', 'RCOMMISSION_1', 'RCOMMISSION_2'], 'number'],
            [['RCOMMISSIONID', 'RCLEVEL_CODE'], 'string', 'max' => 50],
            [['RCOMMISSIONID'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RCOMMISSIONID' => 'KOMISI',
            'RCLEVEL_CODE' => 'LEVEL',
            'REGCOST' => 'REG COST',
            'CASHBACK_0' => 'CASH BACK',
            'RCOMMISSION_1' => 'KOMISI UP 1L',
            'RCOMMISSION_2' => 'KOMISI UP 2L',
            'RCOMMISSION_VALIDFROM' => 'TGL BERLAKU',
            'RCOMMISSION_VALIDUNTIL' => 'TGL BERAKHIR',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
        ];
    }
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');
                $this->RCOMMISSION_VALIDFROM = new Expression("TO_DATE('" . $this->RCOMMISSION_VALIDFROM . "', 'dd/mm/yyyy')");
                $this->RCOMMISSION_VALIDUNTIL = new Expression("TO_DATE('" . $this->RCOMMISSION_VALIDUNTIL . "', 'dd/mm/yyyy')");
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                $this->RCOMMISSION_VALIDFROM = new Expression("TO_DATE('" . $this->RCOMMISSION_VALIDFROM . "', 'dd/mm/yyyy')");
                $this->RCOMMISSION_VALIDUNTIL = new Expression("TO_DATE('" . $this->RCOMMISSION_VALIDUNTIL . "', 'dd/mm/yyyy')");
                return true;
            }
        }
        return false;
    }
}
