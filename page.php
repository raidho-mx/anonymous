<?php
/*
Designaholic Templates
Page
*/
?>

<?php get_header();

	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="pagina <?php echo $post->post_name; ?>">
		<div class="container spacer">
			<h2><?php the_title(); ?></h2>
			<div class="row">

				<div class="six columns">
					<h3>
						<?php the_field('excerpt'); ?>
					</h3>

					<!-- Ligas de Interés -->
					<?php get_template_part('inc/interes'); ?>
				</div>

				<div class="six columns">
					<?php the_content(); ?>
				</div>

			</div>

			<!-- Termina row conteniendo las dos columnas del cuerpo -->
			<?php patrocinadores(1); ?>

		</div>
	</div>

<?php

	endwhile;
	get_footer(); ?>
