<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "T_ACCMUTATION_TMP".
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
class Taccmutationtmp extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $bankcode;

    public static function tableName() {
        return 't_rewardmutation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['reward_mutationid', 'userid', 'mtype', 'BDATE'], 'required'],
            [['bankcode'], 'required', 'on' => 'create'],
            [['endbalance'], 'integer'],
            [['reward_mutationid'], 'string', 'max' => 75],
            [['userid', 'cby', 'mby','bankcode'], 'string', 'max' => 20],
            [['mtype'], 'string', 'max' => 2],
            [['noteS'], 'string', 'max' => 255],
            // [['BDATE', 'cdate', 'mdate'], 'string', 'max' => 7],
            [['schemaid'], 'string', 'max' => 200],
            [['sch_updatedD'], 'string', 'max' => 1],
            [['reward_mutationid', 'reward_mutationid', 'reward_mutationid'], 'unique', 'targetAttribute' => ['reward_mutationid', 'reward_mutationid', 'reward_mutationid'], 'message' => 'The combination of  and Mutationid has already been taken.'],
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
            //'AMOUNT' => 'JUMLAH',
            'note' => 'CATATAN',
            //'BDATE' => 'TANGGAL BANK',
            'cby' => 'cby',
            'cdate' => 'TANGGAL',
            'mby' => 'mby',
            'mdate' => 'mdate',
            'schemaid' => 'Schemaid',
            'sch_updated' => 'Sch  Updated',
            'endbalance' => 'Endbalance',
            'bankcode' => 'BANK',
            'ISDIRECT' => 'STATUS'
        ];
    }

    public function getStatusCode() {
        return $this->hasOne(Mmutationstatuscode::className(), ['STATUS_CODE' => 'MUTATION_STATUS_CODE'])->via('tMutationAccountDetail');
    }

    public function getMutationtype() {
        return $this->hasOne(Mmutationtype::className(), ['mtype' => 'mtype']);
    }

    public function getTMutationAccountDetail() {
        return $this->hasOne(Taccmutationdetails::className(), ['reward_mutationid' => 'reward_mutationid']);
    }
    
     public function getMutationdetail() {
        return $this->hasOne(Taccmutationdetails::className(), ['reward_mutationid' => 'reward_mutationid']);
    }

    public function getBankName() {
        return $this->hasOne(Mbankaccount::className(), ['BANK_CODE' => 'BANK_ACCOUNT_ID'])->via('tMutationAccountDetail');
    }
  
    // public function getBank()
    // {
    //     return $this->hasOne(Mbankaccount::className(), ['BANK_CODE' => 'BANK_ACCOUNT_ID']);
    // }


    public function insertAccmutationTmp() {
        //get end balance T Account control
        $accountControl = Tacccontrol::find()->where(['userid' => $this->userid])->one();
        $endbalance = ($accountControl->bbalance + $accountControl->credit + $this->AMOUNT) - $accountControl->debit;

        //insert into taccmutationtmp
        $accmutationtmp = new Taccmutationtmp();
        $accmutationtmp->attributes = $this->attributes;
        $accmutationtmp->endbalance = $endbalance;

        if ($accmutationtmp->save()) {
            return true;
        } else {
            // ECHO "insertAccmutationTmp";
            // var_dump($accmutationtmp->getErrors());
            //die();
            return false;
        }
    }

    public function insertAccmutation() {
        //get end balance T Account control


        $accountControl = Tacccontrol::find()->where(['userid' => $this->userid])->one();
        $endbalance = ($accountControl->bbalance + $accountControl->credit + $this->AMOUNT) - $accountControl->debit;

        //$accountControl->CREDIT = $accountControl->CREDIT + $this->AMOUNT;
        //insert into taccmutationt
        $accmutation = new Taccmutation();
        $accmutation->attributes = $this->attributes;
        $accmutation->endbalance = $endbalance;
//        var_dump($endbalance);
//        die();
        if ($accmutation->save()) {
            //ECHO " succes insertAccmutation";
            //die();
            return true;
        } else {
            ECHO "insertAccmutation";
            var_dump($accmutation->getErrors());
            die();
            return false;
        }
    }

    public function insertAccmutationdetailNotdirect() {
        //ubah status code = 0002
        $accmutationDetail = new Taccmutationdetails();
        $accmutationDetail->reward_mutationid = $this->reward_mutationid;
        $accmutationDetail->BANK_ACCOUNT_ID = $this->BANKCODE;
        $accmutationDetail->MUTATION_STATUS_CODE = '0002';

        //var_dump($accmutationDetail->attributes);
        //die();

        if ($accmutationDetail->save()) {

            return true;
        } else {
            ECHO "insertAccmutationdetailNotdirect";
            var_dump($accmutationDetail->getErrors());
            die();
            return false;
        }
    }

    public function insertAccmutationdetailDirect() {
//        //ubah status code = 0003
        $accmutationDetail = new Taccmutationdetails();
        $accmutationDetail->reward_mutationid = $this->reward_mutationid;
        $accmutationDetail->BANK_ACCOUNT_ID = $this->BANKCODE;
        $accmutationDetail->MUTATION_STATUS_CODE = '0003';

        if ($accmutationDetail->save()) {
            return true;
        } else {
            ECHO "insertAccmutationdetailDirect";
            var_dump($accmutationDetail->getErrors());
            die();
            return false;
        }
    }

    //if not direct

    public function updateAccmutationDetail() {
        //set statusmuation detail = 0003
        //get acc mutation by mutation id
        $accmutationDetail = Taccmutationdetails::find()->where(['reward_mutationid' => $this->reward_mutationid])->one();
        $accmutationDetail->MUTATION_STATUS_CODE = '0003';

        if ($accmutationDetail->save()) {
            //ECHO " succes updateAccmutationDetail";
            //die();
            return true;
        } else {
            //ECHO "updateAccmutationDetail";
            //var_dump($accmutationDetail->getErrors());
            //die();
            return false;
        }
    }

    public function updateAccmutationDetailBatal() {
        //set statusmuation detail = 0003
        //get acc mutation by mutation id
        $accmutationDetail = Taccmutationdetails::find()->where(['reward_mutationid' => $this->reward_mutationid])->one();
        $accmutationDetail->MUTATION_STATUS_CODE = '0004';

        if ($accmutationDetail->save()) {
            //ECHO " succes updateAccmutationDetail";
            //die();
            return true;
        } else {
            //    ECHO "updateAccmutationDetail";
            //   var_dump($accmutationDetail->getErrors());
            // die();
            return false;
        }
    }

    public function deleteAccmutationtmp() {
        //  $tmp = $this->findModel($this->MUTATIONID);
        //var_dump($tmp->attributes);
        //die();

        return $this->findModel($this->reward_mutationid)->delete();
    }

    public function updateCreditAccControl() {
        $accountControl = Tacccontrol::find()->where(['userid' => $this->userid])->one();
        $accountControl->credit = $accountControl->credit + $this->AMOUNT;
        if ($accountControl->save()) {
            return true;
        } else {
            ECHO "updateAccmutationDetail";
            var_dump($accountControl->getErrors());
            die();

            return false;
        }
    }
    
    public function getSaldo($userid)
    {
         $accountControl = Tacccontrol::find()->where(['userid' => $userid])->one();
         return $accountControl->bbalance + $accountControl->credit - $accountControl->debit;
    }

    public function findModel($id) {
        if (($model = Taccmutationtmp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('now()');
                $this->mdate = new Expression('now()');
                //$this->BDATE = new Expression("TO_DATE('" . $this->BDATE . "', 'yyyy/mm/dd')");
            
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                //$this->BDATE = new Expression("TO_DATE('" . $this->BDATE . "', 'yyyy/mm/dd')");
                return true;
            }
        }
        return false;
    }

}
