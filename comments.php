<?php
/*
Designaholic Templates
Post Comentarios
* /
?>

<!-- Comentarios -->



</div> */ ?>

<?php if ( post_password_required() ) {
	return;
} ?>

<div class="post_comentarios fondo_gris_calido bloque_horizontal">
	<div class="container spacer"><?php
		if ( have_comments() ) : ?>
		<h2><?php
			printf( _nx( 'Un comentario en “%2$s”', '%1$s comentarios en “%2$s”', get_comments_number(), 'Comentarios'),
				number_format_i18n( get_comments_number() ), get_the_title() ); ?>
		</h2><?php
		endif; ?>


		<div class="row">

			<div class="five columns">
				<?php comment_form(); ?>
			</div><?php



			if ( have_comments() ) : ?>
			<div class="six columns offset-by-one">
				<?php /*
				<ul class="comentarios_listado">
					<li>
						<p><strong>Paco</strong> comentó el 31 de enero, 2016 (<strong>15:23</strong>):</p>
						<p>El app que utilizan para visualizar su mobiliario es un tema en sí mismo, me parece que son admirables al tomar en cuenta que ponen tanto cuidado...</p>
					</li>
					<li>
						<p><strong>Rogelio</strong> comentó el 31 de enero, 2016 (<strong>14:16</strong>):</p>
						<p>Buen artículo, lo comparto.</p>
					</li>
				</ul>*/
					wp_list_comments( array(
						'short_ping'  => true,
						'avatar_size' => 50,
					) );
					?>
			</div><?php
			else :
				echo '<div class="six columns offset-by-one">No hay comentarios.</div>';
			endif;


			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<div class="six columns offset-by-one">
				<?php _e( 'Comments are closed.' ); ?>
			</div><?php
			endif; ?>
		</div>
	</div>
</div>
