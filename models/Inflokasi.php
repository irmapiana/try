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
class Inflokasi extends \yii\db\activeRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'INF_LOKASI';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOKASI_NAMA'], 'required'],
            [['LOKASI_NAMA'], 'string', 'max' => 255],
            [['LOKASI_KODE'], 'string', 'max' => 100],
            // [['SPRICE_VALIDFROM', 'SPRICE_VALIDUNTIL', 'cdate', 'mdate'], 'string', 'max' => 7],
            // [['cby', 'mby'], 'string', 'max' => 20],
            [['LOKASI_KODE'], 'string', 'max' => 150],
            [['LOKASI_ID', 'LOKASI_ID', 'LOKASI_ID'], 'unique', 'targetAttribute' => ['LOKASI_ID', 'LOKASI_ID', 'LOKASI_ID'], 'message' => 'The combination of  and spriceid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOKASI_ID' => 'ID',
            'LOKASI_KODE' => 'KODE',
            'LOKASI_NAMA' => 'NAMA',
            'LOKASI_PROPINSI' => 'PROPINSI',
            'LOKASI_KABUPATENKOTA' => 'KABUPATEN KOTA',
            'LOKASI_KECAMATAN' => 'KECAMATAN',
            'LOKASI_KELURAHAN' => 'KELURAHAN',
        ];
    }
}
