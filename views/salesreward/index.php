<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsalesrewardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reward';
$this->params['breadcrumbs'][] = $this->title;
?>
 <p style="font-size: 20px; font-style: bold;">REWARD</p>
 <div class="msalesreward-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>    

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
                    
                    // die;
                 //echo Html::submitButton('Tambah Harga Item', ['class' => 'btn btn-success btn-create']) ;
                    if(isset(Yii::$app->request->queryParams['MsalesrewardSearch']['spriceid'])){
                         echo Html::a('Tambah Reward', ['create','id' => Yii::$app->request->queryParams['MsalesrewardSearch']['spriceid']], ['class' => 'btn btn-success btn-create']);
                    }
                }
            }
        ?>
    </div>

    <?php ActiveForm::end(); ?>
    </p>
    <div id="musrenbang" style="overflow: auto;overflow-y: auto;overflow-x: visible;">
        <section class="btn btn-create-filter" style="align-content: right;">
    <?= Html::a('Tambah Reward', ['create'],['class' => 'btn btn-success']) ?>
</section>
<br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'SREWARDID',
            [
                'header' => 'KODE HARGA',
                'attribute' => 'harga.ppitem_price',
                'contentOptions' => ['style' => 'width:100px;text-align: left;'],
            ],
            'productid',
            'itemid',
            [
                'attribute' => 'reward_minimum',
                'format'=>'raw',
                'value' => function ($data) {
                        return '<div align="right">'.number_format($data->reward_minimum, 0, ',', '.').'</div>';
                },     
            ],
            [
                'attribute' => 'reward_maximum',
                'format'=>'raw',
                'value' => function ($data) {
                        return '<div align="right">'.number_format($data->reward_maximum, 0, ',', '.').'</div>';
                },     
            ],
            [
                'attribute' => 'rewarditem_validfrom',
                'format' => ['date', 'php:d-m-Y']
            ],  
            [
                'attribute' => 'rewarditem_validuntil',
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
        $('#msalesrewardsearch-spriceid').on('change', function() {
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