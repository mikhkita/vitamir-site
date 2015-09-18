<div class="b-popup order clearfix">
	<h1>Редактирование <?=$this->adminMenu["cur"]->rod_name?></h1>

	<?php $this->renderPartial('_form', array('days'=>$days,'model' => $model)); ?>
</div>