<div class="b b-1 b-basket">
    <?php $this->renderPartial('header', array() ); ?>
    <div class="b-block cabinet-cont">
        <h3>Здравствуйте, <? if($model->usr_name) echo $model->usr_name; else echo "дорогой клиент" ?>!</h3>
        <div class="clearfix">
            <ul class="left">
               <li><a href="<?=$this->createUrl('/land/orderhistory')?>">История заказов</a></li>
               <li class="active"><a href="#" onclick="return false;">Профиль</a></li>
               <li><a href="<?=$this->createUrl('/land/changepassword')?>">Смена пароля</a></li>
            </ul>
            <div class="left inputs-cont">
                <h4>Профиль:</h4>
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'faculties-form',
                    'enableAjaxValidation'=>false,
                )); ?>

                <?php echo $form->errorSummary($model); ?>
                <div class="inputs clearfix">
                    <div class="left">
                            <?php echo $form->textField($model,'usr_surname',array('maxlength'=>255,'placeholder' => 'Фамилия')); ?>
                            <?php echo $form->error($model,'surname'); ?>

                            <?php echo $form->textField($model,'usr_name',array('maxlength'=>255, 'placeholder' => 'Имя')); ?>
                            <?php echo $form->error($model,'usr_name'); ?>

                            <?php echo $form->textField($model,'usr_middle',array('maxlength'=>255,'placeholder' => 'Отчество')); ?>
                            <?php echo $form->error($model,'usr_middle'); ?>
                            
                            <?php echo $form->textArea($model,'usr_address',array('maxlength'=>255,'placeholder' => 'Адрес')); ?>
                            <?php echo $form->error($model,'usr_address'); ?>

                    </div>
                    <div class="right">
                        <?php echo $form->textField($model,'usr_login',array('class' => 'phone','maxlength'=>255,'required'=>true,'placeholder' => 'Телефон', 'disabled' => true)); ?>
                        <?php echo $form->error($model,'usr_login'); ?>

                        <?php echo $form->emailField($model,'usr_email',array('maxlength'=>255,'required'=>true,'placeholder' => 'E-mail')); ?>
                        <?php echo $form->error($model,'usr_email'); ?>
                    </div>
                </div>  
                <div class="clearfix">
                    <button type="submit" class="left b-orange-butt cabinet-butt">Сохранить</button>
                </div>
                <?php $this->endWidget(); ?>
            </div>       
        </div>
    </div>
</div>