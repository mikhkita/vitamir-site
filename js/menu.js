$(document).ready(function(){	
    if($(".b-time").length) {
        $(".b-filter input").change(calculateMenu);
        var daytime,rate,detail_dish_id,show_menu;
        calculateMenu();
        menuFilter();
        if($("#day-select option").length == 30) $(".b-add-day").prop("disabled",true);
    }
    var price = $("#price").text()*1;
    $("input[name='delivery']").change(function(){
        if($(this).val()==2 && ($("#price").text()*1) < 2900 ) {
            $("#price").text(price+300);
            $("input[name='price']").val(price+300);
            $("#delivery").text(300);
        } else {
            $("#price").text(price);
            $("input[name='price']").val(price);
            $("#delivery").text(0);
        }
    });
});

function calculateMenu(){
    var type = $(".b-filter input[name='sex-2']:checked").val()+"-"+$(".b-filter input[name='for']:checked").val();

    $(".b-time").each(function(){
        calculateDaytime(".b-time-"+$(this).attr("data-id"),$(this).attr("data-id"),type);
    });
    calculateDaytime("","all",type);
    calculatePrice();
}

function calculatePrice(){
    var price = 0,
        type = $(".b-filter input[name='sex-2']:checked").val()+"-"+$(".b-filter input[name='for']:checked").val();
    $(".b-eat li").each(function(){
        var combo = $(this).attr("data-"+type)*1,
            count = $(this).find('select[name="count"]').val()*1;

        // console.log(combo);

        price = price+Math.round(($(this).attr("data-pri")*combo*count));
    });

    $(".b-time-all .pri").text(price);
}

function calculateDaytime(daytime,daytime1,type){
    var sum = {
            "cal" : 0,
            "car" : 0,
            "pro" : 0,
            // "pri" : 0,
            "fat" : 0,
            'weight' : 0
        };

    $(".daytime-cont").eq($("#day-select").val()*1-1).find(daytime+" .b-eat li").each(function(){
        var combo = $(this).attr("data-"+type)*1,
            count = $(this).find('select[name="count"]').val()*1;
        for( i in sum ){
            sum[i] = sum[i]+($(this).attr("data-"+i)*combo*count);
        }
    });

    // console.log(sum);

    for( i in sum ){
        $(".b-time-"+daytime1+" ."+i).text(roundPlus(sum[i],3));
    }
}
function roundPlus(x, n) { //x - число, n - количество знаков
    if(isNaN(x) || isNaN(n)) return false;
    var m = Math.pow(10,n);
    return Math.round(x*m)/m;
}
function menuFilter() {
    
    $('body').on('click',".b-menu-pages a:not(.active)",function() {
        $(".b-menu-pages a.active").removeClass("active");
        $(this).addClass('active');
        $(".b-page").hide();
        $(".b-page[data-page="+$(this).text()+"]").fadeIn();
    });

    $("#fullmenu input").change(function(){
        $.ajax({
            type: "POST",
            url: $("#fullmenu").attr("action"),
            data:  $("#fullmenu").serialize()+"&coef="+$(".b-filter input[name='sex-2']:checked").val()+"_"+$(".b-filter input[name='for']:checked").val(),
            success: function(msg){
               $(".b-menu-items").empty().append(msg);
               $(".b-menu-pages a").eq(0).click();
            }
        });
    });

    $(".b-filter input[name='sex-2'],.b-filter input[name='for']").change(function(){
        $("#fullmenu input").change();
    });

    $("body").on("click",".b-add-butt",function(){
        daytime = $(this).closest('.b-time').attr("data-id");
    });

    $("body").on("click",".b-add-cart",function(){
    	var o = $(this).closest(".dish-item");
    	dish_clone(o,daytime);
        return false;
    });

    $("body").on("click",".b-add-cart-detail",function(){
        var o = $("body").find("#b-popup-menu .dish-item[data-dish-id='"+detail_dish_id+"']");
        dish_clone(o,daytime);
        return false;
    });

    $(".b-add-day").click(function(){
        if($("#day-select option").length < 30) {
            $(".b-add-day").prop("disabled",false);
            $("#day-select,.b-del-day").show();
            var opt_length = $("#day-select option").length*1+1;
            $("#day-select option").prop("selected",false);
            $("#day-select").append('<option value="'+opt_length+'">'+opt_length+'</option>');
            $("#day-select option").eq(opt_length-1).prop("selected",true);
            var set_id = $(".daytime-cont:last").attr("data-set-id");
            $("#day-count").val($("#day-select option").length);
            if(set_id >=0)
            $.ajax({
                type: "GET",
                url: "/land/day",
                data:  { set_id: set_id},
                beforeSend: function() {
                    $("#menu-order input,#menu-order button,#menu-order select").prop("disabled",true);
                },
                success: function(msg){
                    $(".daytime-cont").hide(); 
                    $(".daytime-cont:last").after(msg);
                    set_day($(".daytime-cont:last"));
                    fancy_init();
                    calculateMenu();
                    $("#menu-order input,#menu-order button,#menu-order select").prop("disabled",false);
                }
            });
        } else {
            $(".b-add-day").prop("disabled",true);
        }

    });
    $(".b-del-day").click(function(){
        if($("#day-select option").length > 1) {
            if($("#day-select option").length == 2) $("#day-select,.b-del-day").hide();
            $(".b-add-day").prop("disabled",false);
            if($("#day-select").val() == $("#day-select option:last").val()) {
                $(".daytime-cont:last").remove();
                $(".daytime-cont:last").show();
                $("#day-select option:last").remove();
                $("#day-select option:last").prop("selected",true);
            } else {
                $(".daytime-cont").eq($("#day-select").val()*1-1).remove(); 
                $(".daytime-cont").eq($("#day-select").val()*1-1).show();
                $("#day-select option:last").remove(); 
            }
            $("#day-count").val($("#day-select option").length);
            fancy_init();
            calculateMenu();
        }

        return false;
    });
    $("#day-select").change(function(){
        $(".daytime-cont").hide();
        $(".daytime-cont").eq($(this).val()-1).show();
        calculateMenu();
    });

    $(".b-menu").on("click",".del-cross",function() {
        $(this).closest("li").remove();
        calculateMenu();
    });
    $("body").on("change","select[name='count']",function(){
        var arr = $(this).closest("li").find("input[type='hidden']").val().split(";");
        arr[2] = $(this).val();
        $(this).closest("li").find("input[type='hidden']").val(arr.join(";"));
        calculateMenu();
    });
    $("#menu-order").submit(function() {
        if($(".b-eat li").length == 0) return false;
        calculateMenu();
        $("#main-price").parent("h3").append("<input type='hidden' name='price' value='"+$("#main-price").text()+"'>");
        var type = $(".b-filter input[name='sex-2']:checked").val()+"-"+$(".b-filter input[name='for']:checked").val();
        $("#menu-order").append("<input type='hidden' name='type' value='"+type+"'/>");
    }); 

    $("body").on("click",".more-butt-main",function() {
       var o = $(this).closest(".dish-item"),
       day = $(this).closest(".b-time").attr("data-day"),
       coef = o.attr("data-"+$(".b-filter input[name='sex-2']:checked").val()+"-"+$(".b-filter input[name='for']:checked").val());
       $("#more-add-butt").hide();
       show_menu = 0;
       set_more(o,day,coef);
    });

    $("body").on("click",".more-butt-menu",function() {
        // $.fancybox.close();
        var o = $(this).closest(".dish-item"),
        day = $('.b-time[data-id="'+daytime+'"]').attr("data-day"),
        coef = o.attr("data-"+$(".b-filter input[name='sex-2']:checked").val()+"-"+$(".b-filter input[name='for']:checked").val());
        set_more(o,day,coef);
        detail_dish_id = o.attr("data-dish-id");
        $("#more-add-butt").show();
        show_menu = 1;
        return false; 
    });  
    $("#fullmenu input").eq(0).change();
    if($("#day-select option").length == 1) {
        $("#day-select,.b-del-day").hide();
    }

    function dish_clone(o,daytime) {
        var daynumber,$clone,exit = false;
        $(".b-time-"+daytime+":visible .b-eat li").each(function(){
            if($(this).attr("data-dish-id") == o.attr("data-dish-id")) {
                if($(this).find("select").val()==9) $(this).find("select").val(8);
                $(this).find("select").val(($(this).find("select").val()*1)+1);
                exit = true;
            }
        });
        if(!exit) {
            $clone = $("#item-copy").clone();
            $clone.attr("data-dish-id",o.attr("data-dish-id"))
            .attr("data-img",o.attr("data-img"))
            .attr("data-name",o.attr("data-name"))
            .attr("data-m-1",o.attr("data-m-1"))
            .attr("data-m-2",o.attr("data-m-2"))
            .attr("data-m-3",o.attr("data-m-3"))
            .attr("data-w-1",o.attr("data-w-1"))
            .attr("data-w-2",o.attr("data-w-2"))
            .attr("data-w-3",o.attr("data-w-3"))
            .attr("data-weight",o.attr("data-weight"))
            .attr("data-fat",o.attr("data-fat"))
            .attr("data-pro",o.attr("data-pro"))
            .attr("data-car",o.attr("data-car"))
            .attr("data-cal",o.attr("data-cal"))
            .attr("data-pri",o.attr("data-pri"));
            $clone.find('.b-image').css("background-image","url('/"+o.attr("data-img")+"')");
            $clone.find('h4').text(o.attr("data-name"));
            $clone.find(".more-desc").text(o.find(".more-desc").text());
            $clone.find('input').attr("name",'day['+($("#day-select").val()-1)+'][]').val(o.attr("data-dish-id")+';'+daytime+';1');
            $(".b-time-"+daytime+":visible").find(".b-eat").append($clone);
        }
        $.fancybox.close();
        fancy_init();
        calculateMenu();
    }

    function set_more($obj,daytime,coef) {
        coef = coef || 1;
        $("#more-day,#more-add-butt span").text(daytime); 
        $("#more-name").text($obj.attr("data-name")); 
        $("#more-weight span").text(roundPlus($obj.attr("data-weight")*coef,3));   
        $("#more-img").attr("src","/"+$obj.attr("data-img"));
        $("#more-desc").text($obj.find(".more-desc").text());
        $("#more-jbu li").eq(0).find("span").text(roundPlus($obj.attr("data-pro")*coef,3));
        $("#more-jbu li").eq(1).find("span").text(roundPlus($obj.attr("data-fat")*coef,3));
        $("#more-jbu li").eq(2).find("span").text(roundPlus($obj.attr("data-car")*coef,3));
        $("#more-jbu li").eq(3).find("span").text(roundPlus($obj.attr("data-cal")*coef,3));
        $("#more-price").text(Math.round($obj.attr("data-pri")*coef));
    }

    function set_day($page) {
       $page.find("input[type='hidden']").attr("name","day["+($("#day-select").val()-1)+"][]");
    }
    
   
}