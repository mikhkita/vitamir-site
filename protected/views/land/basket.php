<div class="b b-1 b-basket">
    <?php $this->renderPartial('header', array() ); ?>
    <div class="b-block basket-cont">
        <!-- <a class="back-link" href="#">Вернуться к выбору</a> -->
        <div class="navigate clearfix">
            <ul class="left clearfix">
                <li class="active"><span>1.</span>Ваш заказ</li>
                <li><span>2.</span>Оформление заказа</li>
            </ul>
            <h3 class="shipping right">Бесплатная доставка при заказе от 1750 руб</h3>
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
                            <h4><span id="price-calc"><?=$price?></span> руб.</h4>

                            <? if($discount): ?>
                                <h5 >Экономия <span id="discount-calc"><?=$discount?></span> руб.</h5>
                                <h6>Цифра экономии меняется в зависимости от количества дней</h6>
                            <? endif; ?>
                        </div>
                    </div>
            </div>
            <? $user = (!Yii::app()->user->isGuest) ? User::model()->findByPk(Yii::app()->user->id) : false; if(!$user || $user->usr_promo!="use"): ?>
                <h4>Введите промокод</h4>
                <div class="clearfix">
                    <form action="<?=$this->createUrl('/land/setpromo')?>" method="POST" id="promocode-form">
                        <input class="left" type="text" name="promocode" minlength="4" maxlength="4" required>
                        <button type="submit" class="b-orange-butt left">готово</button>
                    </form>
                </div>
                <div class="clearfix">
                    <b class="left">%</b>
                    <a class="sale left fancy" href="#" data-block="#b-popup-code">Получить промокод на скидку</a>
                </div>
            <? endif;?>
        </div>
        <div class="clearfix">
            <form action="<?=$this->createUrl('/land/order')?>" method="POST" id="basket-form">
                <? if($discount): ?>
                    <input type="hidden" name="price" id="price-basket" value="<?=($order->price-$discount)?>">
                    <input type="hidden" id="discount-basket" name="discount" value="<?=$discount?>">
                <? else: ?>
                    <input type="hidden" name="price" id="price-basket" value="<?=$order->price?>">
                <? endif;?>
                <a href="#" onclick="$('#basket-form').submit(); return false;" class="right b-orange-butt b-order-butt">оформить заказ</a>
            </form>
        </div>
    </div>
    <div class="b-question">
        <h3>Возник вопрос?</h3>
        <h4>Звоните - с удовольствием поможем!</h4>
        <h5>+7 (929) 509-99-85</h5>
        <a class="fancy" href="#" data-block="#b-popup-callback">Заказать звонок</a>
    </div>
</div>