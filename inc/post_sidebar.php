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
			adSingleImg($row);
			if (++$i == 1) break;
		}
	else : ?>
		<h3>Publicidad</h3>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- Single sidebar -->
			<ins class="adsbygoogle"
			style="display:block"
			data-ad-client="ca-pub-5768279375233007"
			data-ad-slot="6373282778"
			data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		<?php
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
			$rawId = get_sub_field('gtm_id');
		}

	endwhile;


	if($adTitle) {

		$unwanted_array = array(
			'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
			'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
			'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
			'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
			'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', ' '=>'_' );
		$cleanId = strtr( $rawId, $unwanted_array );
		$stripedId = strtolower( $cleanId ); ?>

		<h3>Publicidad</h3>
		<div class="ad_group columns articulo ">
			<a href="<?php echo $adUrl; ?>" id="<?php echo $stripedId ?>" data-title="<?php echo $rawId; ?>" class="register_ga complex" onClick="ga('send', 'event', 'complex: <?php echo $rawId; ?>', 'click', location.pathname);" target="_blank">
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
				adSingleImg($row);
				if (++$i == 1) break;
			}
		endif;

	} ?>

</div>
