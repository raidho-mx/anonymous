<?php
/*
Designaholic Templates
Categorías
*/
?>

<?php get_header(); ?>

	<div class="container spacer">

		<h2><?php the_title(); ?></h2><?php


		// Text Ads
		get_template_part('inc/ad_dh_dos');


		$exCats = get_field('exclude_categories');
		$args = array(
			'orderby' => 'id',
			'hide_empty' => 1,
			'exclude' => $exCats
		);
		$categories = get_categories($args); ?>

		<div class="row fluid loop_cats">
			<div class="row fluid"><?php
			foreach ($categories as $cat) {

				$args2 = array("category" => $cat->cat_ID, 'posts_per_page' => 1);
				$posts = get_posts($args2); ?>

				<div class="four columns articulo">
					<a href="<?php echo get_category_link( $cat->cat_ID ); ?>"> <?php
						foreach($posts as $post) {
							echo get_the_post_thumbnail($post->ID, 'large');
						} ?>
						<h3><?php echo $cat->name ?></h3>
					</a>
				</div><?php

			} ?>
			</div>
		</div><?php


		// Img Ads
		get_template_part('inc/patrocinadores'); ?>

	</div>

<?php get_footer(); ?>
