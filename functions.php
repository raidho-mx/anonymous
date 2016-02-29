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




		function cards($columns, $meta = TRUE, $i){
			if($columns == '0') 	{ $class = ''; }
			elseif($columns == '2') { $class = 'six columns'; }
			elseif($columns == '3') { $class = 'four columns'; }
			elseif($columns == '6') { $class = 'two columns'; }
			elseif($columns == '363') {
				if($i == 2) {
					$class = 'six columns';
				} else {
					$class = 'three columns';
				}
			}
			else { $class = 'three columns'; }

			$class .= ' articulo';
			$class .= checkClass();
			$cats = get_the_category();
			$preTitle = checkTag();

			?>
			<div class="<?php echo $class.' '.$i; ?>">
				<a href="<?php the_permalink(); ?>"><?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					} if($meta) {
						echo '<div class="meta"><span>';
						foreach ($cats as $cat) {
							if($cat->name != 'Videos' AND $cat->name != 'Sin categoría' AND $cat->name != 'Galerias') echo $cat->name.' ';
						}
						echo '</span><span>'. get_the_time('d/m/y') .'</span></div>';
					}
					if($columns == '6') {
						echo '<h5>'.$preTitle.' '.get_the_title().'</h5>';
					} else {
						echo '<h4>'.$preTitle.' '.get_the_title().'</h4>';
					} ?>
				</a>
			</div><?php
		}

		function patrocinadores($title = FALSE) {
			$rows = get_field('img_ads', 'option');
			if($rows) : ?>

		<div class="ads_patrocinadores bloque_horizontal"><?php
			if($title) echo '<h3>Patrocinadores Designaholic</h3>'; ?>
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
			endif;
		}
