<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
* 
*/
class Mmconfig extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'm_config';
        # code...
    }

    public function rules()
    {
        return [
            [['identifier'], 'required'],
            [['url_mode'], 'string', 'max' => 40],
            [['identifier', 'value'], 'string', 'max' => 50],
            [['active'], 'string', 'max' => 1],
        ];
    }

    public function attributeLabels()
    {
        return[
            'identifier' => 'Identifier',
            'url_mode' => 'URL Mode',
            'value' => 'value',
            'active' => 'Active',
        ];
    }
}

?>