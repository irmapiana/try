<?php 

use yii\helpers\Html;

$this->title = 'Tambah Transaksi Provider';
$this->params['breadcrumbs'][] = ['label' => 'Tbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tback-create">
	
	<?= $this->render('_form', [
		'model' => $model,
		]) ?>
</div>