<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Pictorico
 */
?>

	</div><!-- #content -->	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'pictorico' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'pictorico' ), 'WordPress' ); ?></a>
			<span class="sep"> &bull; </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'pictorico' ), 'Pictorico', '<a href="https://wordpress.com/themes/" rel="designer">WordPress.com</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
