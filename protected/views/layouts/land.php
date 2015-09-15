<!DOCTYPE html>
<html>
<head>
    <title><?=$this->getParam("TITLE")?></title>
    <meta name="keywords" content='<?=$this->getParam("KEYWORDS")?>'>
    <meta name="description" content='<?=$this->getParam("DESCRIPTION")?>'>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/reset.css" type="text/css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/jquery.fancybox.css" type="text/css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/KitAnimate.css" type="text/css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/layout.css" type="text/css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">

    <meta name="viewport" content="width=1000">

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jssor.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jssor.slider.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/TweenMax.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/swipe.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/carousel.lite.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/css3-mediaqueries.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/KitProgress.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/KitAnimate.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/device.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/KitSend.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/KitModal.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/menu.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/main.js"></script>
    <?php foreach ($this->scripts AS $script): ?><script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/<?php echo $script?>.js"></script><? endforeach; ?>
</head>
<body>
    <ul class="ps-lines">
        <li class="v" style="margin-left:-586px"></li>
        <li class="v" style="margin-left:585px"></li>
        <li class="v" ></li>
    </ul>
    <div class="b b-0">
        <div class="b-block clearfix">
            <div class="cabinet right">
                <ul class="clearfix">
                    <? if(Yii::app()->user->isGuest): ?>
                        <li class="right">
                            <a class="fancy" href="#"  data-block="#b-popup-system"><p>Войти</p></a>
                        </li>
                        <li class="right">
                            <a class="fancy" href="#" data-block="#b-popup-registration"><p>Зарегистрироваться</p></a>
                        </li>
                    <? else: ?>
                        <li class="right">
                            <a href="<?=$this->createUrl('/site/logout')?>"><p>Выйти</p></a>
                        </li>
                        <li class="right">
                            <a href="<?=$this->createUrl('/land/orderhistory')?>"><p>Личный кабинет</p></a>
                        </li>
                    <? endif; ?>
                </ul>
            </div>
            <? if(!Yii::app()->user->isGuest): ?>
                <? $user = User::model()->findByPk(Yii::app()->user->id); if($user->usr_promo!="use"): ?>
                    <div class="percent right clearfix">
                        <a class="fancy right" href="#" data-block="#b-popup-code">Получить промокод на скидку</a>
                        <img class="right" src="<?php echo Yii::app()->request->baseUrl;?>/i/percent.png">
                    </div>
                <? endif; ?>   
            <? else: ?>
                <div class="percent right clearfix">
                    <a class="fancy right" href="#" data-block="#b-popup-code">Получить промокод на скидку</a>
                    <img class="right" src="<?php echo Yii::app()->request->baseUrl;?>/i/percent.png">
                </div>
            <? endif; ?>
        </div>
    </div>
    <div class="b-content">
        <?php echo $content;?>
    </div>
<div class="b b-10">
    <div class="b-block clearfix">
        <div class="left">
            <a href="#" class="logo left">
                <!-- <h3>Клубы здорового питания в Москве</h3> -->
                <img src="<?php echo Yii::app()->request->baseUrl;?>/i/logo.png" width="175">
            </a>
        </div>
        <div class="right question">
            <h3>Есть вопрос? Звоните - поможем!</h3>
            <div class="clearfix">
                <p class="right">+7 495 12 345 67</p>
                <img class="right" src="<?php echo Yii::app()->request->baseUrl;?>/i/tel-2.png">
            </div>
            <a class="fancy" href="#" data-block="#b-popup-callback">Заказать звонок</a>
        </div>
        <div class="right copyright">
            <p>Copyright © 1993-2015. Компания Здоровье. Все права защищены.</p>
        </div>
    </div>
</div>
<div id="b-popup-more" class="b-modal b-callback b-callback-1 b-form-cont b-from-top">
    <div class="b-popup menu">
        <span class="modal-close"></span>
        <h2><span class="green"><span id="more-day">Утро</span>:</span> <span id="more-name">Оладьи на пару с рисом </span><span id="more-weight"> (<span>250</span>г)</span></h2>
        <div class="more-cont clearfix">
            <img class="left" id="more-img" src="">
            <div class="right">
                <p id="more-desc">Оладьи из кабачков на пару получаются очень нежными и сочными. Для их приготовления лучше всего брать молодые кабачки. Цуккини здесь не подойдут, так как их мякоть более водянистая, и придется добавлять больше муки, чтобы оладьи не расползались.</p>
                <ul id="more-jbu" class="clearfix">
                    <li class="clearfix"><h5>Белки</h5><span>11</span></li>
                    <li class="clearfix"><h5>Жиры</h5><span>11</span></li>
                    <li class="clearfix"><h5>Углеводы</h5><span>11</span></li>
                    <li class="clearfix"><h5>Калории</h5><span>11</span></li>
                </ul>
                <h4>Цена: <span class="green"><span id="more-price">190</span> руб.</span></h4>
                <div class="clearfix">
                    <button class="right b-orange-butt rounded b-add-cart-detail" id="more-add-butt">Добавить на <span>утро</span></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="b-layout"></div>
<div style="display:none;">
    <div id="b-popup-question">
        <div class="b-popup">
            <h2>Задайте вопрос нашему менеджеру</h2>
            <h3>В форме ниже, и мы ответим на него в течение 40 минут</h3>
            <form action="kitsend.php" method="POST" id="b-form-3" data-block="#b-popup-2">
                <div class="b-popup-form">
                    <input type="hidden" name="subject" value="Вопрос менеджеру"/>
                    <label for="email-1">Введите Ваш e-mail:</label>
                    <input type="text" id="email-1" class="write" name="email" placeholder="Ivanov@mail.ru"required/>
                    <label for="question">Чем мы можем Вам помочь?</label>
                    <p><textarea id="question" name="1" required></textarea></p>
                    <input type="hidden" name="1-name" value="Вопрос" required/>
                    <input type="submit" class="ajax b-orange-butt rounded" value="Отправить запрос!">
                </div>
            </form>
            <p>Или позвоните нам по телефону<br>
            <b>+7 (495) 542-60-01</b></p>
        </div>
    </div>
    <div id="b-popup-callback">
        <div class="b-popup" >
            <h2>Заказать обратный звонок</h2>
            <h3>Оставьте Ваши данные, и наш менеджер свяжется с Вами в течение 10 минут</h3>
            <form action="kitsend.php" method="POST" id="b-form-6" data-block="#b-popup-2">
                <div class="b-popup-form">
                    <input type="hidden" name="subject" value="Обратный звонок"/>
                    <label for="email-4">Введите Ваше имя:</label>
                    <input type="text" id="email-4" class="write" name="email" placeholder="Иванов Иван"required/>
                    <input type="hidden" name="subject" placeholder="Ivanov@mail.ru"/>
                    <label for="phone-3">Введите Ваш телефон:</label>
                    <div class="clearfix">
                        <div class="left phone-img"></div>
                        <input class="left" type="text" id="phone-3" name="phone" placeholder="+7 (___) ___-__-__" required/>
                    </div>
                    <input type="submit" class="ajax b-orange-butt rounded sys" value="Заказать звонок">
                </div>
            </form>
            <p>Или позвоните нам по телефону<br>
            <b>+7 (495) 542-60-01</b></p>
        </div>
    </div>
    <div id="b-popup-programm">
    <div class="b-popup" >
            <h2>Получите персональную программу питания</h2>
            <h4>под Ваши цели и с учетом Ваших пожеланий</h4>
            <h3>Оставьте заявку, и наши специалисты перезвонят Вам в течение 10 минут</h3>
            <form action="kitsend.php" method="POST" id="b-form-7" data-block="#b-popup-2">
                <div class="b-popup-form">
                    <input type="hidden" name="subject" value="Персональная программа питания"/>
                    <label for="phone-4">Введите Ваш телефон:</label>
                    <div class="clearfix">
                        <div class="left phone-img"></div>
                        <input class="left" type="text" id="phone-4" name="phone" placeholder="+7 (___) ___-__-__" required/>
                    </div>
                    <input type="submit" class="ajax b-orange-butt rounded sys" value="получить программу питания">
                </div>
            </form>
            <p>Сегодня мы составили уже <span>&nbsp;17&nbsp;</span> программ<br>
        </div>
    </div>
    <div id="b-popup-code">
        <div class="b-popup">
            <h2>Получите промокод на <span>5%-ю</span> скидку прямо сейчас</h2>
            <h3>Введите телефон, и промокод автоматически будет выслан</h3>
            <form action="<?=$this->createUrl('/land/getpromo')?>" method="POST" id="get-promo">
                <div class="b-popup-form">
                    <input type="hidden" name="subject" value="Заявка на промокод"/>
                    <label for="phone-5">Введите Ваш телефон:</label>
                    <div class="clearfix">
                        <div class="left phone-img"></div>
                        <input class="left phone" type="text" id="phone-5" name="phone" required value=""/>
                    </div>
                    <input type="submit" class="b-orange-butt rounded sys" value="получить промокод">
                </div>
            </form>
        </div>
    </div>
    <div id="b-popup-menu">
        <div class="b-popup menu">
            <h2>Полное меню</h2>
            <h2 class="sub-title"><span class="green">100%</span> здоровое питание делает вас энергичнее!</h2>
            <div class="menu-cont clearfix">
                <div class="filter left">
                    <form action="<?=$this->createUrl('/land/fullmenu')?>" id="fullmenu">
                    <div class="filter-item">
                        <h5>Показывать:</h5>
                        <div class="b-inputs checkbox">
                            <div class="clearfix">
                                <input id="daytime-1" type="checkbox" checked name="daytime[]" value="1">
                                <label for="daytime-1">На утро</label>
                            </div>
                            <div class="clearfix">
                                <input id="daytime-2" type="checkbox" checked name="daytime[]" value="2">
                                <label for="daytime-2">На день</label>
                            </div>
                            <div class="clearfix">
                                <input id="daytime-3" type="checkbox" checked name="daytime[]" value="3">
                                <label for="daytime-3">На вечер</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <h5>Сортировать по:</h5>
                        <div class="b-inputs radio">
                            <!-- <div class="clearfix">
                                <input id="order-1" type="radio" name="order" value="1">
                                <label for="order-1">По популярности</label>
                            </div> -->
                            <div class="clearfix">
                                <input id="order-2" type="radio" name="order" value="2" checked>
                                <label for="order-2">По цене</label>
                            </div>
                            <div class="clearfix">
                                <input id="order-3" type="radio" name="order" value="3">
                                <label for="order-3">Товарам по акции</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <h5>Состав:</h5>
                        <div class="b-inputs checkbox">
                            <div class="clearfix">
                                <input id="type-1" type="checkbox" checked name="type[]" value="1">
                                <label for="type-1">Рыба и морепродукты</label>
                            </div>
                            <div class="clearfix">
                                <input id="type-2" type="checkbox" checked name="type[]" value="2">
                                <label for="type-2">Курица и мясо</label>
                            </div>
                            <div class="clearfix">
                                <input id="type-3" type="checkbox" checked name="type[]" value="3">
                                <label for="type-3">Вегетарианское</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="no-add" name="no-add">
                    </form>
                </div>
                <div class="right b-menu-items"></div>
            </div>
        </div>
    </div>
    <div id="b-popup-registration">
        <div class="b-popup" >
            <h2>Зарегистрируйтесь в системе</h2>
            <h3>В личном кабинете будут Ваши заказы и результаты тренировок</h3>
            <form action="<?=$this->createUrl('/land/getpromo')?>" method="POST" id="registration-form">
                <div class="b-popup-form">
                    <label for="phone-reg">Введите Ваш телефон:</label>
                    <input type="text" id="phone-reg" class="write phone" name="phone" required/>
                    <label for="password-reg">Придумайте пароль:</label>
                    <input type="text" id="password-reg" class="pass" name="password" required minlength="4"/>
                    <input type="submit" class="b-orange-butt rounded sys" value="зарегистрироваться">
                </div>
            </form>
        </div>
    </div>
    <div id="b-popup-system">
        <div class="b-popup" >
            <h2>Войдите в систему</h2>
            <h3>В личном кабинете будут Ваши заказы и результаты тренировок</h3>
            <form id="login-form" method="POST" action="<?=$this->createUrl('/site/login',array('partial'=>'1'))?>">
                <div class="b-popup-form">
                    <label for="phone-login">Введите Ваш телефон:</label>
                    <input type="text" id="phone-login" name="LoginForm[username]" class="phone write" required>
                    <label for="password-login">Ваш пароль:</label>
                    <input type="password" id="password-login" name="LoginForm[password]" class="pass" required minlength="4">
                    <input type="hidden" id="login-promo" name="login-promo">
                    <?php echo CHtml::submitButton('Войти',array('class' => 'b-orange-butt rounded sys')); ?>
                </div>
            </form>
        </div>
    </div> 
    <div id="b-popup-2">
        <div class="b-thanks b-popup">
            <h3>Спасибо!</h3>
            <h4>Ваша заявка успешно отправлена.<br/>Наш менеджер свяжется с Вами в течение часа.</h4>
            <input type="submit" class="b-orange-butt rounded sys" onclick="$.fancybox.close(); return false;" value="Закрыть">
        </div>
    </div>
    <div id="b-popup-error">
        <div class="b-thanks b-popup">
            <h3>Ошибка отправки!</h3>
            <h4>Приносим свои извинения. Пожалуйста, попробуйте отправить Вашу заявку позже.</h4>
            <input type="submit" class="b-orange-butt rounded sys" onclick="$.fancybox.close(); return false;" value="Закрыть">
        </div>
    </div>
    <li class="dish-item clearfix" data-dish-id="" data-img="" data-name="" data-m-1="" data-m-2="" data-m-3="" data-w-1="" data-w-2="" data-w-3="" data-weight="" data-fat="" data-pro="" data-car="" data-cal="" data-pri="" id="item-copy">
        <div class="left b-image" style=""></div>
        <div class="left">
            <h4></h4>
            <a href="#" class="b-more more-butt-main modal" data-block="#b-popup-more">Подробнее</a>
            <p class="more-desc hidden"></p>
        </div>
        <div class="del-cross"></div>
        <div class="right clearfix">
            <div class="left"><span>Кол-во:</span></div>
            <div class="right">
            <select name="count" id="">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            </div>
        </div>
        <input type="hidden" name="" value="">
    </li>
</div>
</body>
</html>