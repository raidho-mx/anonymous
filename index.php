<?php
/*
Designaholic Templates
Reciente
*/
?>

<?php get_header(); ?>

	<div class="container spacer">

		<h2>Reciente</h2><?php

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
		get_template_part('inc/patrocinadores'); ?>

	</div>

<?php get_footer(); ?>
