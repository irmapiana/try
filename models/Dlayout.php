<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "D_LAYOUT".
 *
 * @property string $LAYOUT_ID
 * @property string $WIDTH
 * @property string $LENGTH
 */
class Dlayout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'D_LAYOUT';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LAYOUT_ID'], 'required'],
            [['LAYOUT_ID', 'WIDTH', 'LENGTH'], 'string', 'max' => 20],
            [['LAYOUT_ID', 'LAYOUT_ID'], 'unique', 'targetAttribute' => ['LAYOUT_ID', 'LAYOUT_ID'], 'message' => 'The combination of  and Layout  ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LAYOUT_ID' => 'Layout  ID',
            'WIDTH' => 'Width',
            'LENGTH' => 'Length',
        ];
    }
}
