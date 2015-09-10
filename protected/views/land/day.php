<? foreach($days as $number => $daytime): ?>
    <div class="daytime-cont <? if($number) echo 'hidden' ?>" data-set-id="<?=$set_id?>">
    <? foreach($daytime as $key => $value): ?>
        <div class="b-time b-time-<?=$key?>" data-id="<?=$key?>" data-day="<?=$dayname[$key]?>">
                <div class="b-header clearfix">
                    <h3 class="left"><?=$dayname[$key]?></h3>
                    <h6 class="left"><span class="cal"></span> кКал. <span class="car"></span>г углеводов, <span class="pro"></span>г белков, <span class="fat"></span>г жиров</h6>
                </div>
                <ul class="b-eat">
                    <? foreach($value as $item): ?>
                        <li class="dish-item clearfix" data-dish-id="<?=$item['id']?>" data-img="<?=$item['image']?>" data-name="<?=$item['name']?>" data-m-1="<?=$item['m_1']?>" data-m-2="<?=$item['m_2']?>" data-m-3="<?=$item['m_3']?>" data-w-1="<?=$item['w_1']?>" data-w-2="<?=$item['w_2']?>" data-w-3="<?=$item['w_3']?>" data-weight="<?=$item['weight']?>" data-fat="<?=$item['fat']?>" data-pro="<?=$item['pro']?>" data-car="<?=$item['car']?>" data-cal="<?=$item['cal']?>" data-pri="<?=$item['price']?>">
                            <div class="left b-image" style="background-image: url('<?=Yii::app()->baseUrl.'/'.$item['image']?>');"></div>
                            <div class="left">
                                <h4><?=$item['name']?></h4>
                                <a href="#" class="b-more more-butt-main modal" data-block="#b-popup-more">Подробнее</a>
                                <p class="more-desc hidden"><?=$item['description']?></p>
                            </div>
                            <div class="del-cross"></div>
                            <div class="right clearfix">
                                <div class="left">
                                    <span>Кол-во:</span>
                                </div>
                                <div class="right">
                                    <? echo CHtml::dropDownList('count', $item['count'], array ("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6,"7"=>7,"8"=>8,"9"=>9)) ?>
                                </div>
                            </div>
                            <input type="hidden" name="day[<?=$number?>][]" value="<?=$item['id'].';'.$key?>;1">
                        </li>
                    <? endforeach; ?>  
                </ul>
                <div class="b-add-butt-cont clearfix"><a href='#' class="b-add-butt fancy" data-block="#b-popup-menu">Добавить на <?=$dayname[$key]?></a></div>
            </div>   
    <? endforeach; ?>  
    </div>
<? endforeach; ?>  