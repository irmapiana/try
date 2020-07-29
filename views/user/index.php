<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Inflokasi;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muser-index">
<?php //echo uran1980\yii\widgets\pace\Pace::widget(); ?>
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <P style="font-size: 30px; margin-top: -20px;">USER</P>
    
<div class="muser-index", style="margin-top: 40px;">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah User', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
    <div class="table" style="overflow: auto;overflow-y: hidden; height:inherit;">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userid',
            'name',
           // 'PASSWORD',
          //  'STATUS_USER',
             'webgroup_user',
            'mobileno',
            [
                    'attribute' => 'status_user',
                    'format' => 'raw',
                    'filter' => array(1 => "Y", 0 => "N"),
                    'options' => [
                        'width' => '80px',
                    ],
                    'value' => function ($data) {
                if ($data->status_user == 1)
                    return "Y";
                else
                    return "N";
            }
                ],
            // 'GROUPID',
            // 'CBY',
            // 'CDATE',
            // 'MBY',
            // 'MDATE',
            // 'ORGID',
            // 'GROUP_USER',
            // 'IDTYPE',
            // 'IDNO',
            // 'RT',
            // 'RW',
            // 'CHANNEL',
            // 'PROFILE_IMAGE',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}&nbsp&nbsp&nbsp&nbsp',
            'buttons' => [
                    // 'delete' => function ($url, $model) {
                    //     return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                    //                 'title' => Yii::t('app', 'Delete'),
                    //                 'data' => [
                    //                     'confirm' => Yii::$app->params['deleteConfirm'],
                    //                     'method' => 'post',
                    //                 ]
                    //     ]);
                    // },
                ]
            ]
        ],
    ]); ?>
    </div>
</div>
