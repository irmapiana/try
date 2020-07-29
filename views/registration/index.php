<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use app\models\Mregistration;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\MproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <P style="font-size: 30px; margin-top: -20px;">Registration</P>
    
<div class="mregistration-index", style="margin-top: 40px;">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah Merchant', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>

    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
              'account_no',
           /* [
                'attribute' => 'productid',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'productid',
                    'data' => ArrayHelper::map(Mproduct::find()->all(), 'productid', 'productid'),
                    'options' => ['placeholder' => 'Pilih Group..'],
                ]),
            ],*/
            'account_name',
            
            //'flag',
            'enc_card_number',
            /*[
                'attribute' => 'enc_card_number',
                'value' => function ($data) {
                    // Tipe datanya: timestamp
                    return substr($data->enc_card_number, 0, 5)."XXXXXXXXX".substr($data->enc_card_number,-2);
                }
            ],
            /*[
                'attribute' => 'card_number',
                'value' => function ($data) {
                    // Tipe datanya: timestamp
                    return substr($data->card_number, 0, 5)."XXXXXXXXX".substr($data->card_number,-2);
                }
            ],*/
            'alamat',
            'propinsi',
            'kota',
            'terminal_id',
            
            
            // 'cby',
            // 'CDATE',
            // 'MBY',
            // 'MDATE',
            ['class' => 'yii\grid\ActionColumn',
            'header' => 'ACTIONS',
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
                        }
                    ]
                        /*[
                    'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'flag'=>$model->flag, 'account_no'=>$model->account_no], [
                                        'title' => Yii::t('app', 'Delete'),
                                        'data' => [
                                            'confirm' => Yii::$app->params['deleteConfirm'],
                                            'method' => 'post',
                                            //'params' => ['flag'->$flag],
                                        ]
                            ]);
                        }
                    ]*/
                ]
            ],
        ]);
    ?>
</div>
