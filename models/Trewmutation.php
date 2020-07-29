<?php

namespace app\models;

use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "T_REWMUTATION".
 *
 * @property string $MUTATIONID
 * @property string $userid
 * @property string $MTYPE
 * @property string $POINT
 * @property integer $ENDBALANCE
 * @property string $SOURCE_ACCOUNT
 * @property string $SOURCE_LEVEL
 * @property string $REMARK
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 */
class Trewmutation extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 't_rewardmutation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['reward_mutationid', 'userid', 'mtype', 'point'], 'required'],
            [['point'], 'number'],
            [['end_balance'], 'integer'],
            [['reward_mutationid'], 'string', 'max' => 75],
            [['userid', 'cby', 'mby'], 'string', 'max' => 20],
            [['mtype'], 'string', 'max' => 2],
            [['remark'], 'string', 'max' => 100],
            [['cdate', 'mdate'], 'string', 'max' => 7],
            [['reward_mutationid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'reward_mutationid' => 'NO. MUTASI',
            'userid' => 'AKUN',
            'mtype' => 'TIPE MUTASI',
            'point' => 'POIN',
            'end_balance' => 'POIN AKHIR',
            'remark' => 'CATATAN',
            'cby' => 'cby',
            'cdate' => 'TANGGAL',
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

    public function updatePointTrewcontrol() {
        $rewControl = Trewcontrol::find()->where(['userid' => $this->userid])->one();
        $rewControl->credit = $rewControl->credit + $this->point;
        if ($rewControl->save()) {
            return true;
        } else {
            ECHO "updatePointTrewcontrol";
            var_dump($rewControl->getErrors());
            die();

            return false;
        }
    }

}
