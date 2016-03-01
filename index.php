<?php
/*
Designaholic Templates
Reciente
*/
?>

<?php get_header(); ?>

	<div class="container spacer"><?php


		if(is_search()) {
			echo '<h2>Resultados para: '.get_search_query().'</h2>';
		} else {
			echo '<h2>Reciente</h2>';
		}

		// Text Ads
		get_template_part('inc/ad_dh_dos');


		// World's Most Basic Loop
		if ( have_posts() ) : ?>
			<div class="row fluid"><?php
				while ( have_posts() ) {
					the_post();
					cards(4);
				} ?>
			</div><?php

			get_template_part('inc/pager');
		endif;


		// Img Ads
		patrocinadores(1); ?>

	</div>

<?php get_footer(); ?>
