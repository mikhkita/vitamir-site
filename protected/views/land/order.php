<div class="b b-1 b-basket">
    <?php $this->renderPartial('header', array() ); ?>
    <div class="b-block basket-cont">
        <!-- <a class="back-link" href="#">Вернуться к выбору</a> -->
        <div class="navigate clearfix">
            <ul class="left clearfix">
                <li><span>1.</span>Ваш заказ</li>
                <li class="active"><span>2.</span>Оформление заказа</li>
            </ul>
            <h3 class="shipping right">Бесплатная доставка при заказе от 1750 руб</h3>
        </div>
        <form action="<?=$this->createUrl('/land/updateorder')?>" method="POST" id="b-order-form">
        <div class="b-sale">
        <? if(isset($user)): ?>
            <input class="left" type="hidden" id="phone-1" name="phone" value="<?=$user->usr_login?>"/>
            <? if($user->usr_name && $user->usr_email): ?>
                <input type="hidden" id="sale-name" class="write" name="name" placeholder="Иванов Иван" value="<?=$user->usr_name?>"/>
                <input type="hidden" id="sale-email" class="write" name="email" placeholder="" required value="<?=$user->usr_email?>"/>   
            <? elseif(!$user->usr_name): ?>
                    <div class="b-sale-block">
                        <h3 class="edit">Введите Ваши контактные данные:</h3>
                        <label for="sale-name">Введите Ваше имя:</label>
                        <input type="text" id="sale-name" class="write" name="name" placeholder="Иванов Иван" required/>   
                        <? if(!$user->usr_email): ?>
                            <label for="sale-email">Введите Ваш e-mail:</label>
                            <input type="text" id="sale-email" class="write" name="email" placeholder="" required/>
                        <? else: ?>  
                            <input type="hidden" id="sale-email" class="write" name="email" placeholder="" required value="<?=$user->usr_email?>"/>   
                        <? endif; ?>  
                    </div>
            <? else: ?> 
                <div class="b-sale-block">
                    <h3 class="edit">Введите Ваши контактные данные:</h3>
                    <input type="hidden" id="sale-name" class="write" name="name" placeholder="Иванов Иван" value="<?=$user->usr_name?>"/> 
                    <? if(!$user->usr_email): ?>
                        <label for="sale-email">Введите Ваш e-mail:</label>
                        <input type="text" id="sale-email" class="write" name="email" placeholder="" required/>
                    <? else: ?>  
                        <input type="hidden" id="sale-email" class="write" name="email" placeholder="" required value="<?=$user->usr_email?>"/>   
                    <? endif; ?>  
                </div>
            <? endif; ?> 
        <? else: ?>
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
                    <h3 style="display:none;" class="location">Введите адрес</h3>
                    <input style="display:none;" type="text" id="location" class="write" name="location" placeholder="Например, Проспект Мира, 101 с 1"  value="<? if(isset($user)) echo $user->usr_address; ?>"/> 
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
        <input type="hidden" name="price" value="<?=$price?>">
        </form>
        <div class="clearfix" style="text-align: right;">
            <div class="clearfix b-sum">
                <div class="left">
                    <h4>Стоимость доставки:</h4>
                    <h5>Сумма заказа:</h5>
                </div>
                <div class="right">
                    <h4><span id="delivery">0</span> руб.</h4>
                    <h5><span id="price"><?=$price?></span> руб.</h5>
                    
                </div>
                <button type="submit" class="right b-orange-butt b-order-butt" onclick="$('#b-order-form').submit();">оформить заказ</button>
            </div>
        </div>
    </div>
    <div class="b-question">
        <h3>Возник вопрос?</h3>
        <h4>Звоните - с удовольствием поможем!</h4>
        <h5>+7 (929) 509-99-85</h5>
        <a class="fancy" href="#" data-block="#b-popup-callback">Заказать звонок</a>
    </div>
</div>