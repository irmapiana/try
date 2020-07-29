<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mmconfig;
use yii\helpers\ArrayHelper;

$this->title = 'Config';
$this->params['breadcrumbs'][] = $this->title;

?>

<p style="font-size: 30px; margin-top: -20px;">CONFIG</p>

<div class="mmconfig-index", style="margin-top:40px;">
    
    <section class="btn btn-create", style="margin-top: 90px;">
        
<?= Html::a('Tambah Config', ['create'], ['class' => 'btn btn-success']) ?>

    </section>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'identifier',
            'url_mode',
            'active',
            'value',
            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'template' => '{update} &nbsp; &nbsp; {delete}',
            'buttons' => [
                'delete' => function ($url, $model){
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,[
                        'title' => Yii::t('app','Delete'),
                        'data' => [
                            'confirm' => Yii::$app->params['deleteConfirm'],
                            'method' => 'post',
                        ]
                    ]);
                }
            ]
        ]
        ],
    ]);
    ?>
</div>