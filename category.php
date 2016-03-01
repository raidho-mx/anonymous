<?php
/*
Designaholic Templates
Reciente
*/


	get_header();
	$category = get_queried_object();
	$catID = $category->term_id;

	$catImg = get_field('img', 'category_'.$catID);

	if($catImg) {
		$mainImg = $catImg['url'];
	} else {
		$mainImg = 'http://40.media.tumblr.com/5a64f8e10906552642483a9f0645104f/tumblr_o1ac9dY13u1ujxyzao1_1280.jpg';
	} ?>

	<div class="bloque_horizontal cat_cover" style="background-image: url(<?php echo $mainImg; ?>);">
		<div class="container">
			<h1><?php single_cat_title(); ?></h1>
		</div>
	</div>

	<div class="container spacer"><?php


		global $paged;
		global $query_string;

		while(have_rows('txt_ads', 'option')) :
			the_row();
			$hasRel = get_sub_field('tax_rel');

			if($catID == $hasRel) {
				$adTitle = get_sub_field('title');
				$adImg = get_sub_field('img');
				$adMore = get_sub_field('description');
				$adButton = get_sub_field('boton');
				$adUrl = get_sub_field('url');
			}

		endwhile;


		if($paged == 0) :

			if($catID == $hasRel) {
				$first_row = new WP_Query( $query_string . '&posts_per_page=2' );
				$second_row = new WP_Query( $query_string . '&posts_per_page=10&offset=2' );
			} else {
				$first_row = new WP_Query( $query_string . '&posts_per_page=3' );
				$second_row = new WP_Query( $query_string . '&posts_per_page=9&offset=3' );
			}


			echo '<div class="row">';
			if ( $first_row->have_posts() ) :
				while ( $first_row->have_posts() ) {
					$first_row->the_post();
					cards(3);
				}
			endif;
			wp_reset_postdata(); ?>


			<div class="four columns articulo ">
				<a href="<?php echo $adUrl; ?>">
					<img width="600" src="<?php echo $adImg['sizes']['large']; ?>">
					<h4><strong><?php echo $adTitle; ?></strong> <?php echo $adMore; ?></h4>
					<?php if($adButton) echo '<div><button>'.$adButton.'</button></div>'; ?>
				</a>
				<?php if( get_field('ads_link', 'option') ) echo '<div class="meta"><span>'.get_field('ads_link', 'option').'</span></div>'; ?>
			</div><?php




			echo '</div>';




			// Text Ads
			get_template_part('inc/ad_dh_dos');


			// World's Most Basic Loop
			if ( $second_row->have_posts() ) : ?>
				<div class="row fluid"><?php
					while ( $second_row->have_posts() ) {
						$second_row->the_post();
						cards(4);
					} ?>
				</div><?php

				get_template_part('inc/pager');
			endif;





		else :

			// Text Ads
			get_template_part('inc/ad_dh_dos');

			if ( have_posts() ) : ?>
				<div class="row fluid"><?php
					while ( have_posts() ) {
						the_post();
						cards(4);
					} ?>
				</div><?php

				get_template_part('inc/pager');
			endif;

		endif;

		// Img Ads
		patrocinadores(1); ?>

	</div>

<?php get_footer(); ?>
