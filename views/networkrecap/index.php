<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\components\PTotal;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Morg;

$this->title = 'Rekap Transaksi Jaringan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?php $form = ActiveForm::begin([
    'action' => ['searchresults'],
    'method' => 'get',
    'id' => 'searchForm'
]); 
 echo $form->field($model, 'orgid')->widget(Select2::classname(), [
            'data' =>  Morg::getList(),
            'language' => 'id',
            'options' => ['placeholder' => 'Masukkan Kode Agen/Dealer..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label("Kode Agen/Dealer");
?>
    <div class="form-group">
        <?php echo Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
    </div>        
<?php ActiveForm::end(); ?>
    <?= GridView::widget([
        'showFooter'=>TRUE,
        'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;text-align: right;'],
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],
            [
                'label' => 'AGEN/DEALER',
                'attribute' => 'ORGID',
                'footer' => ''
            ],
            [
                'label' => 'PATH',
                'attribute' => 'PTH',
                'footer' => '',
            ],            [
                'label' => 'PRODUK',
                'attribute' => 'NAMAPRODUK',
                'footer' => '',
            ],
            [
                'label' => 'ITEM',
                'attribute' => 'ITEM',
                'footer' => 'TOTAL'
            ],
            [
                'label' => 'TRANSAKSI',
                'attribute' => 'TRANSAKSI',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    //return number_format($data['HARGA']);
                    return PTotal::formatRupiah($data['TRANSAKSI']);
                    
                },
                'footer'=>PTotal::pageTotal($dataProviderWithNoPaging->models,'TRANSAKSI',0),
            ],
            [
                'label' => 'HARGA',
                'attribute' => 'HARGA',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    //return number_format($data['HARGA']);
                    return PTotal::formatRupiah($data['HARGA']);
                    
                },
                'format'=>'raw',
                'footer'=>PTotal::pageTotal($dataProviderWithNoPaging->models,'HARGA',1),
            ],
            [
                'label' => 'ADMIN',
                'attribute' => 'ADMIN',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    //return number_format($data['ADMIN']);
                    return PTotal::formatRupiah($data['ADMIN']);
                },
                'format'=>'raw',
                'footer'=>PTotal::pageTotal($dataProviderWithNoPaging->models,'ADMIN',1),
            ],
        ],
    ]); ?>
</div>
