<?php
get_header(); ?>
		<section class="fullscreen maincolorBG">
			<div class="centermsg">
				I <span class="forcebreak" data-typer-targets="Create,Develop,Render,Design,Debug,Visualise,Animate">Design</span>
				therefore I am.
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
				<img id="scrolldown" src="<?php echo get_template_directory_uri(); ?>/img/godown.svg" alt="downarrow">
			</div>
		</section>

		<section class="content" id="voorstellen-scrollTo">
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
				Momenteel werk ik bij <a href="http://www.bigimpact.com" target="_blank">Big Impact.</a><br>
				Maar voor een <em>interessant project</em>,<br>
				kun je altijd <a class="contact-scrollTo" href="javascript:void(0)">contact</a> met mij opnemen.
			</p>
			<p>
				<a class="buttonLight" href="<?php echo get_template_directory_uri(); ?>/resources/CurriculumVitae_TimoVeld.doc">Download mijn CV</a>
			</p>
			<p>
				<a href="http://nl.linkedin.com/in/timoveld" target="_blank" class="iconfont">&#xe807;</a>
			</p>
			<p>
				<a href="http://stackoverflow.com/users/3008011/user3008011" target="_blank" class="iconfont">&#xe806;</a>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/img/self.svg" class="roundimg self" alt="timoveld">
		</section>

		<section class="content maincolorBG" id="skillset-scrollTo">
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

			<div class="skillset" id="skilltrigger">
				<div class="skilltable">
					<?php
						$args = array(
							'post_type' => 'skill',
							'order'   => 'ASC'
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						$skillkey = 'skill_meta';
						$skill = get_post_meta($post->ID, $skillkey, TRUE);
					?>

					<div class="row">
						<div class="skillname">
							<?php the_title(); ?>
						</div>
						<div class="skilllevel" data-skilllvl="<?php echo ($skill*10); ?>">

						</div>
					</div>

					<?php
						endwhile;
					?>
				</div>
				<a class="showmore" href="javascript:void(0)">Toon alles</a>
			</div>
		</section>

		<section class="content" id="werk-scrollTo">
			<h2>Werk</h2>
			<div id="container">
			<?php $query = new WP_Query( 'cat=3'.'&orderby=rand'); ?>
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

				<div class="item">
					<?php the_post_thumbnail( 'portfolio-small' ); ?>
					<div class="overlay">
						<div class="cell">

							<h3><?php the_title();?></h3>
							<?php the_content(); ?>
							<?php
							$key = 'video';
							$key1 = 'external';
							$video = get_post_meta($post->ID, $key, TRUE);
							$external = get_post_meta($post->ID, $key1, TRUE);
							if($video != '') {?>

							<a class="swipebox" href="http://www.youtube.com/watch?v=<?php echo $video ?>" title="<?php the_title(); ?>">
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

							<a class="swipebox" href="<?php echo $url; ?>" title="<?php the_title(); ?>">
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

		<section class="content maincolorBG" id="gunwerk-scrollTo">
			<h2>Gunwerk</h2>
			<div class="centercontainer">
				<div class="desc-gun">
					<p>
						Heb je een case liggen die een <em>creatieve aanpak</em> vereist?<br>
						Maandelijks ben ik <em>+/- 4 uur</em> beschikbaar voor <em>"gunwerk"</em>.<br>
						Gunwerk kan van alles inhouden. Van <em>logo animaties</em> tot ingewikkelde <em>bugfixes</em>.<br>
						Mijn enige wens is dat het een <em>interessant project</em> is en dat het rond de 4 uur in beslag neemt.
					</p>
					<p>
						Gunwerk wordt gegund. Dit houdt in dat er <em>niet</em> voor <em>betaald</em> hoeft te worden. <br>
						Echter, mocht er een kratje bier voor mijn deur verschijnen met een bedank briefje. Dan worden er verder geen vragen gesteld.
					</p>
					<p>
						Wil je weten of jouw project in aanmerking komt? <em>Stuur een berichtje</em> met een korte beschrijving van je project.
					</p>
				</div>
				<div class="gunform">
					<form>
						<div class="group">
							<input type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Naam</label>
						</div>
						<div class="group">
							<input type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Email</label>
						</div>
						<div class="group">
							<textarea id="Message" rows="5" name="Message" required></textarea>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Project beschrijving</label>
						</div>
						<input type="submit" value="Gunnen man!">
					</form>
				</div>
				<div class="clear"></div>
			</div>
		</section>
		<?php get_footer(); ?>