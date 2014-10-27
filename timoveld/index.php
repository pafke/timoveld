<?php
get_header(); ?>
<div id="iCreate">		
		<div id="iCreateText">I <span class="intro">Create</span> therefore I am.</div>
		<script src="<?php bloginfo('template_directory'); ?>/js/createFlip.js"></script>
		
	<img id="arrow" width="6%" height="6%" src="<?php bloginfo('template_directory'); ?>/images/arrow.svg">
	
	<script>
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
	</script>
</div>
	
<div id="iAm">
<div class="portret"></div>
	Hallo daar<br>
	Mijn naam is <em>Timo Veld</em><br>
	en ik maak <em>websites</em> en <em>animaties</em>
	test
</div>




<div id="mySkills">
	Om mijn <em>websites</em> en <em>animaties</em> vorm te geven<br> 
	maak ik gebruik van verschillende <em>technieken</em><br>
	Deze <em>technieken</em> beheers ik op verschillende <em>niveaus</em>

	<div id="skillContainer">
		<label>HTML(5)</label><div class="skillIndicator" data-skill="90"></div>
		<label>CSS(3)</label><div class="skillIndicator" data-skill="85"></div>
		<label>jQuery</label><div class="skillIndicator" data-skill="65"></div>
		<label>PHP</label><div class="skillIndicator" data-skill="40"></div>
		<label>Wordpress</label><div class="skillIndicator" data-skill="80"></div>
		<label>Woocommerce</label><div class="skillIndicator" data-skill="70"></div>
		<label>Photoshop</label><div class="skillIndicator" data-skill="90"></div>
		<label>Illustrator</label><div class="skillIndicator" data-skill="75"></div>
		<label>After Effects</label><div class="skillIndicator" data-skill="65"></div>
		<label>Cinema 4D</label><div class="skillIndicator" data-skill="70"></div>
		<label>Premiere</label><div class="skillIndicator" data-skill="70"></div>	
	</div>
</div>

<div id="myPortfolio">
	Een beter <em>beeld</em> krijg je waarschijnlijk van mijn online <em>portfolio</em>
	<h1>Web</h1>
	
		
</div>

<script>
$('.portfolioImage').click(function(){
	$(this).find('div').fadeToggle();
});
</script>


<script src="<?php bloginfo('template_directory'); ?>/js/scrollFunctions.js"></script>
<?php get_footer(); ?>
