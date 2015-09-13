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
    <div class="b-block cabinet-cont">
       <h3>Здравствуйте, <?=$user->usr_name?>!</h3>
       <div class="clearfix history">
            <ul class="left">
               <li class="active"><a href="#" onclick="return false;">История заказов</a></li>
               <li><a href="<?=$this->createUrl('/land/userprofile')?>">Профиль</a></li>
               <li><a href="<?=$this->createUrl('/land/changepassword')?>">Смена пароля</a></li>
            </ul>
            <div class="right">
                <? if($new_orders): ?>
                    <h4>Текущий заказ:</h4>
                    <div class="table-cont">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Дата</th>
                                    <th>Наименование</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                <? foreach ($new_orders as $order): ?>
                                    <tr>
                                        <td><? $date = new DateTime($order->date); echo date_format($date, 'd.m.y'); ?></td>
                                        <td>
                                            <h5><?=Order::model()->types[$order->type]?></h5>
                                        </td>
                                        <td><?=$this->declOfNum($order->day,array("день","дня","дней"));?></td>
                                        <td><?=$order->price?> руб.</td>
                                        <td class="state-<?=$order->state?>"><?=Order::model()->states[$order->state]?></td>
                                        <td><a class="b-orange-butt cabinet-butt" href="<?=$this->createUrl('/land/createorder?order_id='.$order->id)?>">Заказать</a></td>
                                    </tr>
                                <? endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                 <? endif; ?>
                <? if($old_orders): ?>
                    <h4>История заказов:</h4>
                    <div class="table-cont">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Дата</th>
                                    <th>Наименование</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                <? foreach ($old_orders as $order): ?>
                                    <tr>
                                        <td><? $date = new DateTime($order->date); echo date_format($date, 'd.m.y'); ?></td>
                                        <td>
                                            <h5><?=Order::model()->types[$order->type]?></h5>
                                        </td>
                                        <td><?=$this->declOfNum($order->day,array("день","дня","дней"));?></td>
                                        <td><?=$order->price?> руб.</td>
                                        <td class="state-<?=$order->state?>"><?=Order::model()->states[$order->state]?></td>
                                        <td><a class="b-orange-butt cabinet-butt" href="<?=$this->createUrl('/land/createorder?order_id='.$order->id)?>">Заказать</a></td>
                                    </tr>
                                <? endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <? endif; ?>
            </div>         
       </div>
    </div>
</div>