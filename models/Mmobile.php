<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;

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
class Mmobile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_mobile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobileid'], 'required'],
            [['mobileid'], 'string', 'max' => 16],
            [['mobilepin'], 'string', 'max' => 150],
            [['mobileno'], 'string', 'max' => 16],
            [['deviceid'], 'string', 'max' => 250],
            // [['RRPOINT_VALIDFROM', 'RRPOINT_VALIDUNTIL', 'cdate', 'mdate'], 'string', 'max' => 7],
            [['cby', 'mby'], 'string', 'max' => 20],
            [['mobileid', 'mobileid',  'mobileid', 'mobileid'], 'unique', 'targetAttribute' => ['mobileid', 'mobileid', 'mobileid', 'mobileid'], 'message' => 'The combination of mobileid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mobileid' => 'Mobile ID',
            'mobilepin' => 'Mobile PIN',
            'mobileno' => 'Mobile No',
            'deviceid' => 'Device ID',
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
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');

                // Untuk tanggal yang dari form, kayaknya harus dibuat seperti di bawah agar bisa disimpan ke DB
                return true;
            }
        }
        return false;
    }
    public function getConcat()
    {
        return $this->mobileid."(".$this->mobileid.")";
    }
}
