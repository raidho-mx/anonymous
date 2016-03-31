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
		<h3><?php
			printf( _nx( 'Un comentario en “%2$s”', '%1$s comentarios en “%2$s”', get_comments_number(), 'Comentarios'),
				number_format_i18n( get_comments_number() ), get_the_title() ); ?>
		</h3><?php
		endif; ?>


		<div class="row">

			<div class="five columns"><?php

				$comments_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' =>	'<input id="author" name="author" type="text" value="' .
									esc_attr( $commenter['comment_author'] ) . '" placeholder="' .
									__( 'Tu Nombre' ) . ' ' . ( $req ? ' *' : '' ) . '" size="30"' . $aria_req . ' />',
						'email' =>	'<input id="email" name="email" type="email" value="' .
									esc_attr( $commenter['comment_author'] ) . '" placeholder="' .
									__( 'Tu Correo' ) . ' ' . ( $req ? ' *' : '' ) . '" size="30"' . $aria_req . ' />',
						'url'    => '' ) ),
						'label_submit' => 'Comentar',
						'title_reply' => '',
						'title_reply_to' => '',
						'title_reply_before' => '',
						'title_reply_after' => '',
						'comment_notes_after' => '',
						'comment_field' => '<textarea id="comment" name="comment" placeholder="' . _x( 'Tus comentarios', 'noun' ) . '" aria-required="true"></textarea>',
				);

				comment_form($comments_args); ?>
			</div><?php



			if ( have_comments() ) : ?>
			<div class="six columns offset-by-one">
				<ul class="comentarios_listado">
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
				</ul>
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
