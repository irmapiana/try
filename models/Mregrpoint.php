<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "M_REGRPOINT".
 *
 * @property string $RRPOINTID
 * @property string $RRPLEVEL_CODE
 * @property string $RRPOINT_0
 * @property string $RRPOINT_1
 * @property string $RRPOINT_2
 * @property string $RRPOINT_VALIDFROM
 * @property string $RRPOINT_VALIDUNTIL
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Mregrpoint extends \yii\db\activeRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'M_REGRPOINT';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RRPOINTID'], 'required'],
            [['RRPOINT_0', 'RRPOINT_1', 'RRPOINT_2'], 'number'],
            [['RRPOINTID', 'RRPLEVEL_CODE'], 'string', 'max' => 50],
            // [['RRPOINT_VALIDFROM', 'RRPOINT_VALIDUNTIL', 'cdate', 'mdate'], 'string', 'max' => 7],
            [['cby', 'mby'], 'string', 'max' => 20],
            [['RRPOINTID'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RRPOINTID' => 'POIN ID',
            'RRPLEVEL_CODE' => 'LEVEL',
            'RRPOINT_0' => 'POIN',
            'RRPOINT_1' => 'POIN UP 1L',
            'RRPOINT_2' => 'POIN UP 2L',
            'RRPOINT_VALIDFROM' => 'TGL BERLAKU',
            'RRPOINT_VALIDUNTIL' => 'TGL BERAKHIR',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');

                // Untuk tanggal yang dari form, kayaknya harus dibuat seperti di bawah agar bisa disimpan ke DB
                $this->RRPOINT_VALIDFROM = new Expression("TO_DATE('" . $this->RRPOINT_VALIDFROM . "', 'dd/mm/yyyy')");
                $this->RRPOINT_VALIDUNTIL = new Expression("TO_DATE('" . $this->RRPOINT_VALIDUNTIL . "', 'dd/mm/yyyy')");
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');

                // Untuk tanggal yang dari form, kayaknya harus dibuat seperti di bawah agar bisa disimpan ke DB
                $this->RRPOINT_VALIDFROM = new Expression("TO_DATE('" . $this->RRPOINT_VALIDFROM . "', 'dd/mm/yyyy')");
                $this->RRPOINT_VALIDUNTIL = new Expression("TO_DATE('" . $this->RRPOINT_VALIDUNTIL . "', 'dd/mm/yyyy')");
                return true;
            }
        }
        return false;
    }
}
