<?php

/*
 *	Functions
 */




	// 	Theme Supports

	add_theme_support( 'post-thumbnails' );
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

		function cards($columns){
			if($columns == '2') {
				$class = 'six';
			} elseif($columns == '3') {
				$class = 'four';
			} elseif($columns == '6') {
				$class = 'two';
			} else {
				$class = 'three';
			}

			$class .= ' columns articulo';
			$cats = get_the_category();

			if(has_category('galerias')) {
				$class .= ' galeria';
				$preTitle = '<span class="rojo_txt">Galeria:</span> ';
			} elseif(has_category('videos-creativos') || has_category('conferencias-videos-creativos') || has_category('entrevistas-videos-creativos') || has_category('procesos-videos-creativos')) {
				$class .= ' video';
				$preTitle = '<span class="rojo_txt">Videos:</span> ';
			} else {
				$preTitle = '';
			}


			?>
			<div class="<?php echo $class ?>">
				<a href="<?php get_the_permalink() ?>"><?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
					// <img src="'.bloginfo('template_url').'/img/placeholders/row_img1.jpg" alt="">
				} ?>
					<div class="meta">
						<span><?php
							foreach ($cats as $cat) {
								if($cat->name != 'Videos' AND $cat->name != 'Sin categoría' AND $cat->name != 'Galerias') echo $cat->name.' ';
							} ?>
						</span>
						<span> <?php the_time('d/m/y') ?></span>
					</div>
					<h4><?php echo $preTitle.' '.get_the_title(); ?></h4>
				</a>
			</div><?php
		}
