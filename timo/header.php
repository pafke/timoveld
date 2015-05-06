<!DOCTYPE html>
<html lang="nl">
	<head>		
		<?php wp_head(); ?>
		<title><?php echo get_bloginfo('name'); ?></title>
	</head>
	<body>
		<div class="navcontainer">
			<div class="material--burger">
				<span></span>
			</div>
			<nav class="mobilenav">
				<ul>
					<li><a class="top-scrollTo" href="javascript:void(0)">Wij staan bovenaan</a></li>
					<li><a class="voorstellen-scrollTo" href="javascript:void(0)">Even voorstellen</a></li>
					<li><a class="skillset-scrollTo" href="javascript:void(0)">I got skills!</a></li>
					<li><a class="werk-scrollTo" href="javascript:void(0)">Werk</a></li>
					<li><a class="contact-scrollTo" href="javascript:void(0)">Contact</a></li>
				</ul>
			</nav>
		</div>		

		<div class="logofixed">
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo_TV.svg" alt="logo_timoveld">
		</div>