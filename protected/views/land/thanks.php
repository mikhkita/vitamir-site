<div class="b b-1 b-basket">
    <?php $this->renderPartial('header', array() ); ?>
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

        <p><span></p>
        <h5>+7 (929) 509-99-85</h5>
        <a class="fancy" href="#" data-block="#b-popup-callback">Заказать звонок</a>
    </div>
</div>