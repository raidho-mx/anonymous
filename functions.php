<?php

/*
 *	Functions
 */




	// 	Theme Supports

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	// add_editor_style('css/wysiwyg.css');

	add_image_size( 'usual', 630, 340, true );	// thumb : 300   med : 600   large : 1280×1080


	// Hide "customize" button

		function remove_customize_page(){
			global $submenu;
			unset($submenu['themes.php'][6]); // remove customize link
		}
		add_action( 'admin_menu', 'remove_customize_page');

		function wpse200296_before_admin_bar_render(){
			global $wp_admin_bar;
			$wp_admin_bar->remove_menu('customize');
		}
		add_action( 'wp_before_admin_bar_render', 'wpse200296_before_admin_bar_render' );


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

		function checkClass($id = null) {
			if(has_category('galerias', $id)) {
				$class = ' galeria';
			} elseif(has_category('videos-creativos', $id) || has_category('conferencias-videos-creativos', $id) || has_category('entrevistas-videos-creativos', $id) || has_category('procesos-videos-creativos', $id)) {
				$class = ' video';
			} else {
				$class = '';
			}
			return $class;
		}


		function checkTag($linked = false, $id = null) {
			if(has_category('galerias', $id)) {
				$idObj = get_category_by_slug('galerias');
				$realID = $idObj->term_id;
				$catName = get_cat_name($realID);
				$catUrl = get_category_link($realID);
				if($linked) {
					$preTitle = '<a href="'. $catUrl .'" class="rojo_txt">'. $catName .':</a> ';
				} else {
					$preTitle = '<span class="rojo_txt">'. $catName .':</span> ';
				}
			} elseif(has_category('videos-creativos', $id) || has_category('conferencias-videos-creativos', $id) || has_category('entrevistas-videos-creativos', $id) || has_category('procesos-videos-creativos', $id)) {
				$idObj = get_category_by_slug('videos-creativos');
				$realID = $idObj->term_id;
				$catName = get_cat_name($realID);
				$catUrl = get_category_link($realID);
				if($linked) {
					$preTitle = '<a href="'. $catUrl .'" class="rojo_txt">'. $catName .':</a> ';
				} else {
					$preTitle = '<span class="rojo_txt">'. $catName .':</span> ';
				}
			} else {
				$preTitle = '';
			}
			return $preTitle;
		}




		function cards($columns = null, $i = null, $meta = TRUE){
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
						the_post_thumbnail('usual');
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




		$unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', ' '=>'_' );




		function patrocinadores($title = false) {

			global $unwanted_array;
			$rows = get_field('img_ads', 'option');
			if($rows) : ?>

		<div class="ads_patrocinadores bloque_horizontal"><?php
			if($title) echo '<h3>Patrocinadores Designaholic</h3>'; ?>
			<ul><?php

				shuffle($rows);
				$i = 0;
				foreach($rows as $row) {
					$image = $row['img'];
					$rawId = $row['gtm_id'];
					$cleanId = strtr( $rawId, $unwanted_array );
					$stripedId = strtolower( $cleanId );
					?><li>
						<a href="<?php echo $row['url']; ?>"<?php if($stripedId) echo ' id="'.$stripedId.'" data-title="'.$rawId.'"'; ?> class="register_ga" onClick="ga('send', 'event', 'imagen: <?php echo $rawId; ?>', 'click', location.pathname);" title="<?php echo $row['description']; ?>" target="_blank">
							<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $row['description']; ?>" width="300" />
						</a>
					</li><?php
					if (++$i == 3) break;

				} ?>
			</ul>
		</div><?php
			endif;
		}






		function adSingleImg($row = false) {

			global $unwanted_array;
			$image = $row['img'];
			$rawId = $row['gtm_id'];
			$cleanId = strtr( $rawId, $unwanted_array );
			$stripedId = strtolower( $cleanId );

			?><div class="ad_group">
					<div class="ad_google_uno">
						<a href="<?php echo $row['url']; ?>"<?php if($stripedId) echo ' id="'.$stripedId.'" data-title="'.$rawId.'"'; ?> class="register_ga" title="<?php echo $row['description']; ?>" onClick="ga('send', 'event', 'imagen: <?php echo $rawId; ?>', 'click', location.pathname);" target="_blank">
							<img src="<?php echo $image['sizes']['large']; ?>" width="300" alt="<?php echo $row['description']; ?>">
						</a>
					</div>
				</div><?php

		}






	// Edit JETPACK: Related Posts

		// Hide Native Posts
		function jetpackme_remove_rp() {
			if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
				$jprp = Jetpack_RelatedPosts::init();
				$callback = array( $jprp, 'filter_add_target_to_dom' );
				remove_filter( 'the_content', $callback, 40 );
			}
		}
		add_filter( 'wp', 'jetpackme_remove_rp', 20 );


		// Custom Markup
		function jetpackme_custom_related( $atts ) {
			$posts_titles = array();

			if ( class_exists( 'Jetpack_RelatedPosts' ) && method_exists( 'Jetpack_RelatedPosts', 'init_raw' ) ) {
				$related = Jetpack_RelatedPosts::init_raw()
					->set_query_name( 'jetpackme-shortcode' ) // Optional, name can be anything
					->get_for_post_id(
						get_the_ID(),
						array( 'size' => 4 )
					);

				if ( $related ) { ?>

					<div class="post_relacionado">
						<h2>Relacionado</h2>
						<div class="row"><?php

					foreach ( $related as $result ) {
						// Get the related post IDs
						$rpID = get_post( $result[ 'id' ] );
						$preTitle = checkTag(FALSE, $rpID); ?>
						<div class="two columns articulo<?php print checkClass($rpID); ?>">
							<a href="<?php print get_permalink($rpID); ?>"> <?php
								if ( has_post_thumbnail($rpID) ) {
									$url = wp_get_attachment_url( get_post_thumbnail_id($rpID), 'usual' ); ?>
									<img src="<?php print_r($url); ?>"><?php
								}
								echo '<h5>'.$preTitle.' '.$rpID->post_title.'</h5>'; ?>
							</a>
						</div><?php
					} ?>

						</div>
					</div><?php

				}
			}

		}
		// Create a [jprel] shortcode
		add_shortcode( 'jprel', 'jetpackme_custom_related' );








	/* Shortcodes */

		// FB Albums

		function fba_engine( $atts ) {
			$a = shortcode_atts( array(
				'url' => '',
			), $atts );

			if($a['url']) {

				$mystring = $a['url'];
				$findme = 'embedsocial';
				$pos = strpos($mystring, $findme);

				if ($pos === false) {
					list($shit,$rawGold) = explode('a.', $a['url']);
					list($gold,$shat) = explode('.', $rawGold);
					$hilo = '<iframe class="fb_album" src="//embedsocial.com/facebook_album/album_photos/'.$gold.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>';

				} else {
					$hilo = '<iframe class="fb_album" src="'.$mystring.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>';

				}

			} else {
				// $hilo = '<a href="'.$a['url'].'">View on Facebook</a>'; Imposible
				$hilo = '';
			}


			return $hilo;

		}
		add_shortcode( 'fbalbum', 'fba_engine' );




		// Designaholic Quote

		function dh_quote_engine( $atts ) {
			$a = shortcode_atts( array(
				'quote' => '',
				'author' => '',
				'about' => '',
				'thumb' => ''
			), $atts );

			$hilo = '<div class="post_quote">';

				if($a['quote']) $hilo .= '<blockquote>"'. $a['quote'] .'"</blockquote>';

			$hilo .= '<div class="quote_meta">';

				if($a['thumb']) $hilo .= '<div class="quote_pic" style="background-image: url('. $a['thumb'] .')"></div>';
				if($a['author'] OR $a['about']) $hilo .= '<p>';
					if($a['author']) $hilo .= '<span class="rojo_txt">'. $a['author'] .'</span>';
					if($a['about']) $hilo .= $a['about'];
				if($a['author'] OR $a['about']) $hilo .= '</p>';

			$hilo .= '</div></div>';


			return $hilo;

		}
		add_shortcode( 'dh_quote', 'dh_quote_engine' );




		// Check if is active

		function checkActive($ads) {
			$arr = array();
			if($ads) {
				foreach($ads as $row) {
					if($row['active'] == 1) {	// Is active.
						if($row['squares'][0]['img'] != '') { 	// Has image.
							array_push($arr, $row);
						}
					}
				}
			}
			return $arr;
		}
