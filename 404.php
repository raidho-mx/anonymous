<?php
/*
Designaholic Templates
Template Name: 404
*/
?>

<?php get_header(); ?>

	<div class="bloque_horizontal cat_cover" style="background-image: url('<?php bloginfo('template_url'); ?>/img/no-content.gif');">
		<div class="container">
			<h2>404</h2>
			<h1>Este contenido no esta disponible.</h1>
		</div>
	</div>

	<div class="container spacer">

		<h2>Artículos que te podrían interesar.</h2><?php

		$allPosts = new WP_Query('post_type=post&posts_per_page=8');

		// World's Most Basic Loop
		if ( $allPosts->have_posts() ) : ?>
			<div class="row fluid"><?php
				while ( $allPosts->have_posts() ) {
					$allPosts->the_post();
					cards(4);
				} ?>
			</div><?php
		endif;


		// Img Ads
		patrocinadores(1); ?>

	</div>

<?php get_footer(); ?>
