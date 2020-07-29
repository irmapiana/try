<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            //['conc_login', 'unique', 'targetattribute' => 'conc_login']
            //[['conc_login', 'conc_login', 'conc_login', 'conc_login'], 'unique', 'targetAttribute' => ['conc_login', 'conc_login', 'conc_login', 'conc_login'], 'message' => 'The combination of  and Userid has already been taken.'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
$session = Yii::$app->session;
$session->set('name', $this->username);
           //$get_limit = User::findOne(['name' => 'login_limit']);
            $login_limit = 1; //$get_limit->value;
            $active_sess = User::findOne($this->username);
//echo $active_sess->password;
//exit();
if ($active_sess->conc_login == '' or count(json_decode($active_sess->conc_login)) == 0) {
    
    $login_json = json_encode([
        [Yii::$app->session->getId() => Yii::$app->session->getId(), 'session_key' => Yii::$app->session->getId(), 'time' => time()]
    ]);
    $active_sess->conc_login = $login_json;
    //var_dump($active_sess);
    //exit();
    $active_sess->save();
} else if (count(json_decode($active_sess->conc_login)) > 0 and count(json_decode($active_sess->conc_login)) < $login_limit) {

    $login_json = json_decode($active_sess->conc_login);
    $login_json[] = [Yii::$app->session->getId() => Yii::$app->session->getId(), 'session_key' => Yii::$app->session->getId(), 'time' => time()];
    $login_json = json_encode($login_json);
    //print_r($login_json); exit;                
    $active_sess->conc_login = $login_json;
    $active_sess->save();
} else if (count(json_decode($active_sess->conc_login)) >= $login_limit) {

    $logins = json_decode($active_sess->conc_login);

    
    foreach ($logins as $key => $login) {
        if ($login->time < time() - 120) {
            //this checks if the iterated login is greater than the current time -120seconds and if found to be true then the user is inactive
            //then set this current login to null by using the below statement
            //$logins[$key] = null; // or unset($logins[$key]) either should work;
            unset($logins[$key]);
        }
    }
 
    //after iteration we check if the count of logins is still greater than the limit
    if (count($logins) >= $login_limit) {
        //then return a login error that maximum logins reached
        //echo 'you are not allowed to login as you have breeched the maximum session limit.';
        //exit;
        $login_json = json_encode($logins);
        $active_sess->conc_login = $login_json;
        $active_sess->save();

        //$this->addError($attribute, 'you are not allowed to login as you have breeched the maximum session limit.');
return false;
    } else {
        //then login is successsfull

        $login_json = [];
        foreach ($logins as $key => $val) {
            $login_json[] = [$val->session_key => $val->session_key, 'session_key' => $val->session_key, 'time' => $val->time];
        }
        $login_json[] = [Yii::$app->session->getId() => Yii::$app->session->getId(), 'session_key' => Yii::$app->session->getId(), 'time' => time()];
        $login_json = json_encode($login_json);

        $active_sess->conc_login = $login_json;
        $active_sess->save();
    }

    //update the logins column to equal to json_encode($logins);
}

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }


}
