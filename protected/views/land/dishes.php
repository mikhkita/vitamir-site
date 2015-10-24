        <div class="b-page">
            <ul class="clearfix">
                <?foreach($dishes as $key => $item): ?>
                <li class="dish-item clearfix" data-dish-id="<?=$item['id']?>" data-img="<?=$item['image']?>" data-name="<?=$item['name']?>" data-m-1="<?=$item['m_1']?>" data-m-2="<?=$item['m_2']?>" data-m-3="<?=$item['m_3']?>" data-weight="<?=$item['weight']?>" data-fat="<?=$item['fat']?>" data-pro="<?=$item['protein']?>" data-car="<?=$item['carbohydrate']?>" data-cal="<?=$item['calories']?>" data-pri="<?=$item['price']?>">
                    <h3><?=$item['name']?></h3>
                    <div class="b-image-cont">
                        <div class="dish-image b-image more-butt-menu modal" data-block="#b-popup-more" style="background-image: url('<?=Yii::app()->baseUrl.'/'.$item['image']?>');" ></div>
                        <?if($item['action']): ?>
                            <span class="b-sale">-<?=$item['action']?>%</span>
                        <? endif; ?>
                    </div>
                    <div class="clearfix b-price-cont">
                        <div class="left"><span><?=round($item['price']*$item[$_POST['coef']])?></span> руб.</div>
                        <a href='#' data-block="#b-popup-more" class="modal more-butt-menu right">Подробнее</a>
                        <p class="more-desc hidden"><?=$item['description']?></p>
                    </div>
                    <div style="text-align: center;" class="clearfix"><a href="#" class="b-add-cart">В корзину</a></div>
                </li>
                <? endforeach; ?>        
            </ul>
        </div>

<div class="b-menu-nav clearfix">
    <div class="b-find-items right">
        Найдено товаров: <span><?=$count?></span>
    </div>
</div>