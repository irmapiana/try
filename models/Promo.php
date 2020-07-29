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
class Promo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_promo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['promo_seq'], 'required'],
            [['promo_seq'], 'integer'],
            [['url_image'], 'string', 'max' => 2000],
            [['url_content'], 'string', 'max' => 200],
            [['active'], 'integer'],
            [['promo_seq', 'promo_seq', 'promo_seq', 'promo_seq'], 'unique', 'targetAttribute' => ['promo_seq', 'promo_seq', 'promo_seq', 'promo_seq'], 'message' => 'The combination of  and promo_seq has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'promo_seq' => 'PROMO',
            'url_image' => 'URL IMAGE',
            'url_content' => 'URL CONTENT',
            'active' => 'ACTIVE',
        ];
    }
}
