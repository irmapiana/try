<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "M_USER".
 *
 * @property string $USERID
 * @property string $PASSWORD
 * @property string $GROUPID
 * @property string $CBY
 * @property string $CDATE
 * @property string $MBY
 * @property string $MDATE
 * @property string $NAME
 * @property string $ORGID
 * @property string $GROUP_USER
 * @property string $STATUS_USER
 * @property string $IDTYPE
 * @property string $IDNO
 * @property string $ADDRESS
 * @property string $RT
 * @property string $RW
 * @property string $KELURAHAN
 * @property string $KECAMATAN
 * @property string $CITY
 * @property string $PROVINCE
 * @property string $COUNTRY
 * @property string $POSTCODE
 * @property string $PHONENO
 * @property string $MOBILENO
 * @property string $CHANNEL
 * @property string $MOTHERNAME
 * @property string $EMAIL
 * @property string $BIRTHDATE
 * @property string $PROFILE_IMAGE
 *
 * @property MGROUP $gROUP
 */
class Muser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
     public $new_password;
    
    public static function tableName()
    {
        return 'm_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','name'], 'required'],
            [['status_user'], 'number'],
            [['userid', 'mobileno'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 64],
            [['name'], 'string', 'max' => 50],
            [['group_user','webgroup_user'], 'string', 'max' => 30],
             [['new_password'], 'string', 'min' => 6],
            [['userid', 'userid', 'userid', 'userid'], 'unique', 'targetAttribute' => ['userid', 'userid', 'userid', 'userid'], 'message' => 'The combination of  and Userid has already been taken.'],
            
             /*[['new_password'], 'required', 'when' => function ($model) {
            return (!empty($model->new_password));
        }, 'whenClient' => "function (attribute, value) {
                return ($('#muser-password').val().length>0);
            }"],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'LOGIN',
            'password' => 'PASSWORD',
            'cby' => 'Cby',
            'cdate' => 'Cdate',
            'mby' => 'Mby',
            'mdate' => 'Mdate',
            'name' => 'NAMA',
            'group_user' => 'GRUP PENGGUNA',
            'webgroup_user' => 'WEB GRUP PENGGUNA',
            'status_user' => 'STATUS PENGGUNA',
            'mobileno' => 'NO HP',
            'new_password' => 'PASSWORD',
        ];
    }
    
    
     public function setPassword($password) {
        $this->password = md5($password);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
}
