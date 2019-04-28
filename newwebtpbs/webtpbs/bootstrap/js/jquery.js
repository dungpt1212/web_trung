$(document).ready(function(){
	stt = 0;
	start_img = $("img.slide:first").attr("stt");
	end_img = $("img.slide:last").attr("stt");
	$("img.slide").each(function(){
		if ($(this).is(':visible'))
			stt = $(this).attr("stt");
	});
	$("#next").click(function(){
		if (stt == end_img){
			stt = -1;
		}
		next = ++stt;
		$("img.slide").hide();
		$("img.slide").eq(next).show();
	});
	$("#pre").click(function(){
		if (stt == start_img) {
			stt = end_img;
			pre = stt++;
		}
		pre = --stt;
		$("img.slide").hide();
		$("img.slide").eq(pre).show();
	});
	setInterval(function(){
		$("#next").click()
	},8000);
});

 $(document).ready(function(){
	 $('#cuon').click(function(){
		 $('body,html').animate({scrollTop:0},600);
		 return false;
	 })
 });


$(window).scroll(function(){
		if( $(window).scrollTop() == 0 ) {
			$('#cuon').stop(false,true).fadeOut(200);
		}else{
			$('#cuon').stop(false,true).fadeIn(200);
				}
});

$(window).scroll(function(){
	vitri = $(this).scrollTop();
	console.log(vitri);
	if(vitri>=400){
		$('.menu').addClass('bt_xuong');
	}else{
		$('.menu').removeClass('bt_xuong');
	}
});
