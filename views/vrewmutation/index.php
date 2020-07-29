<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mmutationtype;
use yii\helpers\ArrayHelper;
use app\components\PTotal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VrewmutationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Poin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vrewmutation-index">
    <section class="btn btn-create", style="margin-top: 60px;">
        <?php echo Html::a('Tambah Poin', ['/trewmutation/create'], ['class' => 'btn btn-success']) ?>
    </section>
    <h1><?php Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MUTATIONID',
            'cdate',
            'userid',
                [
                'attribute' => 'mtype',
                'value' => 'mutationtype.mtype',
                'filter' => Html::activeDropDownList($searchModel, 'mtype', ArrayHelper::map(Mmutationtype::find()->orderBy(['mtype' => SORT_ASC])->asArray()->all(), 'mtype', 'mtype'), ['class' => 'form-control', 'prompt' => 'Semua Tipe']),
            ],
            'remark',


            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
