<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "M_MUTATIONTYPE".
 *
 * @property string $MTYPE
 * @property string $MNAME
 * @property string $noteS
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Mmutationtype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_rewardmutation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mtype'], 'required'],
            [['mtype'], 'string', 'max' => 2],
            [['cby', 'mby'], 'string', 'max' => 20],
            [['cdate', 'mdate'], 'string', 'max' => 7],
            [['mtype'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mtype' => 'Mtype',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
        ];
    }
}
