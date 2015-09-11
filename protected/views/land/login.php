<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="b-popup-form">
	    <label for="phone-login">Введите Ваш телефон:</label>
	    <?php echo $form->textField($model,'username', array("id" => 'phone-login', 'class' => 'write','maxlength'=>255,'required'=>true)); ?>
	    <label for="password-login">Ваш пароль:</label>
	    <?php echo $form->textField($model,'username', array("id" => 'phone-login', 'class' => 'write','maxlength'=>255,'required'=>true)); ?>
	    <?php echo $form->passwordField($model,'password',array("id" => 'password-login', 'class' => 'pass','maxlength'=>255,'required'=>true)); ?>
		<?php echo $form->error($model,'username'); ?>
		<?php echo $form->error($model,'password'); ?>
		<?php echo CHtml::submitButton('Войти',array('class' => 'ajax b-orange-butt rounded sys')); ?>
	</div>

<?php $this->endWidget(); ?>