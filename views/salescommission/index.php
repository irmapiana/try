<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsalescommissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Komisi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msalescommission-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="msalescommission-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Tambah Harga Item', ['create'], ['class="msalescommission-index"'],['class' => 'btn btn-success btn-create-filter']) ?>

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
                    if(isset(Yii::$app->request->queryParams['MsalescommissionSearch']['spriceid'])){
                   echo Html::a('Tambah Komisi Penjualan', ['create','id' => Yii::$app->request->queryParams['MsalescommissionSearch']['spriceid']], ['class' => 'btn btn-success btn-create']);
                    }
                }
            }
            else
            {

            }
        ?>
    </div>

    <?php ActiveForm::end(); ?>
    </p>
</section>
    <div id="musrenbang" style="overflow: auto;overflow-y: auto;overflow-x: visible;">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'SCOMMISSIONID',
            [
                'header' => 'KODE HARGA',
                'attribute' => 'harga.SPRICE_NAME',
                'contentOptions' => ['style' => 'width:100px;text-align: left;'],
            ],
            'productid',
            'itemid',
            [
                'attribute' => 'SCOMMISSION_0',
                'format'=>'raw',
                'value' => function ($data) {
                        return '<div align="right">'.number_format($data->SCOMMISSION_0, 0, ',', '.').'</div>';
                },     
            ],
            [
                'attribute' => 'SCOMMISSION_1',
                'format'=>'raw',
                'value' => function ($data) {
                        return '<div align="right">'.number_format($data->SCOMMISSION_1, 0, ',', '.').'</div>';
                },     
            ],
            [
                'attribute' => 'SCOMMISSION_2',
                'format'=>'raw',
                'value' => function ($data) {
                        return '<div align="right">'.number_format($data->SCOMMISSION_2, 0, ',', '.').'</div>';
                },     
            ],
            [
                'attribute' => 'SCOMMISSION_VALIDFROM',
                'format' => ['date', 'php:d-m-Y']
            ],  
            [
                'attribute' => 'SCOMMISSION_VALIDUNTIL',
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
</div>
<?php
$script = <<< JS
$(document).ready(function(){
    $(document).ready(function() {
        $('#msalescommissionsearch-spriceid').on('change', function() {
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