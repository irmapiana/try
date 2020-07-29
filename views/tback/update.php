<?php 

use yii\helpers\Html;

$this->title = 'Ubah Transaksi Provider : ' . $model->back_trxid;
$this->params['breadcrumbs'][] = ['label' => 'Tbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->back_trxid, 'url' => ['view', 'id' => $model->back_trxid]];
$this->params['breadcrumbs'][] = 'Update';

?>

<div class="tback-update">
	<?= $this->render('_form', [
		'model' => $model,
		]) ?>
</div>