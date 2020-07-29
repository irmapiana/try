<?php
use yii\helpers\Html; 
use yii\helpers\Url;
use app\models\User;
use app\components\Polisitoba;
?>




        <section class="user-panel dropdown" id="logo" style="margin-top: -100px; margin-left: -7px;  min-height: 100px; width: 100% !important; background-color: transparent; margin-right: -100px;">
            <?= Html::a('<img src="'. Url::base() . '/img/LogoBPR_KS.png" width=225 style="margin:32px 0px 10px 0px;" class="image logo-lg shadowed" alt="asd"/>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
            <!-- <span class="fa fa-power-off pull-right" id="logout-btn" style="margin-right: 10px; margin-top: 75px; color: whitesmoke;"></span> -->
        </section>


