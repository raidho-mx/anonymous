<?php
/*
Designaholic Templates
Template Name: Reciente
*/
?>

<?php get_header(); ?>

	<div class="container spacer"><?php


		if(is_search()) {
			if(have_posts()) {
				echo '<h2>Resultados para: '.get_search_query().'</h2>';
			} else {
				echo '<h2>No encontramos nada relacionado a <span class="rojo_txt">'.get_search_query().'</span>.</h2>';
				$noSearch = TRUE;
			}
		} elseif(is_tag()) { ?>
			<h2><?php single_tag_title('Etiqueta: #'); ?></h2><?php
		} elseif(is_archive()) { ?>
			<h2>Archivo</h2><?php
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

		else :

			// If Empty Search Results
			$allPosts = new WP_Query('post_type=post&posts_per_page=8');

			if ( $allPosts->have_posts() ) : ?>
				<h3>Aquí hay unos posts recientes:</h3>
				<div class="row fluid"><?php
					while ( $allPosts->have_posts() ) {
						$allPosts->the_post();
						cards(4);
					} ?>
				</div><?php
			endif;
			wp_reset_query();

		endif;


		// Img Ads
		patrocinadores(1); ?>

	</div>

<?php get_footer(); ?>
