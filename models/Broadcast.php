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
class Broadcast extends \yii\db\activeRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'D_TOPIC_MESSAGE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        
     
        
        	[['TOPICID'], 'required'],
			[['TITLE'], 'required'],
            [['POSTDATE'], 'required'],
   			[['POSTBY'], 'required'],
            [['MESSAGE'], 'string','max'=>200],
			[['MESSAGEID'], 'required'],
            [['MESSAGEID','POSTBY','TITLE','TOPICID'], 'string','max'=>20],
            [['MESSAGEID', 'MESSAGEID', 'MESSAGEID'], 'unique', 'targetAttribute' => ['MESSAGEID', 'MESSAGEID', 'MESSAGEID'], 'message' => 'The combination of  and MessageID has already been taken.'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'TOPICID' => 'ID TOPIC',
            'TITLE' => 'JUDUL',
            'POSTDATE' => 'TANGGAL BUAT',
            'POSTBY' => 'DI BUAT OLEH',
            'MESSAGE' => 'ISI PESAN',
            'MESSAGEID' => 'ID PESAN'
         ];
    }

	    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->POSTBY = Yii::$app->user->identity->username;
                //$this->POSTDATE = new Expression(now());
 				$this->POSTDATE = new Expression(" TO_CHAR(now(),'MM/DD,YYYY'),'MM/DD/YYYY'");
                //TO_DATE(TO_CHAR(now(),'MM/DD,YYYY'),'MM/DD/YYYY' ) 
                // Untuk tanggal yang dari form, kayaknya harus dibuat seperti di bawah agar bisa disimpan ke DB
                $this->POSTDATE = new Expression("TO_DATE(" . $this->POSTDATE .")");
                return true;
            }
        }
     }
    
   public function getMESSAGEID()
   {
       return $this->hasOne(MESSAGEID::className(), ['MESSAGEID' => 'MESSAGEID']);
    }
   

}
