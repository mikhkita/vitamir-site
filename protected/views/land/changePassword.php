<div class="b b-1 b-basket">
    <?php $this->renderPartial('header', array() ); ?>
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
                            <input type="password" name="old_password" maxlength="255" minlength="4" maxlength="16" placeholder="Старый пароль" required>  
                            <input type="password" name="User[usr_password]" maxlength="255" minlength="4" maxlength="16" placeholder="Новый пароль" required> 
                            <input type="password" name="repeat_password" maxlength="255" minlength="4" maxlength="16" placeholder="Подтвердите пароль" required> 
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