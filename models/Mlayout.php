<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "m_purchasepriceitem".
 *
 * @property string $LOKASI_ID
 * @property string $LOKASI_KODE
 * @property string $LOKASI_NAMA
 * @property string $LOKASI_PROPINSI
 * @property string $LOKASI_KABUPATENKOTA
 * @property string $LOKASI_KECAMATAN
 * @property string $LOKASI_KELURAHAN
 */
class Mlayout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_layout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['layoutid'], 'required'],
            [['width'], 'string', 'max' => 20],
            [['length'], 'string', 'max' => 20],
            // [['SPRICE_VALIDFROM', 'SPRICE_VALIDUNTIL', 'cdate', 'mdate'], 'string', 'max' => 7],
            // [['cby', 'mby'], 'string', 'max' => 20],
            [['layoutid', 'layoutid', 'layoutid'], 'unique', 'targetAttribute' => ['layoutid', 'layoutid', 'layoutid'], 'message' => 'The combination of  and layoutid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'layoutid' => 'ID',
            'width' => 'Lebar',
            'length' => 'Panjang',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
        ];
    }

    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->cby = Yii::$app->user->identity->username;
                $this->mby = Yii::$app->user->identity->username;
                $this->cdate = new Expression('transaction_timestamp()');
                $this->mdate = new Expression('now()');
                return true;
                # code...
            }else{
                $this->mby = Yii::$app->user->identity->username;
                $this->mdate = new Expression('now()');
                return true;
            }
            # code...
        }
        return false;
    }
    public function getConcat()
    {
        return $this->layoutid;
    }
}
