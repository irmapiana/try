<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_purchasepriceitem".
 *
 * @property string $spriceid
 * @property string $SPRICE_NAME
 * @property string $SPRICE_VALIDFROM
 * @property string $SPRICE_VALIDUNTIL
 * @property string $cby
 * @property string $cdate
 * @property string $mby
 * @property string $mdate
 * @property string $note
 */
class MsellingFeeitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_sellingfeeitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['spriceid'], 'required'],
            [['spriceid'], 'string', 'max' => 50],
            // [['SPRICE_VALIDFROM', 'SPRICE_VALIDUNTIL', 'cdate', 'mdate'], 'string', 'max' => 7],
            // [['cby', 'mby'], 'string', 'max' => 20],
            [['spriceid', 'spriceid', 'spriceid'], 'unique', 'targetAttribute' => ['spriceid', 'spriceid', 'spriceid'], 'message' => 'The combination of  and spriceid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'spriceid' => 'KODE HARGA',
            'sfitem_validfrom' => 'TGL BERLAKU',
            'sfitem_validuntil' => 'TGL BERAKHIR',
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

                // Untuk tanggal yang dari form, kayaknya harus dibuat seperti di bawah agar bisa disimpan ke DB
                $this->sfitem_validfrom = new Expression("TO_DATE('" . $this->sfitem_validfrom . "', 'dd/mm/yyyy')");
                $this->sfitem_validuntil = new Expression("TO_DATE('" . $this->sfitem_validuntil . "', 'dd/mm/yyyy')");
                return true;
            } else {
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                $this->sfitem_validfrom = new Expression("TO_DATE('" . $this->sfitem_validfrom . "', 'dd/mm/yyyy')");
                $this->sfitem_validuntil = new Expression("TO_DATE('" . $this->sfitem_validuntil . "', 'dd/mm/yyyy')");
                return true;
            }
        }
        return false;
    }
}
