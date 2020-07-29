<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\MspriceitemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Harga Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpurchasepriceitem-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="mpurchasepriceitem-index", style="margin-left: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Tambah Harga Item', ['create','id' => Yii::$app->getRequest()->getQueryParam('spriceid')], ['class="mpurchasepriceitem-index"'],['class' => 'btn btn-success btn-create-filter']) ?>
    <?php $form = ActiveForm::begin([
        'action' => ['create-new'],
        'method' => 'get',
    ]); ?>

        <?php echo Html::hiddenInput('spriceid', ''); ?>

    <div class="form-group">
        <?php
            if($tampil)
            {   
                if(Yii::$app->request->queryParams != null)
                {
                 //echo Html::submitButton('Tambah Harga Item', ['class' => 'btn btn-success btn-create']) ;
                    if(isset(Yii::$app->request->queryParams['MspriceitemSearch']['spriceid']))
                    {
                          echo Html::a('Tambah Harga Item', ['create','id' => Yii::$app->request->queryParams['MspriceitemSearch']['spriceid']], ['class' => 'btn btn-success btn-create']);
                    }
                 
                }
            }
        ?>
    </div>

    <?php ActiveForm::end(); ?>
    </p>
</section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'KODE HARGA',
                'attribute' => 'harga.SPRICE_NAME',
            ],
            'productid',
            'itemid',
            [
                'attribute' => 'PPITEM_PRICE',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return number_format($data->SPITEM_PRICE, 0, ',', '.');
                },
                'format'=>'raw',
            ],
            [
                'attribute' => 'PPITEM_VALIDFROM',
                'format' => ['date', 'php:d-m-Y']
            ],  
            [
                'attribute' => 'SPIPEM_VALIDUNTIL',
                'format' => ['date', 'php:d-m-Y']
            ],
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}&nbsp&nbsp&nbsp&nbsp{delete}',
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

<?php
$script = <<< JS
$(document).ready(function(){
    $(document).ready(function() {
        $('#mspriceitemsearch-spriceid').on('change', function() {
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
