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
                <li class="active"><span>1.</span>Ваш заказ</li>
                <li><span>2.</span>Оформление заказа</li>
            </ul>
            <h3 class="shipping right">Бесплатная доставка при заказе от 2900 руб</h3>
        </div>
        <div class="b-order">
            <div class="table">
                    <div class="tr clearfix">
                        <div class="th left">Наименование</div>
                        <div class="th left">Количество</div>
                        <div class="th left">Цена</div>
                    </div>
                    <div class="tr clearfix" style="min-height: 113px;">
                        <div class="td left">
                            <h2><?=Order::model()->types[$order->type]?></h2>
                            <div class="clearfix">
                                <!-- <a class="left" href="#">Посмотреть подробнее</a> -->
                            </div>
                        </div>
                        <div class="td left">
                            <div class="b-arrow"><?=$this->declOfNum($order->day,array("день","дня","дней"));?></div>
                        </div>
                        <div class="td left">
                            <h4><?=$price?> руб.</h4>
                            <!-- <h5>Экономия 450 руб.</h5> -->
                            <!-- <h6>Цифра экономии меняется в зависимости от количества дней</h6> -->
                        </div>
                    </div>
            </div>
            <h4>Введите промокод</h4>
            <div class="clearfix">
                <form action="<?=$this->createUrl('/land/order')?>" method="POST" id="promocode-form">
                <input class="left" type="text" name="promocode">
                <!-- <button type="button" class="b-orange-butt left">готово</button> -->
                </form>
            </div>
            <div class="clearfix">
                <b class="left">%</b>
                <a class="sale left fancy" href="#" data-block="#b-popup-code">Получить промокод на скидку</a>
            </div>
        </div>
        <div class="clearfix">
            <a href="#" onclick="$('#promocode-form').submit(); return false;" class="right b-orange-butt b-order-butt">оформить заказ</a>
        </div>
    </div>
    <div class="b-question">
        <h3>Возник вопрос?</h3>
        <h4>Звоните - с удовольствием поможем!</h4>
        <h5>+7 495 12 345 67</h5>
        <a class="fancy" href="#" data-block="#b-popup-callback">Заказать звонок</a>
    </div>
</div>