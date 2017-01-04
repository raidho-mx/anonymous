<?php
/*
Designaholic Templates
Envía tu Proyecto
*/


	acf_form_head();
	get_header();

	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="pagina <?php echo $post->post_name; ?>">
		<div class="container spacer">
			<h2><?php the_title(); ?></h2>
			<div class="row">

				<div class="six columns">

					<!-- Ligas de Interés -->
					<?php get_template_part('inc/interes'); ?>
				</div>

				<div class="six columns">
					<?php the_content(); ?>
					<?php

					acf_form(array(
						'field_groups' => array(20579),
						'post_id'		=> 'new_post',
						'post_title'	=> true,
						'post_content'	=> true,
						'post_thumbnail'	=> true,
						'return'		=> home_url('enviaste-tu-proyecto'),
						'submit_value'	=> 'Enviar Proyecto',
						'uploader' => 'wp'
					)); ?>
				</div>

			</div>

			<!-- Termina row conteniendo las dos columnas del cuerpo -->
			<?php patrocinadores(1); ?>

		</div>
	</div>

<?php

endwhile;
get_footer(); ?>
