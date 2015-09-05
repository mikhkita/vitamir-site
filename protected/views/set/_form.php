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
		<? foreach ($daytime as $time): ?>
			<div class="row row-select">
				<div class="dish-list clearfix">
					<? if( is_array($time->dishSet)): ?>
						<? foreach ($time->dishSet as $value):  ?>
							<div><p><?=$value->dish->name?></p><span></span><input type="hidden" name="dishes[<?=$time->id?>][<?=$value->dish_id?>]"></div>
						<? endforeach; ?>
					<? endif; ?>
				</div>
				<label><?=$time->name?></label>
				<?php $model=Dish::model()->find("daytime_id LIKE :match", array(":match" => "%$time->id%")); echo CHtml::textField("daytime-".$time->id,$model->id, array('class'=>'dish-select autocomplete','required'=>'required','data-name'=> $time->id,'data-label'=>( $model )?$model->name:'Выбрать блюдо','data-values'=>$this->getDishes($time->id) )); ?>
				<input type="button" class="dish-btn" value="Добавить">	
			</div>
		<? endforeach; ?>
		
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
		<input type="button" onclick="$.fancybox.close(); return false;" value="Отменить">
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->