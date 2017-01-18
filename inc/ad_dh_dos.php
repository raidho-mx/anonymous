<?php

/*
 *	Designaholic Templates
 *	Ad DH 2
 */

	// Get Active ads & make a list
	$dh_ads = get_field('dh_ads', 'option');
	$cat_ads = get_field('cat_ads', 'option');
	$checkDH = checkActiveStripes($dh_ads);
	$checkCat = checkActiveStripes($cat_ads);
	$allChecked = array_merge($checkDH, $checkCat);

	// If on category, check if Sponsored
	if(is_category()) {
		$category = get_queried_object();
		$catID = $category->term_id;
		$hostedCat = search($allChecked, 'tax_rel', $catID);
		if(!empty($hostedCat)) {
			$lucky = array_rand($hostedCat, 1);
			$luckyAd = $hostedCat[$lucky];
		} else {
			$lucky = array_rand($allChecked, 1);
			$luckyAd = $allChecked[$lucky];
		}
	} else {
		$lucky = array_rand($allChecked, 1);
		$luckyAd = $allChecked[$lucky];
	}

	$adStripe = $luckyAd['stripe'][0];

	if(!empty($adStripe['url'])) {
		$adUrl = $adStripe['url'];
	} elseif(!empty($luckyAd['url'])) {
		$adUrl = $luckyAd['url'];
	} else {
		$adUrl = '#';
	}

	$unwanted_array = array(
	'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
	'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
	'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
	'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
	'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', ' '=>'_' );

	// $rows = get_field('txt_ads', 'option');
	// if($rows) $rand_row = $rows[ array_rand( $rows ) ];

	// $img = $rand_row['img'];
	$rawId = $luckyAd['gtm_id'];
	$cleanId = strtr( $rawId, $unwanted_array );
	$stripedId = strtolower( $cleanId );

	if(!empty($adStripe['title'])) : ?>

<div class="row ad_group">

	<div<?php if($stripedId) echo ' id="'.$stripedId.'"'; ?> class="ad_dh_dos twelve columns">

		<div class="ad_thumb" style="background-image: url('<?php echo $adStripe['img']; ?>')">
		</div>

		<div>
			<a href="<?php echo $adUrl; ?>"<?php if($stripedId) echo ' id="'.$stripedId.'" data-title="'.$adStripe['title'].'"'; ?> class="register_ga complex" onClick="ga('send', 'event', 'complex: <?php echo $rawId; ?>', 'click', location.pathname);" target="_blank"><?php
				if(!empty($adStripe['title'])) echo '<strong>'.$adStripe['title'].'</strong>'; ?> <?php echo $adStripe['description']; ?>
			</a>
			<?php if( get_field('ads_link', 'option') ) echo '<div class="small_notice"><span>'.get_field('ads_link', 'option').'</span></div>'; ?>
		</div><?php

		if($adStripe['boton']) { ?>
			<div>
				<a href="<?php echo $adUrl; ?>"<?php if($stripedId) echo ' id="'.$stripedId.'" data-title="'.$adStripe['title'].'"'; ?> class="register_ga complex" onClick="ga('send', 'event', 'complex: <?php echo $rawId; ?>', 'click', location.pathname);" target="_blank">
					<button class="ad_complex_button"><?php echo $adStripe['boton']; ?></button>
				</a>
			</div><?php
		} ?>

	</div>

</div><?php

	endif; ?>
