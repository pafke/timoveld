$('#scrolldown').click(function(){	
	$('html,body').animate({scrollTop: $(window).height()},1000);
});

$('.mobilenav a').click(function(){	
	$(".mobilenav").fadeToggle(500);
	$(".top-menu").toggleClass("top-animate");
	$(".mid-menu").toggleClass("mid-animate");
	$(".bottom-menu").toggleClass("bottom-animate");
	var identifier = $(this).attr('class');
	
	console.log(identifier);
	if(identifier == 'top-scrollTo'){
		$('html,body').animate({scrollTop: 0},1000);
	}else if(identifier == 'contact-scrollTo'){
		$('html,body').animate({scrollTop: $(document).height()},1000);
	}
	else{
		var distanceTop = $('#'+identifier).offset().top;
		$('html,body').animate({scrollTop: distanceTop},1000);
	}
});