<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Morg;
use app\components\PTotal;

$this->title = 'Saldo Agen/Dealer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?php $form = ActiveForm::begin([
    'action' => ['searchresults'],
    'method' => 'get',
    'id' => 'searchForm'
]); 
 echo $form->field($model, 'orgid')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Morg::find()->all(), 'ORGID', 'concat'),
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
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'AKUN',
                'attribute' => 'ORGID',
            ],
            [
                'label' => 'NAMA',
                'attribute' => 'ORGNAME',
            ],
            [
                'label' => 'ALAMAT',
                'attribute' => 'ADDRESS',
            ],
            [
                'label' => 'NAMA',
                'attribute' => 'EMAIL',
            ],
            [
                'label' => 'SALDO',
                'attribute' => 'BALANCE',
                'contentOptions' => ['style' => 'text-align: right; font-weight: bold; '],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['BALANCE']);
                },
                'format'=>'raw',
            ],

        ],
    ]); ?>
</div>
