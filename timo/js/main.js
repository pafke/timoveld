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

/* Analytics */
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-61240200-1', 'auto');
ga('send', 'pageview');