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
    <div class="b-block basket-cont">
        <!-- <a class="back-link" href="#">Вернуться к выбору</a> -->
        <div class="navigate clearfix">
            <ul class="left clearfix">
                <li><span>1.</span>Ваш заказ</li>
                <li class="active"><span>2.</span>Оформление заказа</li>
            </ul>
            <h3 class="shipping right">Бесплатная доставка при заказе от 2900 руб</h3>
        </div>
        <form action="<?=$this->createUrl('/land/updateorder')?>" method="POST" id="b-order-form">
        <div class="b-sale">
        <? if(isset($user)): ?>
            <input class="left" type="hidden" id="phone-1" name="phone" value="<?=$user->usr_login?>"/>
        <? endif; ?> 
        <? if(isset($promocode)): ?>
            <input type="hidden" name="promocode" value="<?=$promocode?>"/>
        <? endif; ?>
        <? if(isset($user) && $user->usr_email && $user->usr_name): ?>
            <input type="hidden" id="sale-name" class="write" name="name" placeholder="Иванов Иван" value="<?=$user->usr_name?>"/>
            <input type="hidden" id="sale-email" class="write" name="email" placeholder="" value="<?=$user->usr_email?>"/>
        <? elseif(isset($user) && !$user->usr_name): ?>
            <div class="b-sale-block">
                <h3 class="edit">Введите Ваши контактные данные:</h3>
                <label for="sale-name">Введите Ваше имя:</label>
                <input type="text" id="sale-name" class="write" name="name" placeholder="Иванов Иван" required/>
                <? if(!$user->usr_email): ?>
                    <label for="sale-email">Введите Ваш e-mail:</label>
                    <input type="text" id="sale-email" class="write" name="email" placeholder="" required/>
                <? endif; ?>   
            </div>
        <? elseif(!isset($user)): ?>
            <div class="b-sale-block">
                <h3 class="edit">Введите Ваши контактные данные:</h3>
                <label for="sale-name">Введите Ваше имя:</label>
                <input type="text" id="sale-name" class="write" name="name" placeholder="Иванов Иван" required/>
                <label for="phone-1">Введите Ваш телефон:</label>
                <div class="clearfix phone-cont">
                    <div class="left phone-img"></div>
                    <input class="left" type="text" id="phone-1" name="phone" placeholder="+7 (___) ___-__-__" required/>
                </div>
                <label for="sale-email">Введите Ваш e-mail:</label>
                <input type="text" id="sale-email" class="write" name="email" placeholder="" required/>
            </div>
        <? endif; ?>       
            <div class="b-sale-block clearfix">
                <div class="left">
                    <h3 class="delivery">Доставка</h3>
                    <div class="radio">
                        <input id="sale-himself" type="radio" name="delivery" checked value="1">
                        <label for="sale-himself">Самовывоз <span>(Проспект Вернардского, д5 )</span></label>
                        <input id="sale-courier" type="radio" name="delivery" value="2">
                        <label for="sale-courier">Курьерская доставка до дома или офиса</label>
                    </div>
                    <h3 class="location">Введите адрес</h3>
                    <? if(isset($user)): ?>
                       <input type="text" id="location" class="write" name="location" placeholder="Например, Проспект Мира, 101 с 1"  value="<?=$user->usr_address?>" required/> 
                    <? else: ?>
                        <input type="text" id="location" class="write" name="location" placeholder="Например, Проспект Мира, 101 с 1" required/>
                    <? endif; ?>
                </div>
                <div class="right">
                    <h3 class="payment">Оплата</h3>
                    <div class="radio">
                        <input id="sale-pay-courier" type="radio" name="payment" checked value="1">
                        <label for="sale-pay-courier">Наличными курьеру</label>
                        <input id="sale-pay-bank" type="radio" name="payment" value="2">
                        <label for="sale-pay-bank">Банковской картой/Электронными деньгами</label>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="clearfix" style="text-align: right;">
            <div class="clearfix b-sum">
                <div class="left">
                    <h4>Стоимость доставки:</h4>
                    <h5>Сумма заказа:</h5>
                </div>
                <div class="right">
                    <h4><span>0</span> руб.</h4>
                    <h5><span><?=$price?></span> руб.</h5>
                </div>
                <button type="submit" class="right b-orange-butt b-order-butt" onclick="$('#b-order-form').submit();">оформить заказ</button>
            </div>
        </div>
    </div>
    <div class="b-question">
        <h3>Возник вопрос?</h3>
        <h4>Звоните - с удовольствием поможем!</h4>
        <h5>+7 495 12 345 67</h5>
        <a class="fancy" href="#" data-block="#b-popup-callback">Заказать звонок</a>
    </div>
</div>