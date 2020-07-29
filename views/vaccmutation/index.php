<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mbankaccount;
use yii\helpers\ArrayHelper;
use app\models\Mmutationtype;
use \app\models\Mmutationstatuscode;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Akun';
$this->params['breadcrumbs'][] = $this->title;
?>
<P style="font-size: 30px; margin-top: -20px;">Mutasi</P>
    
<div class="vaccmutation-index", style="margin-top: 40px;">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah Mutasi', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
    <?= $this->render('_search', ['model' => $searchModel]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'reward_mutationid',
            'mdate',
            'userid',
            [
                'attribute' => 'mtype',
                'value' => 'mutationtype.mtype',
                'filter' => Html::activeDropDownList($searchModel, 'mtype', ArrayHelper::map(Mmutationtype::find()->orderBy(['mtype' => SORT_ASC])->asArray()->all(), 'mtype', 'mtype'), ['class' => 'form-control', 'prompt' => 'Semua Tipe']),
            ],
        //'cby' ,
        //'cdate',
        //'mby' ,
        // 'SCHEMAID',
        //'sch_updatedD',
        //'ENDBALANCE', 
        // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
