<?php

use yii\helpers\Html;

$this->title = 'Tambah Config';
$this->params['breadcrumbs'][] = ['label' => 'Mmconfigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="mmconfig-create">

<?= $this->render('_form', [
	'model' => $model,
	]) ?>

</div>