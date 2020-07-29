<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "D_GROUP_MENU".
 *
 * @property string $ID
 * @property string $LABEL
 * @property string $RESOURCE_ID
 * @property string $PARENT
 * @property integer $SEQ
 */
class Dgroupmenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'D_GROUP_MENU';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'LABEL'], 'required'],
            [['SEQ'], 'integer'],
            [['ID', 'LABEL', 'RESOURCE_ID', 'PARENT'], 'string', 'max' => 40],
            [['ID', 'ID', 'ID'], 'unique', 'targetAttribute' => ['ID', 'ID', 'ID'], 'message' => 'The combination of  and ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'LABEL' => 'Label',
            'RESOURCE_ID' => 'Resource  ID',
            'PARENT' => 'Parent',
            'SEQ' => 'Seq',
        ];
    }
}
