<?php
/*
 *	Designaholic Templates
 *	Menú (superior) desplegable para categorías
 */

	// Get Active ads & make a list
	$cat_ads = get_field('cat_ads', 'option');
	$checkCat = checkActiveStripes($cat_ads);
	// print_r($cat_ads);
	// echo '--------';
	// print_r($checkCat);

if(get_field('secondary_menu', 'options')) : ?>

<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
	<div class="cbp-hsinner fondo_rojo">
		<ul class="cbp-hsmenu"><?php
		while (have_rows('secondary_menu', 'options')) :
			the_row();
			$term = get_sub_field('page_link');
			$hostedCat = search($checkCat, 'tax_rel', $term->term_id); ?>
			<li>
				<a href="#"><?php echo $term->name; ?></a><?php

				if(!empty($hostedCat)) {
					$lucky = array_rand($hostedCat, 1);
					$luckyAd = $hostedCat[$lucky];
					$ppp = 3;
				} else {
					$ppp = 4;
				}
				$taxQ = new WP_Query( array( 'category_name' => $term->slug, 'posts_per_page' => $ppp ) );

				if ( $taxQ->have_posts() ) : ?>

				<ul class="cbp-hssubmenu row fluid"><?php
					if(!empty($hostedCat)) { ?>
						<li class="three columns articulo">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo $luckyAd['squares'][0]['img']; ?>">
							</a>
						</li><?php
					}
					while ( $taxQ->have_posts() ) {
						$taxQ->the_post();
						$class = checkClass();
						$preTitle = checkTag(); ?>
						<li class="three columns articulo <?php echo $class; ?>">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('usual'); ?>
								<small><?php echo $preTitle.' '.get_the_title(); ?></small>
							</a>
						</li><?php
					} ?>
				</ul><?php

				else :
					// no posts found
				endif;
				wp_reset_postdata(); ?>


			</li><?php
		endwhile; ?>
		</ul>
	</div>
</nav><?php

endif; ?>
