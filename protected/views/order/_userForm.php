<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'faculties-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'usr_login'); ?>
		<?php echo $form->textField($model,'usr_login',array('maxlength'=>255,'required'=>true)); ?>
		<?php echo $form->error($model,'usr_login'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usr_password'); ?>
		<?php echo $form->passwordField($model,'usr_password',array('size'=>60,'maxlength'=>128,'required'=>true)); ?>
		<?php echo $form->error($model,'usr_password'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usr_name'); ?>
		<?php echo $form->textField($model,'usr_name',array('maxlength'=>255,'required'=>true)); ?>
		<?php echo $form->error($model,'usr_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usr_surname'); ?>
		<?php echo $form->textField($model,'usr_surname',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'usr_surname'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usr_middle'); ?>
		<?php echo $form->textField($model,'usr_middle',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'usr_middle'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usr_email'); ?>
		<?php echo $form->textField($model,'usr_email',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'usr_email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usr_promo'); ?>
		<?php echo $form->textField($model,'usr_promo',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'usr_promo'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usr_discount'); ?>
		<?php echo $form->textField($model,'usr_discount',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'usr_discount'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usr_pers_discount'); ?>
		<?php echo $form->textField($model,'usr_pers_discount',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'usr_pers_discount'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usr_address'); ?>
		<?php echo $form->textField($model,'usr_address',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'usr_address'); ?>
	</div>
	<?php if( Yii::app()->user->checkAccess('createUser') ):?>
		<div class="row">
			<?php echo $form->labelEx($model,'usr_rol_id'); ?>
			<?php echo $form->dropDownList($model, 'usr_rol_id', CHtml::listData(Role::model()->findAll(), 'id', 'name')); ?>
			<?php echo $form->error($model,'usr_rol_id'); ?>
		</div>
	<?endif;?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
		<input type="button" onclick="$.fancybox.close(); return false;" value="Отменить">
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->