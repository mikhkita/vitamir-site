function getNextField($form){
	var j = 1;
	while( $form.find("input[name="+j+"]").length ){
		j++;
	}
	return j;
}

var customHandlers = [];

$(document).ready(function(){	
	var rePhone = /^\+\d \(\d\d\d\) \d\d\d-\d\d-\d\d$/,
		tePhone = '+7 (999) 999-99-99';

	if( $("body").find(".phone,[name=phone]").length ){
		$("body").find(".phone,[name=phone]").mask(tePhone,{placeholder:"_"});
	}

	$.validator.addMethod('customPhone', function (value) {
		return rePhone.test(value);
	});

	$(".ajax").parents("form").each(function(){     
		$(this).validate({
			validClass: "success",
			rules: {
				email: 'email',
				phone: 'customPhone'
			}
		});
		if( $(this).find("input[name=phone]").length ){
			$(this).find("input[name=phone]").mask(tePhone,{placeholder:"_"});
		}
		
	});

	$("#b-order-form").each(function(){     
		$(this).validate({
			validClass: "success",
			rules: {
				email: 'email',
				phone: 'customPhone'
			}
		});
		if( $(this).find("input[name=phone]").length ){
			$(this).find("input[name=phone]").mask(tePhone,{placeholder:"_"});
		}
		
	});

	function whenScroll(){
		var scroll = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
		if( customHandlers["onScroll"] ){
			customHandlers["onScroll"](scroll);
		}
	}
	$(window).scroll(whenScroll);
	whenScroll();

	fancy_init();

	if(window.location.hash=="#login") {
		$("a[data-block='#b-popup-system']").click();
	}

	if(window.location.hash=="#error") {
		var popup = $("#b-popup-2").clone();
		popup.find("h3").text("Сообщение");
		popup.find("h4").text("Вы ввели неверный промокод!");
		$.fancybox.open({
			content : popup,
			padding : 0
		});
	}

	if(window.location.hash=="#again") {
		var popup = $("#b-popup-2").clone();
		popup.find("h3").text("Сообщение");
		popup.find("h4").text("Вы уже использовали промокод!");
		$.fancybox.open({
			content : popup,
			padding : 0
		});
	}
	function menu(obj,animTime) {
		var block = $( obj.attr("data-block") ),
			off = obj.attr("data-offset")||0;
		$("body, html").animate({
			scrollTop : block.offset().top-off
		},animTime);
		return false;
	}

	$(".b-go").click(function(){
		return menu($(this),800);
	});

	// $( window ).load(function() {
		if(window.location.hash == '#eat-select') {
			menu($(".b-go[data-block='.b-3 .b-back']"),0);
		}
		if(window.location.hash == '#healthy-food') {
			menu($(".b-go[data-block='.b-2']"),0);
		}
		if(window.location.hash == '#diet') {
			menu($(".b-go[data-block='.b-5']"),0);
		}
		if(window.location.hash == '#delivery') {
			menu($(".b-go[data-block='.b-6']"),0);
		}
		if(window.location.hash == '#address') {
			menu($(".b-go[data-block='#map_canvas']"),0);
		}
	// });
	$(".fancy-img").fancybox({
		padding : 0
	});
	
	$(".ajax").parents("form").submit(function(){
		$("input[name='phone'].success").parent("div").removeClass("error");
		$("input[name='phone'].error").parent("div").addClass("error");
  		if( $(this).valid() ){
  			var $this = $(this),
  				$thanks = $($this.attr("data-block"));

  			if( $this.attr("data-beforeAjax") && customHandlers[$this.attr("data-beforeAjax")] ){
				customHandlers[$this.attr("data-beforeAjax")]($this);
			}

  			$.ajax({
			  	type: $(this).attr("method"),
			  	url: $(this).attr("action"),
			  	data:  $this.serialize(),
				success: function(msg){
					if(msg=='1' || msg=='0') {
						if( msg == "1" ){
							$form = $($this.attr("data-block"));
						}else{
							$form = $("#b-popup-error");
						}

						if( $this.attr("data-afterAjax") && customHandlers[$this.attr("data-afterAjax")] ){
							customHandlers[$this.attr("data-afterAjax")]($this);
						}

						$this.find("input[type=text],textarea").val("");
						$.fancybox.open({
							content : $form,
							padding : 0
						});
					} else {
						// $.parseJSON(msg);
						console.log(msg);
					}	
				}
			});
  		}
  		return false;
  	});
	
	$("#login-form,#registration-form,.get-promo,#promocode-form").validate({
		validClass: "success",
		rules: {
			phone: 'customPhone'
		}
	});
	if( $(this).find(".phone").length ){
		$(this).find(".phone").mask(tePhone,{placeholder:"_"});
	}


	$("#login-form").submit(function(){
		var form = $(this);
  		if( $(this).valid() ){
  			$.ajax({
			  	type: form.attr("method"),
			  	url: form.attr("action"),
			  	data:  form.serialize(),
				success: function(msg){
					var json = JSON.parse(msg);
					if(json.result == "success") {
						if(json.redirect == "reload") window.location.reload(true); else { window.location.replace(json.redirect); window.location.reload(true); };
					}else{
						if( json.message ){
							alert(json.message);
						}else{
							alert("Неизвестная ошибка авторизации");
						}
					}
				}
			});
  		}
  		return false;
  	});

	$("#change-password,#registration-form,.get-promo").submit(function(){
		var form = $(this);
  		if( $(this).valid() ){
  			$.ajax({
			  	type: form.attr("method"),
			  	url: form.attr("action"),
			  	data:  form.serialize(),
			  	beforeSend: function() {
			  		form.find("input,button").prop("disabled",true);
			  	},
				success: function(msg){
					var message = JSON.parse(msg);
					var popup = $("#b-popup-2").clone();
					popup.find("h3").text("Сообщение");
					popup.find("h4").text(message.result);
					$.fancybox.open({
						content : popup,
						padding : 0
					});
					form.find("input,button").prop("disabled",false);
					form.find("input[type='text']").val("");
				}
			});
  		}
  		return false;
	});
	
	$("#promocode-form").submit(function(){
		var form = $(this);
  		if( $(this).valid() ){
  			$.ajax({
			  	type: form.attr("method"),
			  	url: form.attr("action"),
			  	data:  form.serialize(),
			  	beforeSend: function() {
			  		form.find("input,button").prop("disabled",true);
			  	},
				success: function(msg){
					var message = JSON.parse(msg);
					var popup = $("#b-popup-2").clone();
					popup.find("h3").text("Сообщение");
					if(message.result != "0") {
						if(message.result == "1") {
							popup.find("h4").text("Вы успешно использовали промокод!");
							$.fancybox.open({
								content : popup,
								padding : 0,
								afterClose: function () {
									window.location.hash = "";
									window.location.reload(true);
								}
							});
						} else {
							popup.find("h4").text(message.result);
							$.fancybox.open({
								content : popup,
								padding : 0
							});
						}
					} else {
						$('a[data-block="#b-popup-system"]').click();
						$("#login-promo").val($("input[name='promocode']").val());
					}
					form.find("input,button").prop("disabled",false);
				}
			});
  		}
  		return false;
	});

	$("#b-order-form,.get-promo").submit(function(){
		$("input[name='phone'].success").parent("div").removeClass("error");
		$("input[name='phone'].error").parent("div").addClass("error");
  		if( !$(this).valid() ) return false;
	});
	
	$('#calc input[type=text]').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
	// $('#calc').find("input[type=text]").mask('99?9',{placeholder:" "});
	$("#calc").submit(function(){
  		if( $(this).valid() ){
  			if($("input[name=sex]:checked").val()=='male') {
				var HB = (66.47 + 13.75*parseInt($("input[name=weight]").val())+5*parseInt($("input[name=growth]").val())-6.74*parseInt($("input[name=age]").val()))*parseFloat($("select[name=lifestyle] option:selected").val());
				var MG = (9.99*parseInt($("input[name=weight]").val())+6.25*parseInt($("input[name=growth]").val())-4.92*parseInt($("input[name=age]").val())+5)*parseFloat($("select[name=lifestyle] option:selected").val());
			} else if($("input[name=sex]:checked").val()=='female') {
				var HB = (655.1 + 9.6*parseInt($("input[name=weight]").val())+1.85*parseInt($("input[name=growth]").val())-4.68*parseInt($("input[name=age]").val()))*parseFloat($("select[name=lifestyle] option:selected").val());
				var MG = (9.99*parseInt($("input[name=weight]").val())+6.25*parseInt($("input[name=growth]").val())-4.92*parseInt($("input[name=age]").val())-161)*parseFloat($("select[name=lifestyle] option:selected").val());
			} 
			HB = Math.round(HB);
			MG = Math.round(MG);
			if($("input[name=goal]:checked").val()=='decrease') {
				var MG_min = Math.round(0.8*MG);
				var MG_max = Math.round(0.9*MG);

				var protein_min = Math.round(MG_min*0.25/4);
				var carbo_min = Math.round(MG_min*0.4/4);
				var fat_min = Math.round(MG_min*0.25/9);

				var protein_max = Math.round(MG_max*0.30/4);
				var carbo_max = Math.round(MG_max*0.50/4);
				var fat_max = Math.round(MG_max*0.3/9);
			}
			if($("input[name=goal]:checked").val()=='normal') {
				var MG_min = Math.round(0.95*MG);
				var MG_max = Math.round(1.05*MG);

				var protein_min = Math.round(MG_min*0.25/4);
				var carbo_min = Math.round(MG_min*0.45/4);
				var fat_min = Math.round(MG_min*0.25/9);

				var protein_max = Math.round(MG_max*0.35/4);
				var carbo_max = Math.round(MG_max*0.55/4);
				var fat_max = Math.round(MG_max*0.3/9);
			}
			if($("input[name=goal]:checked").val()=='increase') {
				var MG_min = Math.round(1.1*MG);
				var MG_max = Math.round(1.2*MG);

				var protein_min = Math.round(MG_min*0.3/4);
				var carbo_min = Math.round(MG_min*0.45/4);
				var fat_min = Math.round(MG_min*0.25/9);

				var protein_max = Math.round(MG_max*0.35/4);
				var carbo_max = Math.round(MG_max*0.55/4);
				var fat_max = Math.round(MG_max*0.3/9);
			}

			$("#HB").text(HB);
			$("#MG").text(MG);
			$("#cal,#cal-2").text(MG_min+"-"+MG_max);
			$("#protein,#protein-2").text(protein_min+"-"+protein_max+" гр.");
			$("#carbo,#carbo-2").text(carbo_min+"-"+carbo_max+" гр.");
			$("#fat,#fat-2").text(fat_min+"-"+fat_max+" гр.");
			$("#water").text((0.94*parseInt($("input[name=weight]").val())/30).toFixed(1)+" л.");
  		}
  		return false;
  	});

});

function fancy_init() {
		$(".fancy").each(function(){
			var $popup = $($(this).attr("data-block")),
				$this = $(this);
			$this.fancybox({
				padding : 0,
				content : $popup,
				fitToView: false,
				helpers: {
		         	overlay: {
		            	locked: true 
		         	}
		      	},
				beforeShow: function(){
					$popup.find(".custom-field").remove();
					if( $this.attr("data-value") ){
						var name = getNextField($popup.find("form"));
						$popup.find("form").append("<input type='hidden' class='custom-field' name='"+name+"' value='"+$this.attr("data-value")+"'/><input type='hidden' class='custom-field' name='"+name+"-name' value='"+$this.attr("data-name")+"'/>");
					}
					if( $this.attr("data-beforeShow") && customHandlers[$this.attr("data-beforeShow")] ){
						customHandlers[$this.attr("data-beforeShow")]($this);
					}
				},
				afterShow: function(){
					$popup.find("input[type='text'],input[type='number']").eq(0).focus();
					if( $this.attr("data-afterShow") && customHandlers[$this.attr("data-afterShow")] ){
						customHandlers[$this.attr("data-afterShow")]($this);
					}
				},
				beforeClose: function(){
					if( $this.attr("data-beforeClose") && customHandlers[$this.attr("data-beforeClose")] ){
						customHandlers[$this.attr("data-beforeClose")]($this);
					}
				},
				afterClose: function(){
					if( $this.attr("data-afterClose") && customHandlers[$this.attr("data-afterClose")] ){
						customHandlers[$this.attr("data-afterClose")]($this);
					}
				}
			});
		});
	}