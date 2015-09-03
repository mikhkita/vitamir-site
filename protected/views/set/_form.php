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
		<div class="row row-select">
			<div class="dish-list clearfix"></div>
			<label>Утро</label>
			<?php $daytime = 1; $model=Dish::model()->find("daytime_id=".$daytime); echo CHtml::textField("Set[morning]",$model->id, array('class'=>'dish-select autocomplete','required'=>'required','data-label'=>( $model )?$model->name:'Выбрать блюдо','data-values'=>$this->getDishes($daytime) )); ?>
			<input type="button" class="dish-btn" value="Добавить">	
		</div>

		<div class="row row-select">
			<div class="dish-list clearfix"></div>
			<label>Утро</label>
			<?php $daytime = 2; $model=Dish::model()->find("daytime_id=".$daytime); echo CHtml::textField("Set[day]",$model->id, array('class'=>'dish-select autocomplete','required'=>'required','data-label'=>( $model )?$model->name:'Выбрать блюдо','data-values'=>$this->getDishes($daytime) )); ?>
			<input type="button" class="dish-btn" value="Добавить">	
		</div>

		<div class="row row-select last">
			<div class="dish-list clearfix"></div>
			<label>Утро</label>
			<?php $daytime = 3; $model=Dish::model()->find("daytime_id=".$daytime); echo CHtml::textField("Set[night]",$model->id, array('class'=>'dish-select autocomplete','required'=>'required','data-label'=>( $model )?$model->name:'Выбрать блюдо','data-values'=>$this->getDishes($daytime) )); ?>
			<input type="button" class="dish-btn" value="Добавить">	
		</div>

		
	</div>

	<!-- <div class="row double-list clearfix">
        <div class="left">
            <label for="">Все атрибуты</label>
            <ul id="sortable1" class="sortable connectedSortable">
                <? foreach ($allAttr as $key => $value): ?>
                <li class="ui-state-default" data-id="<?=$value?>"><p><?=$value?></p><input type="hidden" name="dishes[<?=$key?>]" value="<?=$value?>"></li>
                <? endforeach; ?>
            </ul>
        </div>
        <div class="left">
            <label for="">Атрибуты этого <?=$this->adminMenu["cur"]->rod_name?><?=( ( isset($_GET["name"]) )?(" \"".$_GET["name"]."\""):("") )?></label>
            <ul id="sortable2" class="sortable connectedSortable">
				<? foreach ($attr as $key => $value): ?>
                <li class="ui-state-default" data-id="<?=$value?>"><p><?=$value?></p><input type="hidden" name="dishes[<?=$key?>]" value="<?=$value?>"><span></span></li>
                <? endforeach; ?>
            </ul>
        </div>
    </div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
		<input type="button" onclick="$.fancybox.close(); return false;" value="Отменить">
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->