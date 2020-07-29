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
class Mmessagetemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_message_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'string', 'max' => 50],
            [['template'], 'string', 'max' => 1000],
            [['params'], 'string', 'max' => 56],
            [['cby', 'mby'], 'string', 'max' => 20],
            [['code', 'code', 'code'], 'unique', 'targetAttribute' => ['code', 'code', 'code'], 'message' => 'The combination of  and Code has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'template' => 'Template',
            'params' => 'Params',
            'cby' => 'Cby',
            'cdate' => 'Cdate',
            'mby' => 'Mby',
            'mdate' => 'Mdate',
        ];
    }
}
