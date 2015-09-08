<? $inc = 0; $page = 0; foreach($dishes as $key => $item): ?>
    <?if($inc == 0): $page++; ?>
        <div class="b-page" data-page="<?=$page?>">
            <ul class="clearfix">
    <? endif; ?>
                <li class="clearfix" data-dish-id="<?=$item['id']?>" data-img="<?=$item['image']?>" data-name="<?=$item['name']?>" data-m-1="<?=$item['m_1']?>" data-m-2="<?=$item['m_2']?>" data-m-3="<?=$item['m_3']?>" data-w-1="<?=$item['w_1']?>" data-w-2="<?=$item['w_2']?>" data-w-3="<?=$item['w_3']?>" data-fat="<?=$item['fat']?>" data-pro="<?=$item['protein']?>" data-car="<?=$item['carbohydrate']?>" data-cal="<?=$item['calories']?>" data-pri="<?=$item['price']?>">
                    <h3><?=$item['name']?></h3>
                    <div class="b-image-cont">
                        <div class="b-image" style="background-image: url('<?=$item['image']?>');" ></div>
                        <?if($item['action']): ?>
                            <span class="b-sale">-<?=$item['action']?>%</span>
                        <? endif; ?>
                    </div>
                    <div class="clearfix b-price-cont">
                        <div class="left"><span><?=$item['price']?></span> руб.</div>
                        <a href='#' class="right">Подробнее</a>
                    </div>
                    <div style="text-align: center;" class="clearfix"><a href="#" class="b-add-cart">В корзину</a></div>
                </li>
    <? $inc++; if($inc == 9 || $key == $count-1): ?>        
            </ul>
        </div>
    <? $inc = 0; endif; ?>
<? endforeach; ?>
<div class="b-menu-nav clearfix">
    <div class="b-menu-pages left">
        Страницы:
        <? for ($i=1; $i < $pages+1; $i++): ?> 
            <a href="#" onclick="return false;"><?=$i?></a>
        <? endfor; ?>
    </div>
    <div class="b-find-items right">
        Найдено товаров: <span><?=$count?></span>
    </div>
</div>