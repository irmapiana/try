<?php 

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mschemaprice;
use yii\helpers\ArrayHelper;

$this->title = 'Skema Price';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php //echo uran1980\yii\widgets\pace\Pace::widget(); ?>

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
   <P style="font-size: 30px; margin-top: -20px;">SCHEMA PRICE</P>  
<div class="Mschemaprice-index", style="margin-top: 40px">
    <section class="btn btn-create", style=" margin-top:90px;">
        
        <?= Html::a('Tambah Skema', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
    <div id="musrenbang" style="overflow: auto;overflow-y: auto;overflow-x: visible;">
        
   		<?= GridView::widget([
   			'dataProvider' => $dataProvider,
   			'filterModel'=> $searchModel,
   			'formatter' =>['class' => 'yii\i18n\Formatter', 'nullDisplay'=>""],
   			'columns' => [
   				['class' => 'yii\grid\SerialColumn'],

   				'spriceid',
   				'sch_updated',
   				'active',
   				'schedule_rules',
   				'priority',
   				'cby',
   				'cdate',

   				['class' => 'yii\grid\ActionColumn',
          'header' => 'ACTIONS',
          'template' => '{update}&nbsp&nbsp&nbsp&nbsp{delete}',
          'buttons' => [
            'delete' => function ($url,$model) {
              return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,[
                'title' => Yii::t('app','Delete'),
                'data' => [
                  'confirm' => Yii::$app->params['deleteConfirm'],
                  'method' => 'post',
                ]
              ]);
            }
          ]
        ],
   				],
   				]);?>
   </div>