<?php
/**
 * @package folder
 */
?>

<?php 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-small' );
$url = $thumb['0']; 
?>

<div class="portfolioImage" style="background:url(<?php echo $url; ?>); background-size: cover;">
	<div class="portfolioDesc">
		<em><?php the_title(); ?></em>
		<?php the_excerpt(); ?><br>
		<a href="<?php the_permalink(); ?>">Lees meer</a>
	</div>
</div>




