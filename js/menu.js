$(document).ready(function(){	
    $(".b-filter input,select[name='count']").change(calculateMenu);

    calculateMenu();
    var daytime,rate;
    menuFilter();
});

function calculateMenu(){
    type = $(".b-filter input[name='sex-2']:checked").val()+"-"+$(".b-filter input[name='for']:checked").val();

    $(".b-time").each(function(){
        calculateDaytime($(this).attr("data-id"),$(this).attr("data-id"),type);
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

    $(".b-time-"+daytime+" .b-eat li").each(function(){
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
            data:  form.serialize()+"&coef="+$(".b-filter input[name='sex-2']:checked").val()+"_"+$(".b-filter input[name='for']:checked").val(),
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
        daytime = $(this).closest('.b-time').attr("data-id");
        $("#fullmenu input").eq(0).change();

    });
    $("body").on("click",".b-add-cart",function(){
        var o = $(this).closest("li"),daynumber;
        if(daytime == "morning") daynumber = 1;
        if(daytime == "day") daynumber = 2;
        if(daytime == "evening") daynumber = 3;
        $(".b-time-"+daytime+":visible").find(".b-eat").append('<li class="clearfix" data-dish-id="'+o.attr("data-dish-id")+'" data-m-1="'+o.attr("data-m-1")+'" data-m-2="'+o.attr("data-m-2")+'" data-m-3="'+o.attr("data-m-3")+'" data-w-1="'+o.attr("data-w-1")+'" data-w-2="'+o.attr("data-w-1")+'" data-w-3="'+o.attr("data-w-1")+'" data-fat="'+o.attr("data-fat")+'" data-pro="'+o.attr("data-pro")+'" data-car="'+o.attr("data-car")+'" data-cal="'+o.attr("data-cal")+'" data-pri="'+o.attr("data-pri")+'"><div class="left b-image" style="background-image: url('+o.attr("data-img")+');"></div><div class="left"><h4>'+o.attr("data-name")+'</h4><a href="#" class="b-more">Подробнее</a></div><div class="del-cross"></div><div class="right clearfix"><div class="left"><span>Кол-во:</span></div><div class="right"><select name="count" id=""><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>/select></div></div><input type="hidden" name="day['+($("#day-select").val()-1)+'][]" value="'+o.attr("data-dish-id")+';'+daynumber+';1"></li>');
        $.fancybox.close();
        calculateMenu();
        return false;
    });

    $(".b-add-day").click(function(){
        if($("#day-select option").length < 31) {
            $("#day-select").show();
            var opt_length = $("#day-select option").length+1;
            $("#day-select option").prop("selected",false);
            $("#day-select").append('<option value="'+opt_length+'">'+opt_length+'</option>');
            $("#day-select option").eq(opt_length-1).prop("selected",true);
            var set_id = $(".daytime-cont:last").attr("data-set-id");
            if(set_id >=0)
            $.ajax({
                type: "GET",
                url: "land/dayTime",
                data:  { set_id: set_id},
                success: function(msg){
                    $(".daytime-cont").hide(); 
                    $(".daytime-cont:last").after(msg);
                    set_day($(".daytime-cont:last"));
                    fancy_init();
                    calculateMenu();
                }
            });
        }

        return false;
    });
    $("#day-select").change(function(){
        $(".daytime-cont").hide();
        $(".daytime-cont").eq($(this).val()-1).show();
    });

    $(".b-menu").on("click",".del-cross",function() {
        $(this).closest("li").remove();
        calculateMenu();
    });
    $("body").on("change","select[name='count']",function(){
        var arr = $(this).closest("li").find("input[type='hidden']").val().split(";");
        arr[2] = $(this).val();
        $(this).closest("li").find("input[type='hidden']").val(arr.join(";"));
    });
   
    function set_day($page) {
       $page.find("input[type='hidden']").attr("name","day["+($("#day-select").val()-1)+"][]");
    }
    
   
}