<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MwebgroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>

   <P style="font-size: 30px; margin-top: -20px;">GROUP PENGGUNA</P>
    
<div class="mwebgroup-index" style="margin-top: 40px">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah Group Pengguna', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'group_user',
            'gusername',
            'note',
            //'cdate',
            ///'cby',
            // 'mdate',
            // 'mby',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'ACTIONS',
                'template' => '{update}{view}',
                    /*'delete' => function ($url, $model) {
                        $item = \app\models\MMenugroup::find()->where('group_user = :id', [':id' => $model->group_user])->one();
                        if (is_null($item)) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'Delete'),
                                'data' => [
                                    'confirm' => Yii::$app->params['deleteConfirm'],
                                    'method' => 'post',
                                ]
                            ]);
                        }
                    },*/
                ]
            ],
        ]); ?>

    <?php Modal::begin([
        'header' => '<h4>Konfirmasi Pembatalan</h4>',
        'id'     => 'modal-delete',
        'footer' => Html::a('Batal', '', ['class' => 'btn btn-danger', 'id' => 'delete-confirm']),
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
                                window.location = 'batal?id='+id;
                            });
                        });
                    });"
    );
    ?>

</div>
