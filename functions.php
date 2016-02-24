<?php

/*
 *	Functions
 */




	// 	Theme Supports

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_editor_style('css/wysiwyg.css');



	/*  ACF - Options  */

		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page(array(
				'page_title' 	=> 'Opciones Generales',
				'menu_title'	=> 'Opciones',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
			acf_add_options_page(array(
				'page_title' 	=> 'Publicidad Directa',
				'menu_title'	=> 'Publicidad',
				'menu_slug' 	=> 'theme-ads-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
		}




	/*  Loop  */

		function checkClass() {
			if(has_category('galerias')) {
				$class = ' galeria';
			} elseif(has_category('videos-creativos') || has_category('conferencias-videos-creativos') || has_category('entrevistas-videos-creativos') || has_category('procesos-videos-creativos')) {
				$class = ' video';
			} else {
				$class = '';
			}
			return $class;
		}
		function checkTag() {
			if(has_category('galerias')) {
				$preTitle = '<span class="rojo_txt">Galeria:</span> ';
			} elseif(has_category('videos-creativos') || has_category('conferencias-videos-creativos') || has_category('entrevistas-videos-creativos') || has_category('procesos-videos-creativos')) {
				$preTitle = '<span class="rojo_txt">Videos:</span> ';
			} else {
				$preTitle = '';
			}
			return $preTitle;
		}

		function cards($columns){
			if($columns == '0') 	{ $class = ''; }
			elseif($columns == '2') { $class = 'six columns'; }
			elseif($columns == '3') { $class = 'four columns'; }
			elseif($columns == '6') { $class = 'two columns'; }
			else { $class = 'three columns'; }

			$class .= ' articulo';
			$class .= checkClass();
			$cats = get_the_category();
			$preTitle = checkTag();

			?>
			<div class="<?php echo $class ?>">
				<a href="<?php the_permalink() ?>"><?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
					// add description(alt) & size?
				} ?>
					<div class="meta">
						<span><?php
							foreach ($cats as $cat) {
								if($cat->name != 'Videos' AND $cat->name != 'Sin categoría' AND $cat->name != 'Galerias') echo $cat->name.' ';
							} ?>
						</span>
						<span> <?php the_time('d/m/y') ?></span>
					</div><?php
					if($columns == '6') {
						echo '<h5>'.$preTitle.' '.get_the_title().'</h5>';
					} else {
						echo '<h4>'.$preTitle.' '.get_the_title().'</h4>';
					} ?>

				</a>
			</div><?php
		}




	// Comments

		function format_comment($comment, $args, $depth) {

			$GLOBALS['comment'] = $comment; ?>

			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

			<div class="comment-intro">
			<em>commented on</em>
			<a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></a>
			<em>by</em>
			<?php printf(__('%s'), get_comment_author_link()) ?>
			</div>

			<?php if ($comment->comment_approved == '0') : ?>
			<em><php _e('Your comment is awaiting moderation.') ?></em><br />
			<?php endif; ?>

			<?php comment_text(); ?>

			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
			</li><?php
		}
