<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\PasswordForm;
use app\models\Muser;
use app\models\User;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['login', 'profile', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

     public function actionChangepassword()
     {
       $model = new PasswordForm;
        $modeluser = Muser::find()->where([
            'userid'=>Yii::$app->user->identity->userid
        ])->one();
      
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                try{
                    $modeluser->password = md5($_POST['PasswordForm']['newpass']);
                    if($modeluser->save()){
                        Yii::$app->getSession()->setFlash(
                            'success','Password changed'
                        );
                        return $this->redirect(['index']);
                    }else{
                        Yii::$app->getSession()->setFlash(
                            'error','Password not changed'
                        );
                        return $this->redirect(['index']);
                    }
                }catch(Exception $e){
                    Yii::$app->getSession()->setFlash(
                        'error',"{$e->getMessage()}"
                    );
                    return $this->render('changepassword',[
                        'model'=>$model
                    ]);
                }
            }else{
                return $this->render('changepassword',[
                    'model'=>$model
                ]);
            }
        }else{
            return $this->render('changepassword',[
                'model'=>$model
            ]);
        }
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
         $session = Yii::$app->session;
    $userid = $session->get('name');
  
    //concurrent active user session removed
    $active_sess = User::findOne($userid);
    $loginjson = json_decode($active_sess->conc_login);
    if ($active_sess->conc_login != "") {

        foreach ($loginjson as $key => $login) {
        if ($login->session_key == Yii::$app->session->getId()) {
            unset($loginjson[$key]);
        }
    }
    $login_json = json_encode($loginjson);   
    $active_sess->conc_login = '';
    $active_sess->save();

        # code...
    }
    
        //$session->destroy();
       Yii::$app->user->logout();

        //return $this->goHome();
        return $this->redirect(['/site/login']);
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionChangeProfile($userid)

        {

        $model=$this->loadModel($userid);

        $oldPassword=$model->password;//Capture the old password.

        $model->password='';//Make this empty.else the hashed password appears as string of dots in form field.

                

                if(isset($_POST['User']))

                {

                        $model->attributes=$_POST['User'];


                        if($model->password=="")

                            $model->password=$oldPassword;

                        else $model->password=md5($model->password);//customize the encrypting logic in your own way.You can put some additional salt.


                        if($model->save())

                                $this->redirect(array('view','userid'=>$model->userid));

                }


                $this->render('update',array(

                        'model'=>$model,

                ));

        }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTest()
    {
        var_dump(Yii::$app->user->identity->role);
        die();
    }

    public function actionUserSessionUpdate() {
    $session = Yii::$app->session;
    $userid = $session->get('userid');
    $name = $session->get('name');
    $data = array('session_id' => Yii::$app->session->getId());
    $isUserLogin = (!empty($userid) && !empty($name)) ? 'true' : 'false';
    if ($isUserLogin == 'false') {
        echo 'gotologin'; exit;
        //return $this->redirect(['/login']);
    } else {
        //Login user
       
        $active_sess = Clientmanagement::findOne($userid);
        $loginjson = json_decode($active_sess->conc_login);
       
        $login_json = [];
        foreach ($loginjson as $key => $val) {
            if ($val->session_key == Yii::$app->session->getId()) {
                $login_json[] = [$val->session_key => $val->session_key, 'session_key' => $val->session_key, 'time' => time()];
            } else {
                $login_json[] = [$val->session_key => $val->session_key, 'session_key' => $val->session_key, 'time' => $val->time];
            }
        }

        
        $login_json = json_encode($login_json);
        $active_sess->conc_login = $login_json;
        $active_sess->save();
    }
    exit;
}
}
