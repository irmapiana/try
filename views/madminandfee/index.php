<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MspriceadminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin dan Fee';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="madminandfee-index">

     <section class="btn btn-create", style=" margin-top: 30px;">
        
        <?= Html::a('Tambah Admin & Fee', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
         <?php $form = ActiveForm::begin([
        'action' => ['create-new'],
        'method' => 'get',
    ]); ?>

        <?php echo Html::hiddenInput('spriceid', ''); ?>

    <div class="form-group">
    </div>
        <?php ActiveForm::end(); ?>
         </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'SPADMINID',
            'spriceid',
            'productid',
            'itemid',
            [
                'attribute' => 'ks_fee',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return number_format($data->ks_fee, 0, ',', '.');
                },
                'format'=>'raw',
            ],
            [
                'attribute' => 'admin',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return number_format($data->admin, 0, ',', '.');
                },
                'format'=>'raw',
            ],
            [
                'attribute' => 'fix_admin',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return number_format($data->fix_admin, 0, ',', '.');
                },
                'format'=>'raw',
            ],
            [
                'attribute' => 'merchant_fee',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return number_format($data->merchant_fee, 0, ',', '.');
                },
                'format'=>'raw',
            ],
            [
                'attribute' => 'fix_merchant_fee',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return number_format($data->fix_merchant_fee, 0, ',', '.');
                },
                'format'=>'raw',
            ],
            'valid_from',
            'valid_until',
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}&nbsp&nbsp;{delete}',
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
            ],
        ],
    ]); ?>
</div>
<?php
$script = <<< JS
$(document).ready(function(){
    $(document).ready(function() {
        $('#madminandsearch-spriceid').on('change', function() {
            var value = $(this).val();
            // alert(value);
            if (value != "") {
                $('.btn-create').hide();
            } else if (value == "") {
                $('.btn-create').hide();
            }
            $('input[name="spriceid"]').val(value);
        });
    });
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>