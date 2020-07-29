<?php

use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Mmessagetempales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmessagetemplate-create">
	
	<?=html::encode($this->title)?>

	<?=$this->render('_form', [
		'model' => $model,
		]) ?>
</div>