<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "M_SCHEMA".
 *
 * @property string $PRODUCTID
 * @property string $ITEMID
 * @property string $SCHEMAID
 * @property string $CBY
 * @property string $CDATE
 * @property string $MBY
 * @property string $MDATE
 * @property string $CLASSNAME
 * @property string $ITYPE
 * @property integer $CA_ADMINFEE
 * @property string $FIX_CA_ADMINFEE
 * @property string $CASHBACKID
 * @property integer $MINUS_FACTOR
 * @property integer $PLUS_FACTOR
 * @property string $INVOICE_METHOD
 * @property integer $PPN
 * @property string $BANKCODE
 * @property string $ORGID
 * @property string $ACTIVE
 * @property string $CONVERTER
 * @property string $DESTINATIONID
 * @property string $RECON_CODE
 * @property string $PID
 * @property string $ACCID
 * @property string $CID
 * @property string $MULTIPLY_FACTOR
 * @property string $FEEBASE
 * @property string $UPDATED
 * @property string $SCH_UPDATED
 * @property string $CALENDARID
 * @property string $ADMININCLUDE
 * @property string $INPUT1
 * @property string $INPUT2
 * @property string $INPUT3
 * @property string $INPUT4
 * @property string $SPRICEID
 * @property string $PPRICEID
 *
 * @property MPRODUCT $pRODUCT
 */
class Mschema extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_schema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid', 'itemid', 'schemaid','itype', 'sch_updated'], 'required'],
            [['ca_adminfee', 'minus_factor', 'plus_factor', 'ppn'], 'integer'],
            [['multiply_factor'], 'number'],
            [['productid', 'itemid', 'cby', 'mby', 'cashbackid', 'pid', 'userid', 'input1', 'input2', 'input3', 'input4'], 'string', 'max' => 20],
            [['schemaid'], 'string', 'max' => 100],
           /* [['CDATE', 'MDATE'], 'string', 'max' => 7],*/
            [['classname', 'converter'], 'string', 'max' => 80],
            [['itype','fix_ca_adminfee', 'invoice_method', 'active', 'feebase', 'updated', 'sch_updated', 'admininclude'], 'string', 'max' => 1],
            [['bankcode'], 'string', 'max' => 11],
            [['orgid', 'destinationid', 'cid', 'spriceid', 'ppriceid'], 'string', 'max' => 50],
            [['recon_code'], 'string', 'max' => 10],
            [['calendarid'], 'string', 'max' => 5],
            [['schemaid', 'schemaid', 'schemaid', 'schemaid', 'sch_updated', 'sch_updated', 'sch_updated', 'sch_updated'], 'unique', 'targetAttribute' => ['schemaid', 'schemaid', 'schemaid', 'schemaid', 'sch_updated', 'sch_updated', 'sch_updated', 'sch_updated'], 'message' => 'The combination of Schemaid and Sch  Updated has already been taken.'],
            [['productid'], 'exist', 'skipOnError' => true, 'targetClass' => Mproduct::className(), 'targetAttribute' => ['productid' => 'productid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productid' => 'PRODUK',
            'itemid' => 'ITEM',
            'schemaid' => 'SKEMA',
            'cby' => 'DIBUAT OLEH',
            'cdate' => 'TANGGAL DIBUAT',
            'mby' => 'DIUBAH OLEH',
            'mdate' => 'TERAKHIR DIUBAH',
            'classname' => 'NAMA PERSISTANT',
            'itype' => 'TIPE ORGANISASI',
            'ca_adminfee' => 'ADMIN FEE',
            'fix_ca_adminfee' => 'FIX ADMIN',
            'cashbackid' => 'Cashbackid',
            'minus_factor' => 'Minus  Factor',
            'plus_factor' => 'Plus  Factor',
            'invoice_method' => 'Invoice  Method',
            'ppn' => 'Ppn',
            'bankcode' => 'KODE BANK',
            'orgid' => 'ORGANISASI',
            'active' => 'AKTIF',
            'converter' => 'NAMA KONVERTER',
            'destinationid' => 'TUJUAN TRANSAKSI',
            'recon_code' => 'Recon  Code',
            'pid' => 'Pid',
            'userid' => 'KODE AKUN',
            'cid' => 'Cid',
            'multiply_factor' => 'Multiply  Factor',
            'feebase' => 'Feebase',
            'updated' => 'Updated',
            'sch_updated' => 'SCH UPDATE',
            'calendarid' => 'KALENDER',
            'admininclude' => 'TERMASUK ADMIN',
            'input1' => 'Input1',
            'input2' => 'Input2',
            'input3' => 'Input3',
            'input4' => 'Input4',
            'spriceid' => 'KODE HARGA',
            'ppriceid' => 'KODE PEMBELIAN',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPRODUCT()
    {
        return $this->hasOne(Mproduct::className(), ['productid' => 'productid']);
    }

    public function getOrg(){
        return $this->hasOne(Morg::className(), ['orgid' => 'orgid']);
    }

    public function getBank(){
        return $this->hasOne(Bank::className(), ['bankcode' => 'bankcode']);
    }

    public function getAccount(){
        return $this->hasOne(Maccount::className(), ['userid' => 'userid']);
    }
}
