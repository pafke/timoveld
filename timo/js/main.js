/* Menu tonen/hiden */
$('.material--burger').on('click', function() {
	$(this).toggleClass('material--arrow');
	$('.mobilenav').toggleClass('menuactive');
	$('.fulloverlay').fadeToggle();
});

/* Portfolio items sorteren */
$(document).ready(function () {
	var $container = $('#container');
	// initialize
	$container.masonry({
		isFitWidth: true,
		gutter: 25,
		itemSelector: '.item'
	});
});

/* Lightbox activeren */
;( function( $ ) {
	$( '.swipebox' ).swipebox();
} )( jQuery );

/* Typer functie intro zin */
$(document).ready(function(){
	$.typer.options.typeSpeed = 120;
	$.typer.options.typerInterval = 4000;
	$('[data-typer-targets]').typer();
});

/* Toon alle skills toggle */
$('.showmore').click(function(){
	if($('.skillset .clickedshow').length){
		$('.clickedshow').fadeOut().removeClass('clickedshow');
		$(this).html('Toon alles');
	}else{
		$(this).parent().find('.row:hidden').hide().fadeIn().css('display','table-row').addClass('clickedshow');
		$(this).html('Toon minder');
	}
});

/* SVG image self interactief maken */
$( "svg" ).mousemove(function( event ) {
	var mouseX = event.pageX;
	var mouseY = event.pageY;
	var theRangeSquared = 75 * 75;
	var maxOffset = 20;

	$('g').each(function(){
		var position = $(this).position();
		var coordX = position.left;
		var coordY = position.top;
		var dx = coordX - mouseX;
		var dy = coordY - mouseY;
		var distanceSquared = (dx * dx + dy * dy);
		var tx = 0, ty = 0;
		if (distanceSquared < theRangeSquared && distanceSquared != 0)
		{
			var shift = maxOffset * (theRangeSquared - distanceSquared) / theRangeSquared;
			var distance = Math.sqrt(distanceSquared);
			tx = shift * dx / distance;
			ty = shift * dy / distance;
		}
		$(this).attr('transform', "translate(" + tx + " " + ty + ")");
	});
});

/* Analytics */
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-61240200-1', 'auto');
ga('send', 'pageview');