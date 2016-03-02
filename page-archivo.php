<?php
/*
Designaholic Templates
Categorías
*/
?>

<?php get_header(); ?>

	<div class="container spacer">

		<h2><?php
		if(get_field('or_title')) {
			the_field('or_title');
		} else {
			the_title();
		} ?></h2><?php


		// Text Ads
		get_template_part('inc/ad_dh_dos');


		$inTags = get_field('include_tags');
		$args = array(
			'orderby' => 'id',
			'hide_empty' => 1,
			'include' => $inTags
		);
		$tags = get_tags( $args ); ?>

		<div class="row fluid"><?php

			foreach ($tags as $tag) {


				// get last post's Img
				$args2 = array('tag' => $tag->slug, 'posts_per_page' => 1);
				$posts = get_posts($args2);
				$i = 1;
				foreach($posts as $post) {
					$lastPostImg = get_the_post_thumbnail_url($post->ID, 'large');
				}


				// get category img
				$taxImg = get_field('img', 'post_tag_'.$tag->term_id);


				// if has:  1 Cat image.  2 last post.  3 placeholder img
				if($taxImg) {
					$taxImgUrl = wp_get_attachment_image_src($taxImg['ID'], 'large');
					$mainImg = $taxImgUrl[0];
				} elseif($lastPostImg) {
					$mainImg = $lastPostImg;
				} else {
					$fallback = get_field('fallback_img', 'option');
					$mainImg = $fallback['sizes']['large'];
				}

				$tag_link = get_tag_link( $tag->term_id ); ?>

				<div class="six columns articulo"><?php
					echo '<a href='.$tag_link.' title='.$tag->name.' class='.$tag->slug.'>'; ?>
						<img src="<?php echo $mainImg; ?>">
						<h3><?php echo $tag->name; ?></h3>
						<p><?php echo $tag->description; ?></p>
					</a>
				</div><?php

			} ?>
		</div><?php


		// Img Ads
		patrocinadores(1); ?>

	</div>

<?php get_footer(); ?>
