var waypoint = new Waypoint({
	element: document.getElementById('voorstellen-scrollTo'),
	handler: function(direction) {
		if(direction == 'down'){
			$('.logofixed').fadeIn(500);
			$('.icon').addClass('black');
		}else{
			$('.logofixed').fadeOut(100);
			$('.icon').removeClass('black');
		}
	}
});
var waypoint = new Waypoint({
	element: document.getElementById('skillset-scrollTo'),
	handler: function(direction) {
		if(direction == 'down'){
			$('.icon').removeClass('black');
		}else{
			$('.icon').addClass('black');
		}
	}
});
var waypoint = new Waypoint({
	element: document.getElementById('werk-scrollTo'),
	handler: function(direction) {
		if(direction == 'down'){
			$('.icon').addClass('black');
		}else{
			$('.icon').removeClass('black');
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