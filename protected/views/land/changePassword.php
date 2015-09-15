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
        <h3>Здравствуйте, <? if($model->usr_name) echo $model->usr_name; else echo "дорогой клиент" ?>!</h3>
        <div class="clearfix">
            <ul class="left">
               <li><a href="<?=$this->createUrl('/land/orderhistory')?>">История заказов</a></li>
               <li><a href="<?=$this->createUrl('/land/userprofile')?>">Профиль</a></li>
               <li class="active"><a href="#" onclick="return false;">Смена пароля</a></li>
            </ul>
            <div class="left inputs-cont">
                <h4>Профиль:</h4>
                <form action="<?=$this->createUrl('/land/changepassword')?>" id="change-password" method="POST">
                    <div class="inputs clearfix">
                        <div class="left">
                            <input type="password" name="old_password" maxlength="255" placeholder="Старый пароль" required>  
                            <input type="password" name="User[usr_password]" maxlength="255" placeholder="Новый пароль" required> 
                            <input type="password" name="repeat_password" maxlength="255" placeholder="Подтвердите пароль" required> 
                        </div>
                    </div>  
                    <div class="clearfix">
                        <button type="submit" class="left b-orange-butt cabinet-butt">Сменить</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>