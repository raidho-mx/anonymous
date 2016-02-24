<?php
/*
Designaholic Templates
Menú (superior) desplegable para categorías
*/

if(get_field('secondary_menu', 'options')) : ?>

<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
	<div class="cbp-hsinner fondo_rojo">
		<ul class="cbp-hsmenu"><?php
		while (have_rows('secondary_menu', 'options')) :
			the_row();
			$term = get_sub_field('page_link'); ?>
			<li>
				<a href="#"><?php echo $term->name; ?></a><?php


				$taxQ = new WP_Query( array( 'category_name' => $term->name, 'posts_per_page' => 4 ) );


				if ( $taxQ->have_posts() ) : ?>

				<ul class="cbp-hssubmenu row fluid"><?php
					while ( $taxQ->have_posts() ) {
						$taxQ->the_post();
						$class = checkClass();
						$preTitle = checkTag(); ?>
						<li class="three columns articulo <?php echo $class; ?>">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
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
