$(document).ready(function(){	
    $(".b-filter input,select[name='count']").change(calculateMenu);

    calculateMenu();
    var daytime;
    menuFilter();
    $("#fullmenu input").eq(0).change();
});

function calculateMenu(){
    type = $(".b-filter input[name='sex-2']:checked").val()+"-"+$(".b-filter input[name='for']:checked").val();

    $(".b-time").each(function(){
        calculateDaytime("#"+$(this).attr("id"),$(this).attr("id"),type);
    });
    calculateDaytime("","all",type);
}

function calculateDaytime(daytime,daytime1,type){
    var sum = {
            "cal" : 0,
            "car" : 0,
            "pro" : 0,
            "pri" : 0,
            "fat" : 0
        };

    $(daytime+" .b-eat li").each(function(){
        var combo = $(this).attr("data-"+type)*1,
            count = $(this).find('select[name="count"]').val()*1;
        for( i in sum ){
            sum[i] = sum[i]+($(this).attr("data-"+i)*combo*count);
        }
    });

    for( i in sum ){
        $(".b-time-"+daytime1+" ."+i).text(sum[i]);
    }
}
function menuFilter() {
    var form = $("#fullmenu");
    $('body').on('click',".b-menu-pages a:not(.active)",function() {
        $(".b-menu-pages a.active").removeClass("active");
        $(this).addClass('active');
        $(".b-page").hide();
        $(".b-page[data-page="+$(this).text()+"]").fadeIn();
    });

    $("#fullmenu input").change(function(){
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data:  form.serialize(),
            success: function(msg){
               $(".b-menu-items").empty().append(msg);
               $(".b-menu-pages a").eq(0).click();
            }
        });
    });

    $("#fullmenu input[type=checkbox]:checked").click(function(){
        $(this).change();
    });
    $("body").on("click",".b-add-butt",function(){
        daytime = $(this).closest('.b-time').attr("id");
    });
    $("body").on("click",".b-add-cart",function(){
        var o = $(this).closest("li");
        $("#"+daytime).find(".b-eat").append('<li class="clearfix" data-m-1="'+o.attr("data-m-1")+'" data-m-2="'+o.attr("data-m-2")+'" data-m-3="'+o.attr("data-m-3")+'" data-w-1="'+o.attr("data-w-1")+'" data-w-2="'+o.attr("data-w-1")+'" data-w-3="'+o.attr("data-w-1")+'" data-fat="'+o.attr("data-fat")+'" data-pro="'+o.attr("data-pro")+'" data-car="'+o.attr("data-car")+'" data-cal="'+o.attr("data-cal")+'" data-pri="'+o.attr("data-pri")+'"><div class="left"><img src="'+o.attr("data-img")+'" alt=""></div><div class="left"><h4>'+o.attr("data-name")+'</h4><a href="#" class="b-more">Подробнее</a></div><div class="right clearfix"><div class="left"><span>Кол-во:</span></div><div class="right"><select name="count" id=""><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>/select></div></div></li>');
        $.fancybox.close();
        return false;
    });

    $(".b-add-day").click(function(){
        $("#day-select").show();
        return false;
    });
    
   
}