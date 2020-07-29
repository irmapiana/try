<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Mschema;
use app\models\Tfront;
use app\models\Morg;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MorgSearch */
/* @var $dataProvider yii\data\activeDataProvider */

$this->title = 'Organisasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="morg-index">
<?php //echo uran1980\yii\widgets\pace\Pace::widget(); ?>
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php activeForm::end(); ?>
        <section class="morg-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Tambah Organisasi', ['create'], ['class="morg-index"'],['class' => 'btn btn-success btn-create']) ?>
         </p>
         </section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',],

            'ORGID',
            'ORGNAME',
            [
                'attribute'=>'ISDEALER',
                'value'=> 'isDealerLabel',
                'contentOptions' => ['style' => 'width:50px;text-align: center;'],
                'filter' => [1 => 'Y', 0 => 'N'],
            ],

            'PARENT_ORGID',

            [
                'attribute'=>'CHECKLIMIT',

                'filter' => ['Y' => 'Y', 'N' => 'N'],
            ],
            // 'ISOBIT',
            // 'ISOVALUE',
            // 'ADDRESS',
            // 'PIC',
            // 'EMAIL:email',
            // 'TLP',
            // 'BALANCE',
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',
            // 'ITEXT',
            // 'PRINT',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}&nbsp&nbsp&nbsp&nbsp{delete}',
            'buttons' => [
                    'delete' => function ($url, $model) {
                        $dataSchema = Mschema::find()->where('ORGID = :id',[':id' => $model->ORGID])->one();
                        $dataFront = Tfront::find()->where('ORGID = :id',[':id' => $model->ORGID])->one();
                        $dataOrg = Morg::find()->where('PARENT_ORGID = :id',['id' => $model->ORGID])->one();

                        if($dataOrg == null){
                            if($dataSchema == null && $dataFront == null){
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data' => [
                                        'confirm' => Yii::$app->params['deleteConfirm'],
                                        'method' => 'post',
                                    ]
                                ]);
                            }
                        }

                    },
                ]
            ]
        ],
    ]); ?>
</div>
