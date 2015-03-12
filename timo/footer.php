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
		
		
		
	</body>
</html>