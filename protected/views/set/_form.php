<div class="form b-full-width">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'faculties-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array("data-beforeAjax"=>"attributesAjax"),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="clearfix">
		<div class="row row-half">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('maxlength'=>255,'required'=>true)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>

		<div class="row row-half">
			<?php echo $form->labelEx($model,'sort'); ?>
			<?php echo $form->textField($model,'sort',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
			<?php echo $form->error($model,'sort'); ?>
		</div>
		<? foreach ($daytime as $time => $dish): ?>
			<? if ( $model=Dish::model()->find("daytime_id LIKE :match", array(":match" => "%$time%")) ): ?>
				<div class="row row-select">
					<label for="daytime-<?=$time?>"><?=$dish[0]?></label>
					<div class="dish-list clearfix">
						<? $i=0; foreach ($dish as $id => $value):  ?>
							<? if ($i): ?>
								<div><p><?=$value?></p><span></span><input type="hidden" name="dishes[<?=$time?>][<?=$id?>]"></div>
							<? endif; $i++; ?>
						<? endforeach; ?>
					</div>
					<?php echo CHtml::textField("daytime-".$time,$model->id, array('class'=>'dish-select autocomplete','required'=>'required','data-name'=> $time,'data-label'=>( $model )?$model->name:'Выбрать блюдо','data-values'=>$this->getDishes($time) )); ?>
					<input type="button" class="dish-btn" value="Добавить">	
				</div>
			<? endif; ?>
		<? endforeach; ?>
		
	</div>
	<div class="row buttons set">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
		<input type="button" onclick="$.fancybox.close(); return false;" value="Отменить">
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->