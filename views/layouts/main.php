<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        //app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
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

<script>
    var clockToggle = true;
function formatDate(date) {
  var monthnames = [
    "January", "February", "March",
    "April", "May", "June", "July",
    "August", "September", "October",
    "November", "December"
  ];

  var day = date.getDate();
  var monthIndex = date.getMonth();
  var year = date.getFullYear();

  return day + ' ' + monthnames[monthIndex] + ' ' + year;
}

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    var dt = formatDate(today);
    
    document.getElementById('live-clock').innerHTML =
    dt + " " + h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
function hideClock() {
    clockToggle = !clockToggle;
    if (clockToggle) {
        document.getElementById('live-clock').style.display = "block";
        document.getElementById('logout-min-btn').style.display = "none";
        document.getElementById('logout-btn').style.display = "block";
        
    } else {
        document.getElementById('live-clock').style.display = "none";
        document.getElementById('logout-min-btn').style.display = "block";
        document.getElementById('logout-btn').style.display = "none";
    }
    
    // alert(liveClock.innerHtml);    
    // liveClock.setAttribute('style', '');
}

</script>    
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function showSettingDropdown() {
    document.getElementById("accSetting").classList.toggle("show");
    // alert();
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassname("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
 
<style>
@font-face{
    font-family: "Century Gothic";
    src: url("../../font/Century Gothic.ttf") format("truetype");
    font-weight: normal;
    font-style: normal;

}
body {
    background-color: #fff;
    font-family: "Century Gothic";
    font-size: 11px;

}
.content-wrapper, .right-side {
    background-color: #3399ff;
}

h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: 'Century Gothic';
}

#logo-bg {
    background-position: center center;
    background-image: url("../../img/bg1.jpg")no-repeat center center fixed;
    background-size: cover;
}


.content-header>h1 {
    font-family: "Century Gothic";
    font-size: 20px;
}
.sidebar-menu .treeview-menu>li>a {
    padding: 0px;
    font-size: 12px;
}
.sidebar-menu>li>a {
    padding: 0px;
    font-size: 14px;
}
.dropbtn {
    background-color: transparent;
    color: white;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:focus, .dropdown-content a:hover {
    background-color: #6baecc;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100px;
    margin-top: 60px;
    margin-left: -10px;
    overflow: overlay;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 10;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.show {display:block;}

.btn-create {
    position: absolute;
    top: 10px;
    z-index: 1032;
    right: 10px;
}
th a:hover {
    color: khiki;
}
th, th a {
    color: whitesmoke;
}
thead {
    background-color: #1a79c9;
}
.content {
    margin-top: -15px;
}
/*
#logo-bg {
    background: -moz-linear-gradient(45deg, rgba(149,74,246,1) 0%, rgba(247,51,142,1) 100%);
    background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(149,74,246,1)), color-stop(100%, rgba(247,51,142,1))); 
    background: -webkit-linear-gradient(45deg, rgba(149,74,246,1) 0%, rgba(247,51,142,1) 100%);
    background: -o-linear-gradient(45deg, rgba(149,74,246,1) 0%, rgba(247,51,142,1) 100%); 
    background: -ms-linear-gradient(45deg, rgba(149,74,246,1) 0%, rgba(247,51,142,1) 100%); 
    background: linear-gradient(45deg, rgba(149,74,246,1) 0%, rgba(247,51,142,1) 100%); 
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7338e', endColorstr='#954af6',GradientType=1 ); 
}
.main-sidebar {
    -webkit-box-shadow: 2px 0px 29px -2px rgba(64,64,64,0.63);
    -moz-box-shadow: 2px 0px 29px -2px rgba(64,64,64,0.63);
    box-shadow: 2px 0px 29px -2px rgba(64,64,64,0.63);
    
}
.skin-blue .sidebar a, .skin-blue .treeview-menu>li>a {
    color: #232323;
}
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
    background: transparent;
}
.skin-blue .sidebar-menu>li:hover>a, .skin-blue .treeview-menu>li>a:hover {
    color: #232323;
    background: #00d6ae;
    border-left: 0;
}
.skin-blue .sidebar-menu>li.active>a, .skin-blue .treeview-menu>li.active>a {
    color: #232323;
    background: #00d6ae;
    border-left: 0;
}
.skin-blue .sidebar-menu>li>.treeview-menu {
    background: transparent;    
}
.sidebar-menu {
    margin-top: -5px;
}
.sidebar-menu .treeview-menu {
    padding-left: 0;
}
.skin-blue .sidebar-menu>li>.treeview-menu {
    margin-left: 0;
    margin-right: 0;
}*/
 .shadowed { 
    -webkit-filter: drop-shadow(0px 0px 2px #d2d2d2);
    filter: drop-shadow(0px 0px 2px #ffffff);
}
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side{
    background-color: #3399ff !important;
}
.skin-blue .sidebar a, .skin-blue .treeview-menu>li>a {
    color: #1e2325;
}
.skin-blue .sidebar-menu>li:hover>a, .skin-blue .treeview-menu>li>a:hover {
    color: #1e2325;
    background: #d3d6da;
    border-left: 0;
}
.skin-blue .sidebar-menu>li.active>a, .skin-blue .treeview-menu>li.active>a {
    color: #1e2325;
    background: #afd1ff;
    border-left: 0;
}
.skin-blue .sidebar-menu>li>.treeview-menu {
    background: #ecf0f5;    
}


</style>
    </head>
    <body class="hold-transition skin-white sidebar-mini" onload="startTime()">
    <?php $this->beginBody() ?>
    <div>


        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
        
<?php } ?>
