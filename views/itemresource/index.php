<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use app\models\Mitemresource;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\MproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Resource';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <P style="font-size: 30px; margin-top: -20px;">Item Resource</P>
    
<div class="mitemresource-index", style="margin-top: 40px;">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah Produk Item', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
              'itemid',
           /* [
                'attribute' => 'productid',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'productid',
                    'data' => ArrayHelper::map(Mproduct::find()->all(), 'productid', 'productid'),
                    'options' => ['placeholder' => 'Pilih Group..'],
                ]),
            ],*/
            'resourceid',
            // 'cby',
            // 'CDATE',
            // 'MBY',
            // 'MDATE',
            ['class' => 'yii\grid\ActionColumn',
            'header' => 'ACTIONS',
                'template' => '{update} &nbsp; &nbsp; {delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => Yii::t('app', 'Delete'),
                                        'data' => [
                                            'confirm' => Yii::$app->params['deleteConfirm'],
                                            'method' => 'post',
                                        ]
                            ]);
                        }
                        ]
                    ]
                ],
            ]);
            ?>
</div>
