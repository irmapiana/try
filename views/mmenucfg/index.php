<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MMenucfgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<P style="font-size: 30px; margin-top: -20px; margin-bottom: 40px;">MENU</P>      

<div class="mmenucfg-index" style="margin-top: 40px">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Generate Menu', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'menucode',
            'menuname',
            'menutitle',
            'menulink',
          //  'MENUICON',
           //  'MENUPARENT',
            // 'MENUORDER',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'filter' => array(1 => "Y", 0 => "N"),
                'options' => [
                    'width' => '80px',
                ],
                'value' => function ($data) {
                    if ($data->status == 1)
                        return "Y";
                    else
                        return "N";
                }
            ],
             //'cdate',
             //'cby',
             //'mdate',
            // 'mby',

            [
                    'class' => 'yii\grid\ActionColumn',
                'template' => '{update}&nbsp&nbsp&nbsp&nbsp{delete}',
            ],
        ],
    ]); ?>
</div>
