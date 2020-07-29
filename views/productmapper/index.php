<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use app\models\Mproductmapper;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\MproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produk Mapper';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <P style="font-size: 30px; margin-top: -20px;">PRODUK MAPPER</P>
    
<div class="mproductmapper-index", style="margin-top: 40px;">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah Produk Mapper', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
              'productid1',
           /* [
                'attribute' => 'productid',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'productid',
                    'data' => ArrayHelper::map(Mproduct::find()->all(), 'productid', 'productid'),
                    'options' => ['placeholder' => 'Pilih Group..'],
                ]),
            ],*/
            'itemid1',
            'productid2',
            'itemid2',
            'switch',
            'info',
            // 'cby',
            // 'CDATE',
            // 'MBY',
            // 'MDATE',
            ['class' => 'yii\grid\ActionColumn',
            'header' => 'ACTIONS',
                'template' => '{update}{delete}',
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
