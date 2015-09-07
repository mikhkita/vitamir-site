<? $inc = 0; $page = 0; foreach($dishes as $key => $item): ?>
    <?if($inc == 0): $page++; ?>
        <div class="b-page" data-page="<?=$page?>">
            <ul class="clearfix">
    <? endif; ?>
                <li>
                    <h3><?=$item['name']?></h3>
                    <div class="b-image-cont">
                        <div class="b-image" style="background-image: url('<?=$item['image']?>');" ></div>
                        <span class="b-sale">-20%</span>
                    </div>
                    <div class="clearfix b-price-cont">
                        <div class="left"><?=$item['price']?> руб.</div>
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