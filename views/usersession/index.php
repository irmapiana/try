<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Muser;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesi Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usersession-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="usersession-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Create Usersession', ['create'], ['class="mproduct-index"'],['class' => 'btn btn-success btn-create']) ?>
         </p>
         </section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SSID',
            'SECRETKEY',
            'IMEIID',
            'userid',
            [
                'attribute' => 'user.NAME',
                'value' => 'user.NAME',
                'filter' => Html::activeTextInput($searchModel, 'user.NAME', ['class' => 'form-control']),
            ],
            [
                'attribute' => 'user.MOBILENO',
                'value' => 'user.MOBILENO',
                'filter' => Html::activeTextInput($searchModel, 'user.MOBILENO', ['class' => 'form-control']),
            ],
            [
                'attribute' => 'user.BIRTHDATE',
                'value' => date_create('user.BIRTHDATE') ? 'user.BIRTHDATE' : '',
                'value' => function ($data) {
                    return (strrpos($data['user']['BIRTHDATE'], '-') ? $data['user']['BIRTHDATE'] : (substr($data['user']['BIRTHDATE'], 0, 4) . "-" . substr($data['user']['BIRTHDATE'], 4, 2) . "-" . substr($data['user']['BIRTHDATE'], 6, 2)));
                },
                'filter' => Html::activeTextInput($searchModel, 'user.BIRTHDATE', ['class' => 'form-control']),
                // 'format' => ['date', 'php:d-m-Y']
            ],
            [
                'attribute' => 'user.MOTHERNAME',
                'value' => 'user.MOTHERNAME',
                'filter' => Html::activeTextInput($searchModel, 'user.MOTHERNAME', ['class' => 'form-control']),
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data' => [
                                        'confirm' => Yii::$app->params['deleteConfirm'],
                                        'method' => 'post',
                                    ]
                        ]);
                    },
                ]
            ]
        ],
    ]); ?>
</div>
