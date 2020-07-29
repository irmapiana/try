<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "F_MESSAGE_TEMPLATE".
 *
 * @property string $CODE
 * @property string $TEMPLATE
 * @property string $PARAMS
 */
class Fmessagetemplate extends \yii\db\activeRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'F_MESSAGE_TEMPLATE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODE'], 'required'],
            [['CODE'], 'string', 'max' => 50],
            [['TEMPLATE'], 'string', 'max' => 1000],
            [['PARAMS'], 'string', 'max' => 56],
            [['CODE', 'CODE', 'CODE'], 'unique', 'targetAttribute' => ['CODE', 'CODE', 'CODE'], 'message' => 'The combination of  and Code has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODE' => 'Code',
            'TEMPLATE' => 'Template',
            'PARAMS' => 'Params',
        ];
    }
}
