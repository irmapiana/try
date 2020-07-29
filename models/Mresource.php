<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "USER_SESSIONS".
 *
 * @property string $SSID
 * @property string $SECRETKEY
 * @property string $IMEIID
 * @property string $userid
 */
class Mresource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        
     
        
        	[['resourceid'], 'required'],
			[['resourceid'], 'string', 'max' => 40],
            [['resource_type'], 'string','max'=>20],
			[['resource_url'], 'string', 'max' => 256],
            [['layout_id'], 'string','max'=>20],
            [['resourceid', 'resourceid', 'resourceid'], 'unique', 'targetAttribute' => ['resourceid', 'resourceid', 'resourceid'], 'message' => 'The combination of  and resourceid has already been taken.'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'resourceid' => 'Resource ID',
            'resource_type' => 'Resource Type',
            'resource_url' => 'Resource URL',
            'layout_id' => 'Layout id',
            'cby' => 'cby',
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
       return $this->resourceid." - ".$this->resource_type;
   }
   

}
