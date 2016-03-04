<?php
/*
Designaholic Templates
Header
*/
?>

<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/favicon.png">

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/resets.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/shame.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/slide_out_menu/component.css" />

	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>

	<?php wp_head(); ?>
	<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/scripts/modernizr.custom.js"></script>

</head>
<body <?php body_class($bclass); ?>>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<header>
		<nav id="top_menu">
			<div class="container">
				<div class="top_branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo_designaholic.jpg" alt="Designaholic"></a>
				</div>
				<div class="burger" id="burger">
					<div></div><div></div><div></div>
				</div><?php
				if(get_field('main_menu', 'options')) {
					echo '<ul id="list">';
					while (have_rows('main_menu', 'options')) {
						the_row();
						$check = get_sub_field('ext_url');
						$post = get_sub_field('page_link');

						if($check) {
							$link = get_sub_field('custom_link');
							$name = get_sub_field('name');
						} else {
							$link = get_the_permalink($post);
							$name = get_the_title($post);
						}
						echo '<li><a href="'.$link.'">'.$name.'</a></li>';
					}
					echo '</ul>';
				} ?>
				<div class="search" id="search">
					<a href="#">Buscar</a>
				</div>
			</div>
		</nav>

		<?php get_template_part('inc/top_slide_out_menu'); ?>

		<div class="searchbox">
			<form method="get" id="search_form" action="<?php bloginfo('home'); ?>"/>
				<input type="search" placeholder="Escribe aquí para buscar:" class="text" name="s">
				<input type="submit" class="submit" value="BUSCAR" />
			</form>
		</div>

	</header>
