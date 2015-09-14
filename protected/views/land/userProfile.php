<div class="b b-1 b-basket">
    <div class="header">
        <div class="b-block clearfix">
            <a href="/" class="logo left">
                <!-- <h3>Клубы здорового питания в Москве</h3> -->
                <img src="<?php echo Yii::app()->request->baseUrl;?>/i/logo.png" width="175">
            </a>
            <ul class="left clearfix">
                <li class="left">
                    <a href="#">
                        <div class="pict"></div>
                        <div class="text">
                            <p>выбрать еду</p>
                        </div>
                    </a>
                </li>
                <li class="left">
                    <a href="#">
                        <div class="pict"></div>
                        <div class="text">
                            <p>100% здоровая пища</p>
                        </div>
                    </a>
                </li>
                <li class="left">
                    <a href="#">
                        <div class="pict"></div>
                        <div class="text">
                            <p>составить режим питания</p>
                        </div>
                    </a>
                </li>
                <li class="left">
                    <a href="#">
                        <div class="pict"></div>
                        <div class="text">
                            <p>доставка</p>
                        </div>
                    </a>
                </li>
                <li class="left">
                    <a href="#">
                        <div class="pict"></div>
                        <div class="text">
                            <p>адреса клубов</p>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="back-call right">
                <h3>Есть вопрос?</h3>
                <h4>Звоните - поможем!</h4>
                <p><span>+7(499)</span>399-35-09</p>
            </div>
        </div>
    </div>
    <div class="b-block cabinet-cont">
        <h3>Здравствуйте, <?=$model->usr_name?>!</h3>
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

                            <?php echo $form->textField($model,'usr_name',array('maxlength'=>255,'required'=>true, 'placeholder' => 'Имя')); ?>
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