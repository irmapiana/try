<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Akun';
$this->params['breadcrumbs'][] = $this->title;
?>
<P style="font-size: 30px; margin-top: -40px;">AKUN</P>

<div class="maccount-index">

   <section class="btn btn-success btn-create", style=" margin-top: 40px;">
        
        <?= Html::a('Tambah Akun', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
<br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userid',
            'account_name',
            //'acccontrol.bbalance',
            /*[
                'format' => 'Currency',
                'attribute' => 'acccontrol.BBALANCE',
            ],*/
            
            [
                'attribute' => 'rewcontrol.bbalance',
                'format'=>'raw',
                'value' => function ($data) {
                        return $data->rewcontrol ? '<div align="right">'.number_format($data->rewcontrol->bbalance, 0, ',', '.').'</div>' : '';
                },     
            ],
            
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}&nbsp&nbsp&nbsp&nbsp{delete}',
            'buttons' => [
                    'delete' => function ($url, $model) {
                        $schema = \app\models\Mschema::find()->where('orgid = :id', [':id' => $model->userid])->one();
                        $rewardmutation = \app\models\Taccmutationtmp::find()->where('userid = :id', [':id' => $model->userid])->one();
                        if (is_null($schema) && is_null($rewardmutation)) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => Yii::t('app', 'Delete'),
                                        'data' => [
                                            'confirm' => Yii::$app->params['deleteConfirm'],
                                            'method' => 'post',
                                        ]
                            ]);
                        }
                    },
                ]
            ]
        ],
    ]); ?>
</div>
