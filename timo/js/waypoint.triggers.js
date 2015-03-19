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
			$('.logofixed').fadeIn(500);
			$('.icon').removeClass('black');
		}else{
			$('.logofixed').fadeOut(100);
			$('.icon').addClass('black');
		}
	}
});
var waypoint = new Waypoint({
	element: document.getElementById('werk-scrollTo'),
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
function fadinstars (elem){
	elem.closest('.row').next().find('.stars').css('visibility','visible').hide().animate({left:200, opacity:"show"}, 200, "linear", function() {
		fadinstars($(this));
	});
}
var skillset = new Waypoint({
	element: document.getElementById('skilltrigger'),
	offset: '100%',
	handler: function(direction) {
		if(direction == 'down'){
			$('.skillset .row:first .stars').css('visibility','visible').hide().animate({left:200, opacity:"show"}, 200, "linear", function() {
				fadinstars($(this));
			});

		}else{
			$('.skillset .row .stars').css('visibility','hidden');
		}
	}
});