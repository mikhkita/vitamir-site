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

	
	function whenScroll(){
		var scroll = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
		if( customHandlers["onScroll"] ){
			customHandlers["onScroll"](scroll);
		}
	}
	$(window).scroll(whenScroll);
	whenScroll();

	$(".fancy").each(function(){
		var $popup = $($(this).attr("data-block")),
			$this = $(this);
		$this.fancybox({
			padding : 0,
			content : $popup,
			openSpeed: 'fast',
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
				if( $this.attr("data-afterShow") && customHandlers[$this.attr("data-afterShow")] ){
					customHandlers[$this.attr("data-afterShow")]($this);
				}
			},
			beforeClose: function(){ 
				$("input.error").parent().removeClass("error");
				$("input.error,textarea.error").removeClass("error");
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

	$(".b-go").click(function(){
		var block = $( $(this).attr("data-block") ),
			off = $(this).attr("data-offset")||0;
		$("body, html").animate({
			scrollTop : block.offset().top-off
		},800);
		return false;
	});

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
	
	$('#calc').find("input[type=text]").mask('99?9',{placeholder:" "});
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
			$("#cal").text(MG_min+"-"+MG_max);
			$("#protein").text(protein_min+"-"+protein_max+" гр.");
			$("#carbo").text(carbo_min+"-"+carbo_max+" гр.");
			$("#fat").text(fat_min+"-"+fat_max+" гр.");
			$("#water").text((0.94*parseInt($("input[name=weight]").val())/30).toFixed(1)+" л.");
  		}
  		return false;
  	});

});