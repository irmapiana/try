<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "M_MUTATION_STATUS_CODE".
 *
 * @property string $STATUS_CODE
 * @property string $STATUS_DESC
 */
class Mmutationstatuscode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'M_MUTATION_STATUS_CODE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_CODE'], 'required'],
            [['STATUS_CODE'], 'string', 'max' => 4],
            [['STATUS_DESC'], 'string', 'max' => 50],
            [['STATUS_CODE'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STATUS_CODE' => 'Status  Code',
            'STATUS_DESC' => 'STATUS',
        ];
    }
}
