/* Menu tonen/hiden */
$('.material--burger').on('click', function() {
	$(this).toggleClass('material--arrow');
	$('.mobilenav').toggleClass('menuactive');
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

/* Analytics */
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-61240200-1', 'auto');
ga('send', 'pageview');