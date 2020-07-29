<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mschema */

$this->title = 'Update Schema: '. $model->spriceid;
$this->params['breadcrumbs'][] = ['label' => 'Mschemaprices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->spriceid, 'url' =>['view','spriceid' => $model->spriceid, 'sch_updated' => $model->sch_updated]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Mschemaprice-update">
	<!-- <h1><?= Html::encode($this->title) ?></h1> -->

	<?= $this->render('_form', [
		'model' => $model,
	])
?>
</div>