<?php
/*
Designaholic Templates
Ad DH 2
*/
?>

<!-- Ad horizontal --><?php

	$rows = get_field('txt_ads', 'option');
	$rand_row = $rows[ array_rand( $rows ) ];
	$img = $rand_row['img'];

	if($rows) : ?>

<div class="row ad_group">

	<div class="ad_dh_dos twelve columns">

		<div class="ad_thumb" style="background-image: url('<?php echo $img['url']; ?>')">
		</div>

		<div>
			<a href="<?php echo $rand_row['url']; ?>" target="_blank"><p><?php if($rand_row['title'])echo '<strong>'.$rand_row['title'].'</strong>'; ?> <?php echo $rand_row['description']; ?></p></a>
			<?php if( get_field('ads_link', 'option') ) echo '<div class="small_notice"><span>'.get_field('ads_link', 'option').'</span></div>'; ?>
		</div><?php

		if($rand_row['boton']) echo '<div><button>'.$rand_row['boton'].'</button></div>'; ?>

	</div>

</div><?php

	endif; ?>
