var waypoint = new Waypoint({
	element: document.getElementById('basic-waypoint'),
	handler: function(direction) {
		if(direction == 'down'){
			$('.logofixed').fadeIn(500);
			$('.icon').addClass('black');
		}else{
			$('.logofixed').fadeOut(100);
			$('.icon').removeClass('black');
		}
	}
})