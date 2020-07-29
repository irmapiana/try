<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "M_BANK".
 *
 * @property string $BANKCODE
 * @property string $BANKNAME
 * @property string $NOTE
 * @property string $CBY
 * @property string $CDATE
 * @property string $MBY
 * @property string $MDATE
 * @property string $ACTIVE
 */
class Trxdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_detail_transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accountno'], 'required'],
            [['accountno'], 'string', 'max' => 20],
            [['account_name'], 'string', 'max' => 32],
            [['tdate'], 'date'],
            [['productid'], 'string', 'max' => 50],
            [['itemid'], 'string', 'max' => 50],
            [['subscriber_id'], 'string', 'max' => 50],
            [['rm'], 'string', 'max' => 12],
            [['amount'], 'number', 'max' => 19],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'accountno' => 'NO Rek',
            'account_name' => 'Name',
            'tdate' => 'Tanggal',
            'productid' => 'Produk',
            'itemid'=> 'itemid',
            'subscriber_id' => 'id pel',
            'amount' => 'amount',
        ];
    }
}
