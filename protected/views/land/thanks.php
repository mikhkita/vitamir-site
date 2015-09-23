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
    <div class="b-thanks-page">
        <? if($text == "success" || $text == "new user"):?>
            <h3>Спасибо! Ваш заказ успешно создан!</h3>
            <h4>Наши менеджеры свяжутся с Вами в течение 15 минут<br><? if($text == "new user") echo "Ваш пароль от аккаунта и промокод отправлены Вам по смс";?></h4>
            <a href="/">На главную</a>
        <? endif;?>
        <? if($text == "error"):?>
            <h3>Ошибка!</h3>
            <h4>Извините, но при создании заказа произошла ошибка, попробуйте переоформить заказ!</h4>
            <a href="<?=$this->createUrl('/land/order')?>">Переоформить заказ</a>
        <? endif;?>
        <? if($text == "errorPayment"):?>
            <h3>Ошибка!</h3>
            <h4>Ваш заказ создан, но оплата не прошла! Наши менеджеры свяжутся с Вами в течение 15 минут</h4>
            <a href="/">На главную</a>
        <? endif;?>
    </div>
    <div class="b-question">
        <h3>Возник вопрос?</h3>
        <h4>Звоните - с удовольствием поможем!</h4>
        <h5>+7 495 12 345 67</h5>
        <a class="fancy" href="#" data-block="#b-popup-callback">Заказать звонок</a>
    </div>
</div>