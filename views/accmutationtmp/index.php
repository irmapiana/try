<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mbankaccount;
use yii\helpers\ArrayHelper;
use app\models\Mmutationtype;
use yii\bootstrap\Modal;
use app\components\PTotal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaccmutationtmpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Persetujuan Akun';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taccmutationtmp-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'MUTATIONID',
            // 'cdate',

            [
                'label' => 'TANGGAL',
                'attribute' => 'cdate',
                'value' => function ($data) {
                    // Tipe datanya: timestamp
                    return str_replace('.', ':', substr($data['cdate'], 0, 18));
                }
            ],
            'userid',
           
             //'bankName.BANK_NAME',
             [
                'attribute' => 'mutationdetail.BANK_ACCOUNT_ID',
                'value' => 'bankName.BANK_NAME',
                'filter' => Html::activeDropDownList($searchModel, 'mutationdetail.BANK_ACCOUNT_ID', ArrayHelper::map(Mbankaccount::find()->orderBy(['BANK_NAME' => SORT_ASC])->asArray()->all(), 'BANK_CODE', 'BANK_NAME'), ['class' => 'form-control', 'prompt' => 'Semua Bank']),
            ],
             'BDATE',
              [
                'attribute' => 'MTYPE',
                'value' => 'mutationtype.MNAME',
                'filter' => Html::activeDropDownList($searchModel, 'MTYPE', ArrayHelper::map(Mmutationtype::find()->orderBy(['MNAME' => SORT_ASC])->asArray()->all(), 'MTYPE', 'MNAME'), ['class' => 'form-control', 'prompt' => 'Semua Tipe']),
            ],
            [
                'attribute' => 'AMOUNT',
                 'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                     return PTotal::formatRupiah($data->AMOUNT);
                },
            ],
            'noteS',
            // 'cby',
            // 'mby',
            // 'mdate',
            // 'SCHEMAID',
            // 'sch_updatedD',
            // 'ENDBALANCE',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}&nbsp&nbsp{batal}',
                'buttons' => [
                    //for approve
                  /*  'approve' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, [
                                    'title' => Yii::t('app', 'Approve'),
                                    'data' => [
                                        'confirm' => Yii::$app->params['approveConfirm'],
                                        'method' => 'post',
                                    ]
                        ]);
                    },*/
                    
                    //for batal
                    'batal' => function ($url, $model) {
                        // return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                        //             'title' => Yii::t('app', 'Cancel'),
                        //             'data' => [
                        //                 'confirm' => Yii::$app->params['batalConfirm'],
                        //                 'method' => 'post',
                        //             ]
                        // ]);
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                            'class'       => 'popup-modal',
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'data-id'     => $model->MUTATIONID,
                            //'data-name'   => $model->nomRessource,
                            'id'          => 'popupModal',
                        ]);
                    },
                    
                    //for delete
                     /*'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-repeat"></span>', $url, [
                                    'title' => Yii::t('app', 'Batal'),
                                    'data' => [
                                        'confirm' => Yii::$app->params['batalConfirm'],
                                        'method' => 'post',
                                    ]
                        ]);
                    },*/
                     //for update
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                    'title' => Yii::t('app', 'Ubah'),
                                    'data' => [
                                        //'confirm' => Yii::$app->params['ubahConfirm'],
                                        'method' => 'post',
                                    ]
                        ]);
                    },
                            
                     //url creator
                    'urlCreator' => function ($action, $model, $key, $index) {

                        /*if ($action === 'approve') {
                            return Url::toRoute(['/accmutationtmp/approve', 'id' => $model->MUTATIONID]);
                        }*/
                        if ($action === 'batal') {
                            return Url::toRoute(['/accmutationtmp/batal', 'id' => $model->MUTATIONID]);
                        }
                    }
                        ]
                    ],
                ]
            ]);
            ?>
            <?php Modal::begin([
                'header' => '<h4>Konfirmasi Pembatalan</h4>',
                'id'     => 'modal-delete',
                'footer' => Html::a('Ya', '', ['class' => 'btn btn-danger', 'id' => 'delete-confirm']),
            ]); ?>

            <?=  Yii::$app->params['batalConfirm'] ?>

            <?php Modal::end(); ?>
            <?php
                $this->registerJs("
                    $(function() {
                        $('.popup-modal').click(function(e) {
                            e.preventDefault();
                            var modal = $('#modal-delete').modal('show');
                            modal.find('.modal-body').load($('.modal-dialog'));
                            var that = $(this);
                            var id = that.data('id');
                            var name = that.data('name');
                            modal.find('.modal-title').text('Supprimer la ressource \"' + name + '\"');

                            $('#delete-confirm').click(function(e) {
                                e.preventDefault();
                                window.location = '/accmutationtmp/batal?id='+id;
                            });
                        });
                    });"
                );
            ?>
</div>
