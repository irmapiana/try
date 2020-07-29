<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * 
 */
class User extends ActiveRecord implements IdentityInterface {

    const STATUS_active = 10;
    const STATUS_NON_active = 20;

    public $id;
    public $authKey;
    public $accessToken;

    const ROLE_ADMIN = 'sysadm';
    const ROLE_MOBILE = 'trxmobile';
    const ROLE_PLN = 'trxpln';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'm_user';
    }

    public function behaviors() {
        return [
            TimeStampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
        [['userid'], 'required'],
        [['status_user'], 'number'],
        [['userid', 'cby', 'mby', 'mobileno'], 'string', 'max' => 20],
        [['password'], 'string', 'max' => 64],
        [['cdate', 'mdate'], 'string', 'max' => 7],
        [['name'], 'string', 'max' => 50],
        [['group_user','webgroup_user'], 'string', 'max' => 30],
        [['conc_login'], 'string'],
        //[['userid', 'userid', 'userid', 'userid'], 'unique', 'targetattribute' => ['userid', 'userid', 'userid', 'userid'], 'message' => 'The combination of and userid has already been taken.']
        ];
        }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'userid' => 'LOGIN',
            'password' => 'PASSWORD',
            //'groupid' => 'Groupid',
            'cby' => 'cby',
            'cdate' => 'cdate',
            'mby' => 'mby',
            'mdate' => 'mdate',
            'name' => 'NAMA',
            'group_user' => 'Group  User',
            'webgroup_user' => 'Hak Akses',
            'status_user' => 'AKTIF',
            'mobileno' => 'NO HP',
        ];
    }

    public function getStatusOptions() {
        return [
            self::STATUS_active => 'active',
            self::STATUS_NON_active => 'Non active',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['userid' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['userid' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_active,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    public function getUsername() {
        return $this->name;
    }

    public function getRole() {
        return $this->webgroup_user;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->userid;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        if ($this->password === md5($password)) {
            return true;
        } else {
            return false;
        }
        //return Yii::$app->security->validatePassword($password, $this->PASSWORD);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

        public function session_validate(  )
    {

        // Encrypt information about this session
        $name = $this->session_hash_string($_SERVER['HTTP_NAME'], $this->userid);
    
        // Check for instance of session
        if ( session_exists() == false )
        {
            // The session does not exist, create it
            $this->session_reset($name);
        }
        
        // Match the hashed key in session against the new hashed string
        if ( $this->session_match($name) )
        {
            return true;
        }
        
        // The hashed string is different, reset session
        $this->session_reset($name);
        return false;
    }
    
    /**
     * session_exists()
     * Will check if the needed session keys exists.
     *
     * @return {boolean} True if keys exists, else false
     */
    
    private function session_exists()
    {
        return isset($_SESSION['NAME_KEY']) && isset($_SESSION['INIT']);
    }
    
    /**
     * session_match()
     * Compares the session secret with the current generated secret.
     *
     * @param {String} $user_agent The encrypted key
     */
    
    private function session_match( $name )
    {
        // Validate the agent and initiated
        return $_SESSION['NAME_KEY'] == $name && $_SESSION['INIT'] == true;
    }
    
    /**
     * session_encrypt()
     * Generates a unique encrypted string
     *
     * @param {String} $user_agent      The http_user_agent constant
     * @param {String} $unique_string    Something unique for the user (email, etc)
     */
    
    private function session_hash_string( $name, $unique_string )
    {
        return md5($name.$unique_string);
    }
    
    /**
     * session_reset()
     * Will regenerate the session_id (the local file) and build a new
     * secret for the user.
     *
     * @param {String} $user_agent
     */
    
    private function session_reset( $userid )
    {
        // Create new id
        @session_regenerate_id(TRUE);
        $_SESSION = array();
        $_SESSION['INIT'] = true;
        
        // Set hashed http user agent
        $_SESSION['NAME_KEY'] = $name;
    }
    
    /**
     * Destroys the session
     */
    
    private function session_destroy()
    {
        // Destroy session
        session_destroy();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
}