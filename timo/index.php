<?php
get_header(); ?>
		<section class="fullscreen table maincolorBG">
			<div class="centermsg">


				I <span class="forcebreak" data-typer-targets="Create,Develop,Render,Design,Debug,Visualise,Animate">Design</span>
				therefor I am.
				<br>
				<svg id="logo" version="1.1" viewBox="0 0 290 290"  >
					<g>
						<circle fill="none" class="outer" stroke="#FFF" stroke-width="2" stroke-miterlimit="10" cx="145" cy="145.001" r="141.501"/>
						<g>
							<polygon fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" points="145.041,205.997 45.23,106.188
								244.852,106.188 		"/>

								<line fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="145.041" y1="205.997" x2="145.041" y2="106.188"/>
						</g>
					</g>
				</svg>
			</div>
			<div class="absolutecenter">
				<img id="scrolldown" src="<?php echo get_template_directory_uri(); ?>/img/godown.svg">
			</div>
		</section>

		<section class="content" id="basic-waypoint">
			<h2>Hallo daar</h2>
			<p>
				Mijn naam is <em>Timo Veld</em><br>
				en ik maak <em>websites</em> en <em>animaties.</em>
			</p>
			<p>
				<em>Mooie dingen</em> maken vind ik gaaf.<br>
				Problemen <em>oplossen</em> doe ik graag.
			</p>
			<p>
				Momenteel werk ik bij <a href="">Big Impact.</a><br>
				Maar voor een <em>interessant project</em>,<br>
				Kun je altijd <a href="">contact</a> met mij opnemen.
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/img/self.svg" class="roundimg self">
		</section>

		<section class="content maincolorBG">
			<h2>Mijn skillset</h2>
			<p>
				Mooie dingen maken en problemen oplossen bereik je niet zomaar.
			</p>
			<p>
				Gedurende mijn studie <em>ICT Multimedia design</em>, mijn periode als <em>freelancer</em> en tijdens mijn functie bij <em>Big Impact</em> heb ik een hoop <em>ervaring</em> opgedaan.
			</p>
			<p>
				Een <em>overzicht</em> van mijn <em>skillset</em>
			</p>

			<div class="table skillset" id="skilltrigger">

				<?php
					$args = array( 'post_type' => 'skill');
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					$skillkey = 'skill_meta';
					$skill = get_post_meta($post->ID, $skillkey, TRUE);
				?>

				<div class="row">
					<div class="cell">
						<?php the_title(); ?>
					</div>
					<div class="cell stars">
						<?php echo str_repeat("<span class='star starfull'></span>", $skill); ?><?php echo str_repeat("<span class='star starempty'></span>", (10-$skill)); ?>
					</div>
				</div>

				<?php
					endwhile;
				?>

			</div>
		</section>

		<section class="content">
			<h2>Werk</h2>
			<div id="container">
			<?php $query = new WP_Query( 'cat=6'.'&orderby=rand'); ?>
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

				<div class="item">
					<?php the_post_thumbnail( 'portfolio-small' ); ?>
					<div class="overlay">
						<div class="cell">

							<h3><?php the_title();?></h3>
							<p>
								<?php the_content(); ?>
							</p>
							<?php
							$key = 'video';
							$key1 = 'external';
							$video = get_post_meta($post->ID, $key, TRUE);
							$external = get_post_meta($post->ID, $key1, TRUE);
							if($video != '') {?>

							<a href="http://www.youtube.com/watch?v=<?php echo $video ?>" rel="prettyPhoto" title="<?php the_title(); ?>">
								Bekijk video
							</a>

							<?php
							}
							else if($external != ''){
							?>

							<a href="<?php echo $external; ?>" target="_blank">
								Bekijk website
							</a>

							<?php
							}
							else{
							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							?>

							<a href="<?php echo $url; ?>"  rel="prettyPhoto" title="<?php the_title(); ?>">
								Bekijk afbeelding
							</a>

							<?php } ?>

						</div>
					</div>
				</div>

			<?php endwhile; else : ?>
				<p><?php _e( 'Er is iets mis gegaan.' ); ?></p>
			<?php endif; ?>

			</div>
		</section>
		<?php get_footer(); ?>