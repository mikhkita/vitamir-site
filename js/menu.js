$(document).ready(function(){	

    $(".b-filter input,select[name='count']").change(calculateMenu);

    calculateMenu();
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
    $('body').on('click',".b-menu-pages a",function() {
        alert();
        $(".b-menu-pages a").removeClass("active");
        $(this).addClass('active');
        // $(".b-page").hide();
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

   
}