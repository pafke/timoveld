		<section class="content contact">
			<div class="contactform">
				<h2>Contact</h2>
				<a href="tel:0643511371">T. 06 435 11 371</a>
				<a href="mailto:mail@timoveld.nl">M. mail@timoveld.nl</a>
				<p>
					Voor vragen, eventuele samenwerking, of gewoon omdat het kan, mag je altijd contact met mij opnemen.
				</p>
			</div>
		</section>

		<?php wp_footer(); ?>

		<script>
			$(document).ready(function () {
				$(".mobilenav").hide();
				$(".icon").click(function () {
					$(".mobilenav").fadeToggle(500);
					$(".top-menu").toggleClass("top-animate");
					$(".mid-menu").toggleClass("mid-animate");
					$(".bottom-menu").toggleClass("bottom-animate");
				});
			});
		</script>

		<script>
			$(document).ready(function () {
				var $container = $('#container');
				// initialize
				$container.masonry({
					isFitWidth: true,
					gutter: 25,
					itemSelector: '.item'
				});
			});
		</script>

		<script>
		  $(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto({
				show_title: false,
				social_tools: false,
				default_width: $(window).width(),
				default_height: $(window).height(),
				horizontal_padding: 0
			});
		  });
		</script>

		<script>
			$(document).ready(function(){
				$.typer.options.typeSpeed = 120;
				$.typer.options.typerInterval = 4000;
				$('[data-typer-targets]').typer();
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