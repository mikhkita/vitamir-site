$(document).ready(function(){	
    $(".b-filter input,select[name='count']").change(calculateMenu);

    calculateMenu();
    menuFilter();
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

        console.log(combo);

        price = price+($(this).attr("data-pri")*combo*count);
    });

    $(".b-time-all .pri").text(price);
}

function calculateDaytime(daytime,daytime1,type){
    var sum = {
            "cal" : 0,
            "car" : 0,
            "pro" : 0,
            // "pri" : 0,
            "fat" : 0
        };

    $(".daytime-cont").eq($("#day-select").val()*1-1).find(daytime+" .b-eat li").each(function(){
        var combo = $(this).attr("data-"+type)*1,
            count = $(this).find('select[name="count"]').val()*1;
        for( i in sum ){
            sum[i] = sum[i]+($(this).attr("data-"+i)*combo*count);
        }
    });

    console.log(sum);

    for( i in sum ){
        $(".b-time-"+daytime1+" ."+i).text(sum[i]);
    }
}
function menuFilter() {
    var form = $("#fullmenu"),daytime,rate;
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
    	$("#no-add").val('');
    	var no_add = [];
        daytime = $(this).closest('.b-time').attr("data-id");
        $(this).closest(".b-time").find(".b-eat li").each(function(){
        	no_add.push($(this).attr("data-dish-id"));
        });
        $("#no-add").val(no_add.join(","));
        $("#fullmenu input").eq(0).change();
        

    });
    $("body").on("click",".b-add-cart",function(){
    	var o = $(this).closest("li"),daynumber,$clone,exit = false;
    	$(".b-time-"+daytime+":visible .b-eat li").each(function(){
    		if($(this).attr("data-dish-id") == o.attr("data-dish-id")) {
    			if($(this).find("select").val()==9) $(this).find("select").val(8);
    			$(this).find("select").val(($(this).find("select").val()*1)+1);
    			exit = true;
    		}
    	});
    	if(!exit) {
	        if(daytime == "morning") daynumber = 1;
	        if(daytime == "day") daynumber = 2;
	        if(daytime == "evening") daynumber = 3;
	        $clone = $("#item-copy").clone();
	        $clone.attr("data-dish-id",o.attr("data-dish-id"))
	        .attr("data-m-1",o.attr("data-m-1"))
	        .attr("data-m-2",o.attr("data-m-2"))
	        .attr("data-m-3",o.attr("data-m-3"))
	        .attr("data-w-1",o.attr("data-w-1"))
	        .attr("data-w-2",o.attr("data-w-2"))
	        .attr("data-w-3",o.attr("data-w-3"))
	        .attr("data-fat",o.attr("data-fat"))
	        .attr("data-pro",o.attr("data-pro"))
	        .attr("data-car",o.attr("data-car"))
	        .attr("data-cal",o.attr("data-cal"))
	        .attr("data-pri",o.attr("data-pri"));
	        $clone.find('.b-image').css("background-image",'url('+o.attr("data-img")+')');
	        $clone.find('h4').text(o.attr("data-name"));
	        $clone.find('input').attr("name",'day['+($("#day-select").val()-1)+'][]').val(o.attr("data-dish-id")+';'+daynumber+';1');
	        $(".b-time-"+daytime+":visible").find(".b-eat").append($clone);
	    }
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
    });
    $("#menu-order").submit(function() {
        if($(".b-eat li").length == 0) return false;
        calculateMenu();
        $("#main-price").parent("h3").append("<input type='hidden' name='price' value='"+$("#main-price").text()+"'>");
        var type = $(".b-filter input[name='sex-2']:checked").val()+"-"+$(".b-filter input[name='for']:checked").val();
        $("#menu-order").append("<input type='hidden' name='type' value='"+type+"'/>");
    }); 
    function set_day($page) {
       $page.find("input[type='hidden']").attr("name","day["+($("#day-select").val()-1)+"][]");
    }
    
   
}