var waypoint = new Waypoint({
	element: document.getElementById('voorstellen-scrollTo'),
	handler: function(direction) {
		if(direction == 'down'){
			$('.logofixed').fadeIn(500);
		}else{
			$('.logofixed').fadeOut(100);
		}
	}
});
$('.skilllevel').css('width','0');			
var skillset = new Waypoint({
	element: document.getElementById('skilltrigger'),
	offset: '70%',
	handler: function(direction) {
		if(direction == 'down'){
			$('.skilllevel').each(function(){
				var lvlwidth = $(this).data('skilllvl');
				$(this).animate({
					width: lvlwidth+'%'
				},1500);
			});
		}else{
			
		}
	}
});