<?php

namespace app\models;

use Yii;
use yii\db\Expression;

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
class Mloginhistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['history_id','userid'], 'required'],
            // [['productid', 'cby', 'MBY'], 'string', 'max' => 20],
            [['flag'], 'integer'],
            //[['CDATE', 'MDATE'], 'string', 'max' => 7],
            [['userid'], 'string', 'max' => 30],
            [['history_id'], 'integer']
            //[['active'], 'string', 'max' => 1],
            // [['productid', 'productid', 'productid', 'productid'], 'unique', 'targetAttribute' => ['productid', 'productid', 'productid', 'productid'], 'message' => 'The combination of  and productid has already been taken.'],
             [['historyid'], 'unique', 'targetAttribute' => ['historyid'], 'message' => 'historyid sudah ada.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'history_id' => 'historyid',
            'userid' => 'userid ',
            'flag' => 'flag',
            'login_date' => 'Login Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    }
?>