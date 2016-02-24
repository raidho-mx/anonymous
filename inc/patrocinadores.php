<?php
/*
Designaholic Templates
Patrocinadores Designaholic
*/
?>

<!-- Patrocinadores Designaholic --><?php

	$rows = get_field('img_ads', 'option');
	if($rows) : ?>

<div class="ads_patrocinadores bloque_horizontal">
	<h3>Patrocinadores Designaholic</h3>
	<ul><?php

		shuffle($rows);
		$i = 0;
		foreach($rows as $row) {
			$image = $row['img'];
			?><li>
				<a href="<?php echo $row['url']; ?>" title="<?php echo $row['description']; ?>" target="_blank">
					<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $row['description']; ?>" width="300" />
				</a>
			</li><?php
			if (++$i == 3) break;

		} ?>
	</ul>
</div><?php
	endif; ?>
