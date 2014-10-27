	$('#arrow').click(function(){
		$('html,body').animate({scrollTop: $("header").offset().top},1000);
	});
	
	(function pulse(back) {
			$('#arrow').animate(
				{
					opacity: (back) ? 1 : 0.5,
					height: (back) ? "6%" : "7%",
					width: (back) ? "6%" : "7%",
					'margin-left': (back) ? "-3%" : "-3.5%"
				}, 900, function(){pulse(!back)});
		})(false);