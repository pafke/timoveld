		<section class="content contact">
			<div class="contactform" id="contact">
				<h2>Contact</h2>
				<?php
				if ( wp_is_mobile() ) {
				?>
				<a href="tel:0643511371">T. 06 435 11 371</a>
				<?php
				} else {
				?>
				<a href="javascript:void(0)">T. 06 435 11 371</a>
				<?php
				}
				?>
				<a href="mailto:mail@timoveld.nl">M. mail@timoveld.nl</a>
				<p>
					Voor vragen, eventuele samenwerking, of gewoon omdat het kan, mag je altijd contact met mij opnemen.
				</p>
			</div>
		</section>
		
		
		

		<?php wp_footer(); ?>
		<script>
			// Elements to inject
			var mySVGsToInject = document.querySelectorAll('img.inject-me');

			// Do the injection
			SVGInjector(mySVGsToInject);
		</script>
		
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
		<script>
		WebFont.load({
			google: {
				families: ['Raleway:100,400,600']
			}
		});
		</script>

		<?php
		if ( wp_is_mobile() ) {
		?>
		<script>
			$(document).ready(function(){
				$('.item').click(function(){
					$(this).toggleClass('toggleMenu');
				});
			});
		</script>
		<?php
		}
		?>
	</body>
</html>