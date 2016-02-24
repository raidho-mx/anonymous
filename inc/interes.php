<?php
/*
Designaholic Templates
Ligas de Intereses
*/
?>

<ul class="ligas_interes"><?php

	$rows = get_field('inner_links', 'option');
	if(get_field('inner_links_shuffle', 'option')) shuffle($rows);
	$i = 0;

	foreach($rows as $row) {
		$image = $row['img'];
		?><li>
			<?php if($image) echo '<div style="background-image: url('.$image['sizes']['large'].')"></div>'; ?>
			<p><a href="<?php  echo $row['link']; ?>"><?php echo $row['title']; ?></a></p>
		</li><?php
		if (++$i == 3) break;

	} ?>

</ul>
