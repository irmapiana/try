<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "T_ACCMUTATION".
 *
 * @property string $MUTATIONID
 * @property string $userid
 * @property string $MTYPE
 * @property string $AMOUNT
 * @property string $noteS
 * @property string $BDATE
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 * @property string $SCHEMAID
 * @property string $sch_updatedD
 * @property integer $ENDBALANCE
 */
class Taccmutation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'T_ACCMUTATION';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MUTATIONID', 'userid', 'MTYPE','BDATE'], 'required'],
            [['AMOUNT'], 'number'],
            [['ENDBALANCE'], 'integer'],
            [['MUTATIONID'], 'string', 'max' => 75],
            [['userid', 'cby', 'mby'], 'string', 'max' => 20],
            [['MTYPE'], 'string', 'max' => 2],
            [['noteS'], 'string', 'max' => 255],
           // [['BDATE', 'cdate', 'mdate'], 'string', 'max' => 7],
            [['SCHEMAID'], 'string', 'max' => 200],
            [['sch_updatedD'], 'string', 'max' => 1],
           [['MUTATIONID', 'MUTATIONID', 'MUTATIONID', 'MUTATIONID'], 'unique', 'targetAttribute' => ['MUTATIONID', 'MUTATIONID', 'MUTATIONID', 'MUTATIONID'], 'message' => 'The combination of  and Mutationid has already been taken.'],
            // [['MUTATIONID'], 'unique', 'targetAttribute' => ['MUTATIONID'], 'message' => 'The combination of  and Mutationid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MUTATIONID' => 'Mutationid',
            'userid' => 'userid',
            'MTYPE' => 'Mtype',
            'AMOUNT' => 'Amount',
            'noteS' => 'notes',
            'BDATE' => 'Bdate',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
            'SCHEMAID' => 'Schemaid',
            'sch_updatedD' => 'Sch  Updated',
            'ENDBALANCE' => 'Endbalance',
        ];
    }
    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');
                //$this->BDATE = new Expression("TO_DATE('" . $this->BDATE . "', 'yyyy/mm/dd')");
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
