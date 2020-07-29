<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "M_SELLPRICE".
 *
 * @property string $SPRICEID
 * @property string $SPRICE_NAME
 * @property string $SPRICE_VALIDFROM
 * @property string $SPRICE_VALIDUNTIL
 * @property string $CBY
 * @property string $CDATE
 * @property string $MBY
 * @property string $MDATE
 * @property string $NOTE
 */
class Msellprice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_purchasepriceitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppitemid'], 'required'],
            [['ppitemid'], 'string', 'max' => 50],
            [['spriceid'], 'string', 'max' => 100],
            // [['SPRICE_VALIDFROM', 'SPRICE_VALIDUNTIL', 'CDATE', 'MDATE'], 'string', 'max' => 7],
            // [['CBY', 'MBY'], 'string', 'max' => 20],
            [['ppitemid', 'ppitemid', 'ppitemid'], 'unique', 'targetAttribute' => ['ppitemid', 'ppitemid', 'ppitemid'], 'message' => 'The combination of  and Spriceid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ppitemid' => 'KODE HARGA',
            'spriceid' => 'DESKRIPSI',
            'ppitem_validfrom' => 'TGL BERLAKU',
            'ppitem_validuntil' => 'TGL BERAKHIR',
            'cby' => 'Cby',
            'cdate' => 'Cdate',
            'mby' => 'Mby',
            'mdate' => 'Mdate',
        ];
    }
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');

                // Untuk tanggal yang dari form, kayaknya harus dibuat seperti di bawah agar bisa disimpan ke DB
                $this->ppitem_validfrom = new Expression("TO_DATE('" . $this->ppitem_validfrom . "', 'yyyy/mm/dd')");
                $this->ppitem_validuntil = new Expression("TO_DATE('" . $this->ppitem_validuntil . "', 'yyyy/mm/dd')");
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                $this->ppitem_validfrom = new Expression("TO_DATE('" . $this->ppitem_validfrom . "', 'dd/mm/yyyy')");
                $this->ppitem_validuntil = new Expression("TO_DATE('" . $this->ppitem_validuntil . "', 'dd/mm/yyyy')");
                return true;
            }
        }
        return false;
    }
}
