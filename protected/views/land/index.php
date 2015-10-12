<div class="b b-1">
    <div class="header">
        <div class="b-block clearfix">
            <a href="/" class="logo left">
                <!-- <h3>Клубы здорового питания в Москве</h3> -->
                <img src="<?php echo Yii::app()->request->baseUrl;?>/i/logo.png" width="175">
            </a>
            <ul class="left clearfix">
                <li class="left">
                    <a href="#" class="b-go" data-block=".b-3 .b-back">
                        <div class="pict"></div>
                        <div class="text">
                            <p>выбрать еду</p>
                        </div>
                    </a>
                </li>
                <li class="left">
                    <a href="#" class="b-go" data-block=".b-2">
                        <div class="pict"></div>
                        <div class="text">
                            <p>100% здоровая пища</p>
                        </div>
                    </a>
                </li>
                <li class="left">
                    <a href="#" class="b-go" data-block=".b-5">
                        <div class="pict"></div>
                        <div class="text">
                            <p>Узнать режим питания</p>
                        </div>
                    </a>
                </li>
                <li class="left">
                    <a href="#" class="b-go" data-block=".b-6">
                        <div class="pict"></div>
                        <div class="text">
                            <p>доставка</p>
                        </div>
                    </a>
                </li>
                <li class="left">
                    <a href="#" class="b-go" data-block="#map_canvas">
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
                <p><span>+7(929)</span>509-99-85</p>
            </div>
        </div>
    </div>
    <div class="b-block">
        <h2>Индивидуальные наборы<br>здорового питания на весь день.<br>с доставкой по ЮЗАО</h2>
        <div class="title">
            <h3>Удобный сервис для тех, кто занимается фигурой</h3>
            <img src="<?php echo Yii::app()->request->baseUrl;?>/i/arrow-1.png">
        </div>
        <div class="content clearfix">
            <!-- <div class="circle left"></div> -->
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
                            <h3 style="margin-top: 5px;" class="right">Доступные цены</h3>
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
                    <input style="display:none;" id="male-2" type="radio" name="sex-2" checked value="m">
                    <!-- <label for="male-2">Мужской</label>
                    <input id="female-2" type="radio" name="sex-2" value="w">
                    <label for="female-2">Женский</label> -->
                </div>
                <div class="b-toggle">
                    <input id="id-1" type="radio" name="for" value="1">
                    <label for="id-1">Для похудения</label>
                    <input id="id-2" type="radio" name="for" value="2">
                    <label for="id-2">Для набора массы</label>
                    <input id="id-3" type="radio" name="for" checked value="3">
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
                <h5 class="b-time-all"><font class="cal">2450 </font> <p> кКал.</p> <span>+ 1,8 л воды</span></h5>
                <a href="#" class="ajax b-orange-butt rounded fancy" href="#" data-block="#b-popup-programm">Получить персональную<br>программу питания</a>
            </div>
            <form action="<?=$this->createUrl('/land/createorder')?>" method="POST" id="menu-order">
            <div class="b-menu right">
                <div class="b-padding">
                    <div class="clearfix b-header">
                        <h3 class="left">Меню на день</h3>
                        <button type="button" class="right b-add-day">Добавить еще день</button>
                        <? echo CHtml::dropDownList('day-select', "1", $day_select, array("id" => "day-select", "class" => "right")) ?>
                        <button class="right b-del-day">удалить текущий день</button>
                        <input type="hidden" name="day-count" id="day-count" value="<?=count($day_select)?>">

                    </div>
                    <?php $this->renderPartial('day', array('days'=> $days, 'set_id' => $set_id)); ?>          
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
                        <h3>Экологически чистая упаковка</h3>
                        <p>Не выделяющие вредные вещества упаковка позволяющая хранить продукты до 2х дней</p>
                    </li>
                    <li>
                        <img src="<?php echo Yii::app()->request->baseUrl;?>/i/b-3/2.png" alt="">
                        <h3>Свежее. Доставляем<br>в день приготовления</h3>
                        <p>Вся еда приготавливается ночью и хранится у нас не более 12 часов</p>
                    </li>
                    <li>
                        <img src="<?php echo Yii::app()->request->baseUrl;?>/i/b-3/3.png" alt="">
                        <h3>Вкусно. Разнообразная еда каждый день</h3>
                        <p>Более 65 вариантов блюд!</p>
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
                <form method="POST" action="<?=$this->createUrl('/land/getpromo')?>" class="clearfix get-promo">
                    <input type="hidden" name="subject" value="Заявка на промокод"/>
                    <div class="clearfix">
                        <div class="left phone-img"></div>
                        <input class="left" type="text" id="phone-2" name="phone" placeholder="+7 (___) ___-__-__" required/>
                    </div>
                    <button class="b-orange-butt rectangle" type="submit">Получить промокод</button>
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
        <h3>Бесплатно при заказе от 1750р. Всю еду доставляем в день приготовления</h3> 
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
                            <p>от 1750р. - бесплатно<br>до 1750р. - 250руб.</p>
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
                <h3>г. Москва, проспект Вернадского<br>дом 29, павильон 68</h3>
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
                <p class="left">Город Москва, проспект Вернадского дом 29, Бизнец Центр Лето, цокольный этаж, Магазин Витамир</p>
            </li>
            <li class="clearfix">
                <div class="left"></div>
                <p class="left">7 (929) 509-99-85</p>
            </li>
        </ul>
        <a href="mailto:vitamirzakaz@gmail.com">vitamirzakaz@gmail.com</a>
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