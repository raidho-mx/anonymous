<?php
/*
Designaholic Templates
Autore Individual
*/

	get_header();
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>


	<div class="container spacer">

		<h2>Autores: <?php echo $curauth->nickname; ?></h2>

		<div class="row autor_bio">

			<div class="five columns"><?php
				$img = get_field('usr_img', 'user_'.$curauth->ID);
				if($img) { ?>
					<img class="autor_pic" src="<?php echo $img['url']; ?>" alt="" /><?php
				} ?>
			</div>

			<div class="six columns">

				<blockquote class="autor_quote" cite="#">
					<?php the_field('usr_quote', 'user_'.$curauth->ID); ?>
				</blockquote>

				<?php the_field('large_bio', 'user_'.$curauth->ID); ?>
			</div>

		</div>

		<h3>Publicaciones por <?php echo $curauth->nickname; ?></h3><?php

		if ( have_posts() ) : ?>
		<div class="row fluid"><?php
			while ( have_posts() ) :
				the_post();
				cards(6, FALSE);
			endwhile; ?>
		</div><?php
		else: ?>
			<p><?php _e('No posts by this author.'); ?></p><?php
		endif;

		get_template_part('inc/pager');

		get_template_part('inc/patrocinadores'); ?>

	</div>

<?php get_footer(); ?>
