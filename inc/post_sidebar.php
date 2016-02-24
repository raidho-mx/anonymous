<?php
/*
Designaholic Templates
Single Post Sidebar
*/
?>

<!-- Sidebar Single Post -->
<div class="sidebar_post three columns offset-by-one">

	<h3>Publicidad</h3><?php

	$rows = get_field('img_ads', 'option');

	shuffle($rows);
	$i = 0;
	foreach($rows as $row) {
		$image = $row['img'];
		?><div class="ad_group">
				<div class="ad_google_uno">
					<a href="<?php echo $row['url']; ?>" title="<?php echo $row['description']; ?>" target="_blank">
						<img src="<?php echo $image['sizes']['large']; ?>" width="300" alt="<?php echo $row['description']; ?>">
					</a>
				</div>
			</div><?php
		if (++$i == 1) break;
	}


	// Recent
	$recent = new WP_Query( array( 'posts_per_page' => 4 ) );

	if ( $recent->have_posts() ) : ?>
		<h3>Reciente</h3><?php
		while ( $recent->have_posts() ) {
			$recent->the_post();
			cards(0);
		}
	endif;
	wp_reset_postdata(); ?>


</div>
