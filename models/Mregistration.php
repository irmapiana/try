<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\base\Model;

/**
 * This is the model class for table "m_product".
 *
 * @property string $productid
 * @property string $NOTE
 * @property string $cby
 * @property string $CDATE
 * @property string $MBY
 * @property string $MDATE
 * @property string $product_name
 * @property string $ACTIVE
 *
 * @property MSCHEMA[] $mSCHEMAs
 * @property PROTELMSCHEMA[] $pROTELMSCHEMAs
 * @property BMAS0K3MSCHEMA[] $bMAS0K3MSCHEMAs
 * @property PLINK0K3MSCHEMA[] $pLINK0K3MSCHEMAs
 */
class Mregistration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_registration_validation';
    }

    /**
     * @inheritdoc
     */
    public $enc_card_number;
    public $id;
    public $accountNo;
    public $accountName;
    public $flag;
    public $user;
    public $cardNumber;
    public $alamat;
    public $kota;
    public $propinsi;
    public $terminalId;
    public $cdate;
    public $mdate;
    public $cby;
    public $mby;
    public $address;
    public $city;
    public $province;
    public $data;
    public $statusCode;


    public function rules()
    {
        return [
            [['account_no','account_name', 'terminal_id', 'enc_card_number'], 'required'],
            [['cby', 'mby'], 'string', 'max' => 255],
            //[['CDATE', 'MDATE'], 'string'],
            [['account_name'], 'string', 'max' => 255],
            [['flag'], 'integer'],
            [['alamat'], 'string', 'max' =>300],
            [['propinsi', 'kota'], 'string', 'max' => 30],
            [['terminal_id'], 'string', 'max' => 20],


            // [['productid', 'productid', 'productid', 'productid'], 'unique', 'targetAttribute' => ['productid', 'productid', 'productid', 'productid'], 'message' => 'The combination of  and productid has already been taken.'],
             [['account_no'], 'unique', 'targetAttribute' => ['account_no'], 'message' => 'Account Number sudah ada.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'account_no' => 'No REK',
            'account_name' => 'NAMA Account',
            'enc_card_number' => 'No Kartu',
            'flag' => 'flag',
            'cby' => 'cby',
            'cdate' => 'Cdate',
            'mby' => 'Mby',
            'mdate' => 'Mdate',
            'alamat' => 'Alamat',
            'propinsi' => 'Provinsi',
            'kota' => 'Kota',
            'terminal_id'=> 'Terminal ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');
                //$this->enc_card_number = "SELECT pgp_sym_encrypt(enc_card_number, current_setting('mbb.key'), 'compress-algo=0, cipher-algo=3des') from m_registration_validation";
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                return true;
            }
        }
        return false;
    }
    
    public function getConcat()
    {
        return $this->account_no." - ".$this->account_name;
    }
}
?>