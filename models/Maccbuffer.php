<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "M_ACCBUFFER".
 *
 * @property string $userid
 * @property string $ACC_UPDATED
 * @property string $active
 * @property string $BUFFER_PRK
 * @property string $BUFFER_OD
 * @property string $BUFFER_OTHER
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Maccbuffer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'M_ACCBUFFER';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'ACC_UPDATED'], 'required'],
            [['BUFFER_PRK', 'BUFFER_OD', 'BUFFER_OTHER'], 'number'],
            [['userid', 'cby', 'mby'], 'string', 'max' => 20],
            [['ACC_UPDATED'], 'string', 'max' => 2],
            [['active'], 'string', 'max' => 1],
            [['cdate', 'mdate'], 'string', 'max' => 7],
            [['userid', 'userid', 'userid', 'ACC_UPDATED', 'ACC_UPDATED', 'ACC_UPDATED'], 'unique', 'targetAttribute' => ['userid', 'userid', 'userid', 'ACC_UPDATED', 'ACC_UPDATED', 'ACC_UPDATED'], 'message' => 'The combination of userid and Acc  Updated has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'userid',
            'ACC_UPDATED' => 'Acc  Updated',
            'active' => 'active',
            'BUFFER_PRK' => 'Buffer  Prk',
            'BUFFER_OD' => 'Buffer  Od',
            'BUFFER_OTHER' => 'Buffer  Other',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
        ];
    }
}
