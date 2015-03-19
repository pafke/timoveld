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

