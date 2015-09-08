<div class="daytime-cont" data-set-id="<?=$daytime['set_id']?>">
<div class="b-time b-time-morning" data-id="morning">
        <div class="b-header clearfix">
            <h3 class="left">Утро</h3>
            <h6 class="left"><span class="cal"></span> кКал. <span class="car"></span>г углеводов, <span class="pro"></span>г белков, <span class="fat"></span>г жиров</h6>
        </div>
        <ul class="b-eat">
            <? if(isset($daytime[1])): ?>
            <? foreach($daytime[1] as $item): ?>
                <li class="clearfix"  data-m-1="<?=$item['m_1']?>" data-m-2="<?=$item['m_2']?>" data-m-3="<?=$item['m_3']?>" data-w-1="<?=$item['w_1']?>" data-w-2="<?=$item['w_2']?>" data-w-3="<?=$item['w_3']?>" data-fat="<?=$item['fat']?>" data-pro="<?=$item['pro']?>" data-car="<?=$item['car']?>" data-cal="<?=$item['cal']?>" data-pri="<?=$item['price']?>">
                    <div class="left b-image" style="background-image: url('<?=$item['img']?>');"></div>
                    <div class="left">
                        <h4><?=$item['name']?></h4>
                        <a href="#" class="b-more">Подробнее</a>
                    </div>
                    <div class="del-cross"></div>
                    <div class="right clearfix">
                        <div class="left">
                            <span>Кол-во:</span>
                        </div>
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
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="day[0][]" value="<?=$item['id']?>;1;1">
                </li>
            <? endforeach; ?>
            <? endif; ?>   
        </ul>
        <div class="b-add-butt-cont clearfix"><a href='#' class="b-add-butt fancy" data-block="#b-popup-menu">Добавить на утро</a></div>
    </div>
   
    
    <div class="b-time b-time-day" data-id="day">
        <div class="b-header clearfix">
            <h3 class="left">День</h3>
            <h6 class="left"><span class="cal"></span> кКал. <span class="car"></span>г углеводов, <span class="pro"></span>г белков, <span class="fat"></span>г жиров</h6>
        </div>
        <ul class="b-eat">
            <? if(isset($daytime[2])): ?>
            <? foreach($daytime[2] as $item): ?>
                <li class="clearfix" data-dish-id="<?=$item['id']?>" data-m-1="<?=$item['m_1']?>" data-m-2="<?=$item['m_2']?>" data-m-3="<?=$item['m_3']?>" data-w-1="<?=$item['w_1']?>" data-w-2="<?=$item['w_2']?>" data-w-3="<?=$item['w_3']?>" data-fat="<?=$item['fat']?>" data-pro="<?=$item['pro']?>" data-car="<?=$item['car']?>" data-cal="<?=$item['cal']?>" data-pri="<?=$item['price']?>">
                    <div class="left b-image" style="background-image: url('<?=$item['img']?>');"></div>
                    <div class="left">
                        <h4><?=$item['name']?></h4>
                        <a href="#" class="b-more">Подробнее</a>
                    </div>
                     <div class="del-cross"></div>
                    <div class="right clearfix">
                        <div class="left">
                            <span>Кол-во:</span>
                        </div>
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
                                
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="day[0][]" value="<?=$item['id']?>;2;1">
                </li>
            <? endforeach; ?>
            <? endif; ?> 
        </ul>
        <div class="b-add-butt-cont clearfix"><a href='#' class="b-add-butt fancy" data-block="#b-popup-menu">Добавить на день</a></div>
    </div>
    <div class="b-time b-time-evening" data-id="evening">
        <div class="b-header clearfix">
            <h3 class="left">Вечер</h3>
            <h6 class="left"><span class="cal"></span> кКал. <span class="car"></span>г углеводов, <span class="pro"></span>г белков, <span class="fat"></span>г жиров</h6>
        </div>
        <ul class="b-eat">
            <? if(isset($daytime[3])): ?>
            <? foreach($daytime[3] as $item): ?>
                <li class="clearfix" data-dish-id="<?=$item['id']?>" data-m-1="<?=$item['m_1']?>" data-m-2="<?=$item['m_2']?>" data-m-3="<?=$item['m_3']?>" data-w-1="<?=$item['w_1']?>" data-w-2="<?=$item['w_2']?>" data-w-3="<?=$item['w_3']?>" data-fat="<?=$item['fat']?>" data-pro="<?=$item['pro']?>" data-car="<?=$item['car']?>" data-cal="<?=$item['cal']?>" data-pri="<?=$item['price']?>">
                    <div class="left b-image" style="background-image: url('<?=$item['img']?>');"></div>
                    <div class="left">
                        <h4><?=$item['name']?></h4>
                        <a href="#" class="b-more">Подробнее</a>
                    </div>
                     <div class="del-cross"></div>
                    <div class="right clearfix">
                        <div class="left">
                            <span>Кол-во:</span>
                        </div>
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
                                
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="day[0][]" value="<?=$item['id']?>;3;1">
                </li>
            <? endforeach; ?>
            <? endif; ?>
        </ul>
        <div class="b-add-butt-cont clearfix"><a href='#' class="b-add-butt fancy" data-block="#b-popup-menu">Добавить на вечер</a></div>
    </div>
 </div>