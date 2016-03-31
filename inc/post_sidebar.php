<?php
/*
Designaholic Templates
Single Post Sidebar
*/
?>

<!-- Sidebar Single Post -->
<div class="sidebar_post three columns offset-by-one"><?php

	$rows = get_field('img_ads', 'option');

	if($rows) : ?>
		<h3>Publicidad</h3><?php

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
	endif;




	// Recent
	$recent = new WP_Query( array( 'posts_per_page' => 4 ) );

	if ( $recent->have_posts() ) : ?>
		<h3>Reciente</h3><?php
		while ( $recent->have_posts() ) {
			$recent->the_post();
			cards(0);
		}
	endif;
	wp_reset_postdata();





	$cats = get_the_category();
	$postCatIDs = array();

	foreach ($cats as $cat) {
	$catUrl = get_category_link($cat->term_id);
		if($cat->name == 'Videos' OR $cat->name == 'Sin categoría' OR $cat->name == 'Galerias') {
		} else {
			$postCatIDs[] = $cat->term_id;
		}
	}

	while(have_rows('txt_ads', 'option')) :
		the_row();
		$hasRel = get_sub_field('tax_rel');

		if(in_array($hasRel, $postCatIDs)) {
			$adTitle = get_sub_field('title');
			$adImg = get_sub_field('img');
			$adMore = get_sub_field('description');
			$adButton = get_sub_field('boton');
			$adUrl = get_sub_field('url');
		}

	endwhile;


	if($adTitle) { ?>

		<h3>Publicidad</h3>
		<div class="ad_group columns articulo ">
			<a href="<?php echo $adUrl; ?>">
				<img width="600" src="<?php echo $adImg['sizes']['large']; ?>">
				<h4><strong><?php echo $adTitle; ?></strong> <?php echo $adMore; ?></h4>
				<?php if($adButton) echo '<div><button>'.$adButton.'</button></div>'; ?>
			</a>
			<?php if( get_field('ads_link', 'option') ) echo '<div class="meta"><span>'.get_field('ads_link', 'option').'</span></div>'; ?>
		</div><?php


	} else {

		if($rows) : ?>
			<h3>Publicidad</h3><?php

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
		endif;

	} ?>

</div>
