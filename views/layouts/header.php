<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\User;
use app\components\Polisitoba;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">
    <nav class="navbar navbar-static-top" role="navigation" style="font-size: 18px;">

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu"  >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        $role=Yii::$app->user->identity->webgroup_user;?>
                        <?=
                        dmstr\widgets\Menu::widget(
                             [
                                        'items'=> [
                                            [
                                                'icon' => 'fa fa-database', 'label' => 'Master Data', 'visible'=>(Polisitoba::boi('masterdata/masterdata',$role))],]]
                            )?>
                    </a>
                    <ul class="dropdown-menu" >
                            <a href="#" style="padding: 0px;">
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Produk', 'icon' => 'fa fa-database', 'url' => ['/product'],'visible'=>(Polisitoba::boi('product/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Item', 'icon' => 'fa fa-database', 'url' => ['/product-item'],'visible'=>(Polisitoba::boi('product-item/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Resource', 'icon' => 'fa fa-database', 'url' => ['/resource'],'visible'=>(Polisitoba::boi('resource/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Item Resource', 'icon' => 'fa fa-database', 'url' => ['/itemresource'],'visible'=>(Polisitoba::boi('itemresource/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Group Menu', 'icon' => 'fa fa-database', 'url' => ['/groupmenu'],'visible'=>(Polisitoba::boi('groupmenu/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Mobile', 'icon' => 'fa fa-database', 'url' => ['/mobile'],'visible'=>(Polisitoba::boi('mobile/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Message Template', 'icon' => 'fa fa-database', 'url' => ['/messagetemplate'],'visible'=>(Polisitoba::boi('messagetemplate/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Product Mapper', 'icon' => 'fa fa-database', 'url' => ['/productmapper'],'visible'=>(Polisitoba::boi('productmapper/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Admin Dan Fee', 'icon' => 'fa fa-database', 'url' => ['/madminandfee'],'visible'=>(Polisitoba::boi('madminandfee/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Registration', 'icon' => 'fa fa-database', 'url' => ['/registration'],'visible'=>(Polisitoba::boi('registration/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Unblock', 'icon' => 'fa fa-database', 'url' => ['/block'],'visible'=>(Polisitoba::boi('block/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Block', 'icon' => 'fa fa-database', 'url' => ['/blockakun'],'visible'=>(Polisitoba::boi('blockakun/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Bank', 'icon' => 'fa fa-database', 'url' => ['/bank'],'visible'=>(Polisitoba::boi('bank/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Config', 'icon' => 'fa fa-database', 'url' => ['/mconfig'],'visible'=>(Polisitoba::boi('mconfig/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Filter MPIN', 'icon' => 'fa fa-database', 'url' => ['/filtermpin'],'visible'=>(Polisitoba::boi('filtermpin/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Igate Product mapper', 'icon' => 'fa fa-database', 'url' => ['/igateproductmapper'],'visible'=>(Polisitoba::boi('igateproductmapper/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Menu Product Item', 'icon' => 'fa fa-database', 'url' => ['/menuproduct'],'visible'=>(Polisitoba::boi('menuproduct/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Service', 'icon' => 'fa fa-database', 'url' => ['/service'],'visible'=>(Polisitoba::boi('service/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Product Group Menu', 'icon' => 'fa fa-database', 'url' => ['/productmenu'],'visible'=>(Polisitoba::boi('productmenu/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Product Message', 'icon' => 'fa fa-database', 'url' => ['/productmessage'],'visible'=>(Polisitoba::boi('productmessage/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Promo', 'icon' => 'fa fa-database', 'url' => ['/promo'],'visible'=>(Polisitoba::boi('promo/index',$role))],]])
                                    ?>
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'RC Mapper', 'icon' => 'fa fa-database', 'url' => ['/rcmapper'],'visible'=>(Polisitoba::boi('rcmapper/index',$role))],]])
                                    ?>
                                </a>
    </ul>
</li>
        <li class="dropdown notifikasi-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        $role=Yii::$app->user->identity->webgroup_user;?>
                        <?=
                        dmstr\widgets\Menu::widget(
                             [
                                        'items'=> [
                                            [
                                                 'label' => 'Manajemen Hak akses', 'icon' => 'fa fa-group','visible'=>(Polisitoba::boi('manajemenhakakses/manajemenhakakses',$role))],]]
                            )?>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Pengguna', 'icon' => 'fa fa-group', 'url' => ['/user'],'visible'=>(Polisitoba::boi('user/index',$role))],]])
                                    ?>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Group Pengguna', 'icon' => 'fa fa-group', 'url' => ['/role'],'visible'=>(Polisitoba::boi('role/index',$role))],]])
                                    ?>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'group Pengguna', 'icon' => 'fa fa-group', 'url' => ['/sellingfeeitem'],'visible'=>(Polisitoba::boi('sellingfeeitem/index',$role))],]])
                                    ?>
                            </a>
                        </li>
        </ul>
    </li>
    <li class="dropdown messages-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        $role=Yii::$app->user->identity->webgroup_user;?>
                        <?=
                        dmstr\widgets\Menu::widget(
                             [
                                        'items'=> [
                                            [
                                                 'label' => 'Transaksi', 'icon' => 'fa fa-group','visible'=>(Polisitoba::boi('transaksi/transaksi',$role))],]]
                            )?>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Transaksi Mitra', 'icon' => 'fa fa-flash', 'url' => ['/tfront'],'visible'=>(Polisitoba::boi('tfront/index',$role))],]])
                                    ?>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Transaksi Provider', 'icon' => 'fa fa-flash', 'url' => ['/back'],'visible'=>(Polisitoba::boi('back/index',$role))],]])
                                    ?>
                            </a>
                        </li>
        </ul>
    </li>
    <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        $role=Yii::$app->user->identity->webgroup_user;?>
                        <?=
                        dmstr\widgets\Menu::widget(
                             [
                                        'items'=> [
                                            [
                                                 'label' => 'Laporan Transaksi', 'icon' => 'fa fa-group','visible'=>(Polisitoba::boi('laporantransaksi/laporantransaksi',$role))],]]
                            )?>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Detail Transaksi', 'icon' => 'fa fa-area-chart', 'url' => ['/trxdetail'],'visible'=>(Polisitoba::boi('trxdetail/index',$role))],]])
                                    ?>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <?php
                                $role= Yii::$app->user->identity->webgroup_user;?>
                                <?=
                                dmstr\widgets\Menu::widget(
                                    [
                                        'items'=> [
                                            [
                                                'label' => 'Rekap Transaksi', 'icon' => 'fa fa-area-chart', 'url' => ['/trxrecap'],'visible'=>(Polisitoba::boi('trxrecap/index',$role))],]])
                                    ?>
                            </a>
                        </li>
                  </ul>
            </li>

            <li style="margin-top: -20px">
                <a href="#" style="margin-top: -10px; font-family: Century Gothic">
                        <?= Html::a('Ganti Password', ['/site/changepassword'])?>
                        </a>
                        </li>

            <li style="margin-top: -20px">
                    <a href="#" style="margin-top: -10px; font-family: Century Gothic">
                        <?= Html::a('Sign out',['/site/logout'])?>
                    </a>
            </li>
               
                
            <!-- User image -->
                        <!-- Menu Footer-->
                <!-- User Account: style can be found in dropdown.less -->
        </div>
    </nav>
</header>
