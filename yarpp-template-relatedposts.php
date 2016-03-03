<?php
/*
YARPP Template: Related Designaholic
Description: Requires a theme which supports post thumbnails
Author: Daniel (Raidho)
*/ ?>
<h2>Relacionado</h2>
<?php if (have_posts()):?>
<div class="row"><?php

	while (have_posts()) : the_post();
		if (has_post_thumbnail()):
			cards(6, 0);
		endif;
	endwhile; ?>
</div>

<?php else: ?>
<?php endif; ?>
