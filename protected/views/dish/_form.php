<div class="form b-full-width">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'faculties-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="b-section">
		<div class="row">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('maxlength'=>255,'required'=>true)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>

		<div class="clearfix">
			<div class="row mt b-car-image row-half">
				<?php echo $form->labelEx($model,'image'); ?>
				<div class="b-image-cancel">Отменить удаление</div>
				<div class="b-image-cont">
					<div data-path="<? echo Yii::app()->createUrl('/uploader/getForm',array('maxFiles'=>1,'extensions'=>'*', 'title' => 'Загрузка изображения автомобиля', 'selector' => '.b-car-image .b-input-image', 'tmpPath' => Yii::app()->params['tempFolder']) ); ?>" class="b-input-image-add b-get-image<? if( $model->image != "" ) echo " hidden"; ?>" title="Добавить изображение"></div>
					<div class="b-image-wrap<? if( $model->image == "" ) echo " hidden"; ?>">
						<div class="b-input-image-img" data-base="<? echo Yii::app()->request->baseUrl; ?>" style="background-image: url('<? echo (Yii::app()->request->baseUrl)."/".($model->image); ?>');"></div>
						<?php echo $form->textField($model,'image',array('class'=>'b-input-image')); ?>
						<?php echo $form->error($model,'image'); ?>
						<div class="b-image-controls clearfix">
							<div class="b-image-nav b-image-edit b-get-image" title="Изменить изображение"></div>
							<div class="b-image-nav b-image-delete" title="Удалить изображение"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt row-half">
				<?php echo $form->labelEx($model,'description'); ?>
				<?php echo $form->textArea($model,'description',array('maxlength'=>20000,'required'=>true,'style'=>'height: 130px;')); ?>
				<?php echo $form->error($model,'description'); ?>
			</div>
		</div>

		<div class="clearfix">
			<div class="row mt row-half">
				<?php echo $form->labelEx($model,'calories'); ?>
				<?php echo $form->textField($model,'calories',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'calories'); ?>
			</div>
			<div class="row mt row-half">
				<?php echo $form->labelEx($model,'price'); ?>
				<?php echo $form->textField($model,'price',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'price'); ?>
			</div>
		</div>

		<div class="clearfix">
			<div class="row mt row-half">
				<?php echo $form->labelEx($model,'daytime_id'); ?>
				<?php echo $form->dropDownList($model, 'daytime_id', CHtml::listData(Daytime::model()->findAll(), 'id', 'name')); ?>
				<?php echo $form->error($model,'daytime_id'); ?>
			</div>
			<div class="row mt row-half">
				<?php echo $form->labelEx($model,'category_id'); ?>
				<?php echo $form->dropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll(), 'id', 'name')); ?>
				<?php echo $form->error($model,'category_id'); ?>
			</div>
		</div>
	</div>

	<div class="b-section">
		<h3>БЖУ</h3>
		<div class="clearfix">
			<div class="row row-third">
				<?php echo $form->labelEx($model,'protein'); ?>
				<?php echo $form->textField($model,'protein',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'protein'); ?>
			</div>
			<div class="row row-third">
				<?php echo $form->labelEx($model,'fat'); ?>
				<?php echo $form->textField($model,'fat',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'fat'); ?>
			</div>
			<div class="row row-third">
				<?php echo $form->labelEx($model,'carbohydrate'); ?>
				<?php echo $form->textField($model,'carbohydrate',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'carbohydrate'); ?>
			</div>
		</div>
	</div>

	<div class="b-section">
		<h3>Мужчине</h3>
		<div class="clearfix">
			<div class="row row-third">
				<?php echo $form->labelEx($model,'m_1'); ?>
				<?php echo $form->textField($model,'m_1',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'m_1'); ?>
			</div>
			<div class="row row-third">
				<?php echo $form->labelEx($model,'m_2'); ?>
				<?php echo $form->textField($model,'m_2',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'m_2'); ?>
			</div>
			<div class="row row-third">
				<?php echo $form->labelEx($model,'m_3'); ?>
				<?php echo $form->textField($model,'m_3',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'m_3'); ?>
			</div>
		</div>
	</div>

	<div class="b-section">
		<h3>Женщине</h3>
		<div class="clearfix">
			<div class="row row-third">
				<?php echo $form->labelEx($model,'w_1'); ?>
				<?php echo $form->textField($model,'w_1',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'w_1'); ?>
			</div>
			<div class="row row-third">
				<?php echo $form->labelEx($model,'w_2'); ?>
				<?php echo $form->textField($model,'w_2',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'w_2'); ?>
			</div>
			<div class="row row-third">
				<?php echo $form->labelEx($model,'w_3'); ?>
				<?php echo $form->textField($model,'w_3',array('maxlength'=>255,'required'=>true,'class'=>'numeric')); ?>
				<?php echo $form->error($model,'w_3'); ?>
			</div>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
		<input type="button" onclick="$.fancybox.close(); return false;" value="Отменить">
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->