<div class="b b-1 b-basket">
    <?php $this->renderPartial('header', array() ); ?>
    <div class="b-block cabinet-cont">
       <h3>Здравствуйте, <? if($user->usr_name) echo $user->usr_name; else echo "дорогой клиент" ?>!</h3>
       <div class="clearfix history">
            <ul class="left">
               <li class="active"><a href="#" onclick="return false;">История заказов</a></li>
               <li><a href="<?=$this->createUrl('/land/userprofile')?>">Профиль</a></li>
               <li><a href="<?=$this->createUrl('/land/changepassword')?>">Смена пароля</a></li>
            </ul>
            <div class="right">
                <? if(!$new_orders && !$old_orders): ?>
                    <h4>Заказы отсутствуют</h4>
                <? else: ?>
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
                <? endif; ?>
            </div>         
       </div>
    </div>
</div>