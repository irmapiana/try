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
class Mservice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_name'], 'required'],
            [['service_name','url_mode'], 'string', 'max' => 100],
            [['build_number'], 'integer', 'max' => 10],
            [['active'], 'string', 'max' => 1],
            // [['RRPOINT_VALIDFROM', 'RRPOINT_VALIDUNTIL', 'cdate', 'mdate'], 'string', 'max' => 7],
            [['url'], 'string', 'max' => 200],
            [['service_name', 'service_name',  'service_name', 'service_name'], 'unique', 'targetAttribute' => ['service_name', 'service_name', 'service_name', 'service_name'], 'message' => 'The combination of service_name has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'service_name' => 'Nama Service',
            'build_number' => 'Build Number',
            'url_mode' => 'URL Mode',
            'active' => 'Active',
            'url' => 'URL',
        ];
    }

    public function getConcat()
    {
        return $this->service_name."(".$this->build_number.")";
    }
}
