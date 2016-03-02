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


				// get last post's Img
				$args2 = array("category" => $cat->cat_ID, 'posts_per_page' => 1);
				$posts = get_posts($args2);
				foreach($posts as $post) {
					$lastPostImg = get_the_post_thumbnail_url($post->ID, 'large');
				}


				// get category img
				$catImg = get_field('img', 'category_'.$cat->cat_ID);


				// if has:  1 Cat image.  2 last post.  3 placeholder img
				if($catImg) {
					$catImgUrl = wp_get_attachment_image_src($catImg['ID'], 'large');
					$mainImg = $catImgUrl[0];
				} elseif($lastPostImg) {
					$mainImg = $lastPostImg;
				} else {
					$fallback = get_field('fallback_img', 'option');
					$mainImg = $fallback['sizes']['large'];
				} ?>

				<div class="four columns articulo">
					<a href="<?php echo get_category_link( $cat->cat_ID ); ?>">
						<img src="<?php echo $mainImg; ?>">
						<h3><?php echo $cat->name ?></h3>
					</a>
				</div><?php

			} ?>
			</div>
		</div><?php


		// Img Ads
		patrocinadores(1); ?>

	</div>

<?php get_footer(); ?>
