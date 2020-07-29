<?php

namespace app\models;

use Yii;
use yii\db\Expression;


/**
 * This is the model class for table "T_ACCMUTATION_DETAILS".
 *
 * @property string $MUTATION_ID
 * @property string $BANK_ACCOUNT_ID
 * @property string $MUTATION_STATUS_CODE
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Taccmutationdetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'T_ACCMUTATION_DETAILS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MUTATION_ID'], 'required'],
            [['MUTATION_ID'], 'string', 'max' => 75],
            [['BANK_ACCOUNT_ID', 'MUTATION_STATUS_CODE', 'cby', 'mby', 'mdate'], 'string', 'max' => 20],
         //   [['cdate'], 'string', 'max' => 7],
            [['MUTATION_ID'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MUTATION_ID' => 'Mutation  ID',
            'BANK_ACCOUNT_ID' => 'BANK',
            'MUTATION_STATUS_CODE' => 'Mutation  Status  Code',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
        ];
    }
    
     
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                return true;
            }
        }
        return false;
    }
}
