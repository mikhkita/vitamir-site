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
                    <li class="right">
                        <a class="fancy" href="#"  data-block="#b-popup-system"><p>Войти</p></a>
                    </li>
                    <li class="right">
                        <a class="fancy" href="#" data-block="#b-popup-registration"><p>Зарегистрироваться</p></a>
                    </li>
                </ul>
            </div>
            <div class="percent right clearfix">
                <a class="fancy right" href="#" data-block="#b-popup-code">Получить промокод на скидку</a>
                <img class="right" src="<?php echo Yii::app()->request->baseUrl;?>/i/percent.png">
            </div>
        </div>
    </div>
    <div class="b b-1">
        <div class="header">
            <div class="b-block clearfix">
                <a href="#" class="logo left">
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
        <div class="b-block">
            <h2>Индивидуальные наборы<br>здорового питания на весь день от 390 руб.<br>с доставкой по ЮЗАО</h2>
            <div class="title">
                <h3>Новый сервис для тех, кто занимается фигурой</h3>
                <img src="<?php echo Yii::app()->request->baseUrl;?>/i/arrow-1.png">
            </div>
            <div class="content clearfix">
                <div class="circle left">
                    
                </div>
                <div class="green-block right">
                    <h2>Получите персональную программу питания</h2>
                    <h3>Наши специалисты составят ее под <b>Ваши цели и особенности</b></h3>
                        <form method="POST" action="kitsend.php" id="b-form-1" data-block="#b-popup-2" class="clearfix">
                            <input type="hidden" name="subject" value="Заявка на персональную программу питания"/>
                            <label for="phone-1">Введите Ваш телефон:</label>
                            <div class="clearfix">
                                <div class="left phone-img"></div>
                                <input class="left" type="text" id="phone-1" name="phone" placeholder="+7 (___) ___-__-__" required/>
                            </div>
                            <button class="ajax b-orange-butt rectangle" type="submit">Получить программу питания!</button>     
                        </form>
                    <p>Сегодня мы составили уже <span>&nbsp;17 </span>&nbsp;программ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="b b-2">
        <div class="b-block">
            <div class="content clearfix">
                <div class="center clearfix">
                    <h2>Правильное питание + <span class="water">в<span class="h2O">.</span>да</span></h2>
                    <h3>Это 80% результата достижения Ваших целей</h3>
                    <img src="<?php echo Yii::app()->request->baseUrl;?>/i/central.png">
                </div>
                <div class="left-part left">
                    <div class="left-block grey-1">
                        <div class="inside">
                            <div class="clearfix">
                                <h3 class="right">Доступные цены от 90 руб. за обед</h3>
                                <div class="screen right"></div>
                            </div>
                            <p>Мы закупаем продукты по оптовым ценам. Поэтому даже с доставкой наш обед стоит примерно столько же, как если бы Вы готовили дома.</p>
                        </div>
                    </div>
                    <div class="left-block white">
                        <div class="inside">
                            <div class="clearfix">
                                <h3 class="right">Огромная экономия вашего времени</h3>
                                <div class="screen right"></div>
                            </div>
                            <p>До 4 часов в день мы тратим на закупку продуктов, готовку, мойку и уборку посуды. Это 2 месяца в год!</p>
                        </div>
                    </div>
                </div>
                <div class="right-part right">
                    <div class="left-block white clearfix">
                        <div class="inside left">
                            <div class="clearfix">
                                <h3 class="right">100% здоровье<br> и полезные блюда</h3>
                                <div class="screen right three"></div>
                            </div>
                            <p>Большинство продуктов готовится на пару. Никаких вредных соусов и добавок. Пищу мы доставляем день в день с Вашим заказом</p>
                        </div>
                    </div>
                    <div class="left-block clearfix">
                        <div class="inside left grey-2">
                            <div class="clearfix">
                                <h3 class="right">Соблюдайте режим питания</h3>
                                <div class="screen right four"></div>
                            </div>
                            <p>Вам легко соблюдать режим<br> питания, потому что у Вас всегда есть готовый комплект еды</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="b b-3">
        <div class="b-block">
            <h2>6-разовое питание</h2>
        </div>
        <div class="b-back">
            <div class="b-block b-calc-cont clearfix">
                <div class="b-filter left">
                    <div class="radio">
                        <input id="male-2" type="radio" name="sex-2" checked value="m">
                        <label for="male-2">Мужской</label>
                        <input id="female-2" type="radio" name="sex-2" value="w">
                        <label for="female-2">Женский</label>
                    </div>
                    <div class="b-toggle">
                        <input id="id-1" type="radio" name="for" checked value="1">
                        <label for="id-1">Для похудения</label>
                        <input id="id-2" type="radio" name="for" value="2">
                        <label for="id-2">Для набора массы</label>
                        <input id="id-3" type="radio" name="for" value="3">
                        <label for="id-3">Для поддержания формы</label>
                    </div>
                    <h3>Текущий набор БЖУ:</h3>
                    <ul class="b-attr">
                        <li class="clearfix b-time-1">
                            <h4 class="left">Утро:</h4>
                            <div class="right">
                                <ul class="dark clearfix">
                                    <li>Белки</li>
                                    <li>Жиры</li>
                                    <li>Углеводы</li>
                                </ul>
                                <ul class="light clearfix">
                                    <li class="pro"></li>
                                    <li class="fat"></li>
                                    <li class="car"></li>
                                </ul>
                            </div>
                        </li>
                        <li class="clearfix b-time-2">
                            <h4 class="left">День:</h4>
                            <div class="right">
                                <ul class="dark clearfix">
                                    <li>Белки</li>
                                    <li>Жиры</li>
                                    <li>Углеводы</li>
                                </ul>
                                <ul class="light clearfix">
                                    <li class="pro"></li>
                                    <li class="fat"></li>
                                    <li class="car"></li>
                                </ul>
                            </div>
                        </li>
                        <li class="clearfix b-time-3">
                            <h4 class="left">Вечер:</h4>
                            <div class="right">
                                <ul class="dark clearfix">
                                    <li>Белки</li>
                                    <li>Жиры</li>
                                    <li>Углеводы</li>
                                </ul>
                                <ul class="light clearfix">
                                    <li class="pro"></li>
                                    <li class="fat"></li>
                                    <li class="car"></li>
                                </ul>
                            </div>
                        </li>
                        <li class="clearfix b-time-all">
                            <h4 class="left" style="margin-top: 0px;">Всего за<br>сутки:</h4>
                            <div class="right">
                                <ul class="dark clearfix">
                                    <li>Белки</li>
                                    <li>Жиры</li>
                                    <li>Углеводы</li>
                                </ul>
                                <ul class="light clearfix">
                                    <li class="pro"></li>
                                    <li class="fat"></li>
                                    <li class="car"></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <h5 class="b-time-all"><font class="cal">2450</font> кКал. <span>+ 1,8 л воды</span></h5>
                    <a href="#" class="ajax b-orange-butt rounded fancy" href="#" data-block="#b-popup-programm">Получить персональную<br>программу питания</a>
                </div>
                <form action="<?=$this->createUrl('/land/createorder')?>" method="POST" id="menu-order">
                <div class="b-menu right">
                    <div class="b-padding">
                        <div class="clearfix b-header">
                            <h3 class="left">Меню на день</h3>
                            <a href="#" class="right b-add-day">Добавить еще день</a>
                            <select class="right" name="day-select" id="day-select">
                                <option value="1">1</option>
                            </select>
                            <!-- <a href="#" class="b-add-link right" data-block="#b-popup-menu">Посмотреть все меню</a> -->
                        </div>
                        <?php $this->renderPartial('daytime', array('daytime'=> $daytime)); ?>          
                    </div>
                    <div class="b-green-bottom b-time-all clearfix">
                        <div class="left">
                            <h3>Цена: <span class="pri" id="main-price">1202</span> руб.</h3>
                        </div>
                        <div class="right">
                            <input type="submit" class="b-orange-butt rounded" value="Заказать набор">
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="b-triangles">
                <div class="b-block">
                    <div class="b-advantages clearfix">
                        <li>
                            <img src="<?php echo Yii::app()->request->baseUrl;?>/i/b-3/1.png" alt="">
                            <h3>Вакуумная<br>упаковка</h3>
                            <p>Еда хранится 3-5 дней благодаря отсутствию воздуха</p>
                        </li>
                        <li>
                            <img src="<?php echo Yii::app()->request->baseUrl;?>/i/b-3/2.png" alt="">
                            <h3>Свежее. Доставляем<br>в день приготовления</h3>
                            <p>Вся еда приготавливается ночью и хранится у нас не более суток</p>
                        </li>
                        <li>
                            <img src="<?php echo Yii::app()->request->baseUrl;?>/i/b-3/3.png" alt="">
                            <h3>Вкусно. Разнообразная еда каждый день</h3>
                            <p>95 вариантов блюд!</p>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="b b-4">
        <div class="b-block">
            <h2>Простые и здоровые блюда 
            для отличных результатов<br> 
            в зале</h2>
            <div class="green clearfix">
                <div class="coffee left"></div>
                <div class="green-block left">
                    <h3>Получите Ваш промокод на скидку 5%</h3>
                    <h4>Введите свой номер телефона и получите персональный промокод на <b>5% скидку</b></h4>
                    <form method="POST" action="kitsend.php" id="b-form-2" data-block="#b-popup-2" class="clearfix">
                        <input type="hidden" name="subject" value="Заявка на промокод"/>
                        <div class="clearfix">
                            <div class="left phone-img"></div>
                            <input class="left" type="text" id="phone-2" name="phone" placeholder="+7 (___) ___-__-__" required/>
                        </div>
                        <button class="ajax b-orange-butt rectangle" type="submit">Получить промокод</button>
                    </form>
                </div>
                <div class="cloud">
                    <p>По самой низкой на рынке цене. Мы не тратимся на масла, соусы и неоправданно дорогие специи</p>
                </div>
            </div>
        </div>
    </div>
    <div class="b b-5">
        <div class="b-block">
            <h2>Узнайте, сколько Вам нужно есть и пить воды в день</h2>
            <h3>Рассчитайте суточную норму воды, калорий, белков, 
            жиров и углеводов под Ваши цели</h3>
            <div class="b-calk clearfix">
                <form action="#" method="POST" id="calc">
                    <div class="b-left-side left">
                        <h4>Ваш пол:</h4>
                        <div class="radio left">
                            <input id="male" type="radio" name="sex" value="male">
                            <label for="male">Мужской</label>
                            <input id="female" type="radio" name="sex" checked value="female">
                            <label for="female">Женский</label>
                        </div>
                        <div class="b-dimensions">
                            <label class="for-form" for="age">Введите Ваш возраст (лет):</label>
                            <input type="text" id="age" name="age" placeholder="Например, 21"required/>
                            <label class="for-form" for="weight">Введите Ваш вес, кг:</label>
                            <input type="text" id="weight" name="weight" placeholder="Например, 63"required/>
                            <label class="for-form" for="growth">Введите Ваш рост, см:</label>
                            <input type="text" id="growth" name="growth" placeholder="Например, 180"required/>
                            <label class="for-form" for="lifestyle">Выберите Ваш образ жизни</label>
                            <select name="lifestyle">
                                <option value="1.2" selected>Сидячий, малоподвижный</option>
                                <option value="1.4">Легкая активность (упражнения 1-3 раза в неделю)</option>
                                <option value="1.6">Средняя активность (тренировки 3-5 раз в неделю)</option>
                                <option value="1.8">Высокая активность (высокие нагрузки каждый день)</option>
                                <option value="1.9">Экстремально высокая активность</option>
                            </select>
                            <div class="b-form-radio">
                                <h5>Ваша цель:</h5>
                                <div class="radio">
                                    <div><input id="decrease" type="radio" name="goal" value="decrease" checked>
                                    <label for="decrease">Сбросить вес</label></div>
                                    <div><input id="increase" type="radio" name="goal" value="increase">
                                    <label for="increase">Набрать массу</label></div>
                                    <div><input id="normal" type="radio" name="goal" value="normal">
                                    <label for="normal">Поддерживать форму</label></div>
                                </div>
                            </div>
                            <input type="submit" class="ajax b-orange-butt rounded" value="Получить расчет">    
                        </div>
                    </div>
                </form>
                <div class="b-right-side left">
                    <h4>Ваша суточная норма будет показана здесь</h4>
                    <div class="mass">
                        <h5>Суточная норма калорий:</h5>
                        <table class="blue">
                            <tr>
                                <td><p>По формуле Харриса-Бенедикта</p></td>
                                <td><span id="HB">&mdash;</span></td>
                            </tr>
                            <tr>
                                <td><p>По формуле Миффлина - Сан Жеора</p></td>
                                <td><span id="MG">&mdash;</span></td>
                            </tr>
                            <!-- <tr>
                                <td><p>Диапазон калорий</p></td>
                                <td><span>2298-2507</span></td>
                            </tr>
                            <tr>
                                <td><p>Суточная норма белка</p></td>
                                <td><span>172-92 гр</span></td>
                            </tr> -->
                            <tr>
                                <td><p>Идельное количество воды в день:</p></td>
                                <td><span id="water">&mdash;</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="cal">
                        <h5>Суточная норма калорий:</h5>
                        <table>
                            <tr>
                                <td><p>Диапазон калорий</p></td>
                                <td><span><span id="cal">&mdash;</span></td>
                            </tr>
                            <tr>
                                <td><p>Суточная норма белка</p></td>
                                <td><span id="protein">&mdash;</span></td>
                            </tr>
                            <tr>
                                <td><p>Суточная норма жиров</p></td>
                                <td><span id="fat">&mdash;</span></td>
                            </tr>
                            <tr>
                                <td><p>Суточная норма углеводов</p></td>
                                <td><span id="carbo">&mdash;</span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- <a href="#">Отправить на почту</a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="b b-6">
        <div class="b-block">
            <h2>Доставка в ЮЗАО за 30 минут</h2>
            <h3>Бесплатно при заказе от 2900р. Всю еду доставляем в день приготовления</h3> 
            <div class="content clearfix">
                <div class="pay right">
                    <h2>Способы оплаты:</h2>
                    <ul class="clearfix">
                        <li class="left">
                            <div></div>
                            <p>Наличные</p>
                        </li>
                        <li class="left">
                            <div></div>
                            <p>Безналичный расчет</p>
                        </li>
                        <li class="left">
                            <div></div>
                            <p>Кредитная<br> карта</p>
                        </li>
                        <li class="left">
                            <div></div>
                            <p>Электронные деньги</p>
                        </li>
                    </ul>
                </div>
                <div class="delivery right">
                    <h4>Способы доставки:</h4>
                    <ul>
                        <li class="clearfix">
                            <img class="left" src="<?php echo Yii::app()->request->baseUrl;?>/i/b-6/1.png">
                            <div class="left">
                                <h5>Самовывоз</h5>
                                <p>(Адрес ниже)</p>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img class="left" src="<?php echo Yii::app()->request->baseUrl;?>/i/b-6/2.png">
                            <div class="left">
                                <h5>Доставка</h5>
                                <p>от 2900р. - бесплатно<br>до 2900р. - 300руб.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="b b-7">
        <div class="b-block">
            <div class="clearfix">
                <div class="menu left">
                    <h2>Заходите к нам 
                    и попробуйте 
                    наше меню
                    </h2>
                    <h3>г. Москва, улица тестовая, д 1 к 4</h3>
                </div>
                <div class="cloud left">
                    <p>Скоро мы открываемся на Парке культуры и Проспекте Мира</p>
                </div>
            </div>
        </div>
    </div>
    <div class="b b-8">
        <div class="b-white"></div>
        <div class="b-map" id="map_canvas"></div>
        <div class="info">
            <h2>Контактная информация</h2>
            <ul>
                <li class="clearfix">
                    <div class="left"></div>
                    <p class="left">Ул. Здоровой Еды 50 дом 13, 21555</p>
                </li>
                <li class="clearfix">
                    <div class="left"></div>
                    <p class="left">+7 495 12 345 67</p>
                </li>
            </ul>
            <a href="mailto:zdorovaya.eda@eda.ru">zdorovaya.eda@eda.ru</a>
        </div>
    </div>
    <div class="b b-9">
        <div class="b-block">
            <div>
                <h2>Остались вопросы?</h2>
            </div>
            <a class="b-orange-butt rounded fancy" href="#" data-block="#b-popup-question">Задайте их менеджеру</a>
        </div>
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
    <div style="display:none;">
        <div id="b-popup-question">
            <div class="b-popup" >
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
        <div id="b-popup-system">
            <div class="b-popup" >
                <h2>Войдите в систему</h2>
                <h3>В личном кабинете будут Ваши заказы и результаты тренировок</h3>
                <form action="kitsend.php" method="POST" id="b-form-4" data-block="#b-popup-2">
                    <div class="b-popup-form">
                        <input type="hidden" name="subject" value="Вход в систему"/>
                        <label for="email-2">Введите Ваш e-mail:</label>
                        <input type="text" id="email-2" class="write" name="email" placeholder="Ivanov@mail.ru"required/>
                        <input type="hidden" name="subject" placeholder="Ivanov@mail.ru"/>
                        <label for="password-1">Ваш пароль:</label>
                        <input type="text" id="password-1" class="pass" name="password" required/>
                        <input type="submit" class="ajax b-orange-butt rounded sys" value="войти">
                    </div>
                </form>
            </div>
        </div>
        <div id="b-popup-registration">
            <div class="b-popup" >
                <h2>Зарегистрируйтесь в системе</h2>
                <h3>В личном кабинете будут Ваши заказы и результаты тренировок</h3>
                <form action="kitsend.php" method="POST" id="b-form-5" data-block="#b-popup-2">
                    <div class="b-popup-form">
                        <input type="hidden" name="subject" value="Регистрация в системе"/>
                        <label for="email-3">Введите Ваш e-mail:</label>
                        <input type="text" id="email-3" class="write" name="email" placeholder="Ivanov@mail.ru"required/>
                        <input type="hidden" name="subject" placeholder="Ivanov@mail.ru"/>
                        <label for="password-2">Придумайте пароль:</label>
                        <input type="text" id="password-2" class="pass" name="password" required/>
                        <input type="submit" class="ajax b-orange-butt rounded sys" value="зарегистрироваться">
                    </div>
                </form>
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
            <div class="b-popup" >
                <h2>Получите промокод на <span>5%-ю</span> скидку прямо сейчас</h2>
                <h3>Введите телефон, и промокод автоматически будет выслан</h3>
                <form action="kitsend.php" method="POST" id="b-form-8" data-block="#b-popup-2">
                    <div class="b-popup-form">
                        <input type="hidden" name="subject" value="Заявка на промокод"/>
                        <label for="phone-5">Введите Ваш телефон:</label>
                        <div class="clearfix">
                            <div class="left phone-img"></div>
                            <input class="left" type="text" id="phone-5" name="phone" placeholder="+7 (___) ___-__-__" required/>
                        </div>
                        <input type="submit" class="ajax b-orange-butt rounded sys" value="получить промокод">
                    </div>
                </form>
            </div>
        </div>
        <div id="b-popup-menu">
            <div class="b-popup menu">
                <h2>Полное меню</h2>
                <h2 class="sub-title"><span>100%</span> здоровое питание делает вас энергичнее!</h2>
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
        <div id="b-popup-more">
            <div class="b-popup menu">
                <h2><span class="more-day">100%</span> <span>здоровое питание делает вас энергичнее!</span><span class="more-">100%</span></h2>
               
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
        <li class="clearfix" data-dish-id="" data-m-1="" data-m-2="" data-m-3="" data-w-1="" data-w-2="" data-w-3="" data-fat="" data-pro="" data-car="" data-cal="" data-pri="" id="item-copy">
            <div class="left b-image" style=""></div>
            <div class="left">
                <h4></h4>
                <a href="#" class="b-more">Подробнее</a>
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