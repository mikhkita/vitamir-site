$(document).ready(function(){
	var $opened = null,
		$layout = $(".b-layout"),
		myWidth = 0,
		myHeight = 0;

	function resize(){
       if( typeof( window.innerWidth ) == 'number' ) {
            myWidth = window.innerWidth;
            myHeight = window.innerHeight;
        } else if( document.documentElement && ( document.documentElement.clientWidth || 
        document.documentElement.clientHeight ) ) {
            myWidth = document.documentElement.clientWidth;
            myHeight = document.documentElement.clientHeight;
        } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
            myWidth = document.body.clientWidth;
            myHeight = document.body.clientHeight;
        }
        
    }
    $(window).resize(resize);
    resize();

	$("body").on("click",".modal", function(){
		if( $opened != null ) return false;

		showLayout();

		var $popup = $($(this).attr("data-block"));

		setTimeout(function(){
			$popup.css("display","block");

			setTimeout(function(){
				$popup.addClass("showed");
			},10);

			$opened = $popup;

			$popup.find("input").eq(0).focus();

			// scrollToBlock($popup);
			$popup.css("top",myHeight/2-$popup.height()/2);
		},320);

		return false;
	});

	$(".b-layout").click(function(){
		if( $opened != null )
			hideLayout();
	});

	$("body").on("click",".b-add-cart-detail,.modal-close",function(){
		hideLayout();
		

	});
	function showLayout(){
		$layout.css("display","block");
		setTimeout(function(){
			$layout.addClass("showed");
		},10);

		$("html").css("overflow","hidden");
	}

	function scrollToBlock(el){
		var scrollTo = el.offset().top - (myHeight-el.height())/2,
			scroll = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
		// if( $("body").sc )
		$("body, html").animate({
			scrollTop : scrollTo
		},300);
	}

	function hideLayout(){
		$opened.addClass("hide");
		$layout.removeClass("showed");
		setTimeout(function(){
			$opened.removeClass("showed").removeClass("hide").hide();
			$opened = null;
			$layout.hide();
		},500);
		$("html").css("overflow","auto");
		if(show_menu)
		$(".b-time-"+daytime).find(".b-add-butt").click();
	}

});