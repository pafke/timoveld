/* Menu tonen/hiden */
$(document).ready(function () {
	$('.icon').click(function () {
		$(".mobilenav").toggleClass("shownav");
		$(".top-menu").toggleClass("top-animate");
		$(".mid-menu").toggleClass("mid-animate");
		$(".bottom-menu").toggleClass("bottom-animate");
	});
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
