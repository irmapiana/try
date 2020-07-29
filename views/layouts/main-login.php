<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style type="text/css">
@font-face{
    font-family: "Century Gothic";
    src: url("../../font/Century Gothic.ttf") format("truetype");
    font-weight: normal;
    font-style: normal;
}
.login-page {
    background-color: #fff;
    /*background-position: center center;*/
    background: url("../../img/bg1.jpg") no-repeat center center fixed;
    background-size: cover;
    font-family: "Century Gothic";
}

.login-box, .register-box {
    width: 400px; margin-top: 200px;
}
.shadowed { 
    -webkit-filter: drop-shadow(0px 0px 2px #d2d2d2);
    filter: drop-shadow(0px 0px 2px #ffffff);
}



</style>
<body class="login-page">

<?php $this->beginBody() ?>

    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
