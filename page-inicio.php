<?php
/*
Designaholic Templates
Index
*/
?>

<?php get_header(); ?>


<?php


if( have_rows('home_modules') ):

	while ( have_rows('home_modules') ) : the_row();

		if( get_row_layout() == 'ftd_block' ):

			$post = get_sub_field('ftd_posts');
			$p_qeue = new WP_Query(array('post__in' => $post));
			$imgCount = A;

			if($p_qeue->have_posts()) : ?>


			<div id="home_destacado_principal" class="fondo_rojo">
				<div id="animacion_contenedor" class="container home-slider"><?php

				while($p_qeue->have_posts()) :
					$p_qeue->the_post();
					$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
					<div>
					<div>
						<div class="anim_imagen" id="imgSrc<?php echo $imgCount; ?>">
							<style>
								#home_destacado_principal #animacion_contenedor #imgSrc<?php echo $imgCount++; ?> {background-image: url(<?php echo $imgUrl; ?>) !important;}
							</style>
						</div>
						<a href="<?php the_permalink(); ?>">
							<div class="big_title">
								<h1 class="huge"><?php the_title(); ?></h1>
							</div>
						</a>
					</div>
				</div><?php

				endwhile; ?>

				</div>
			</div><?php
			endif;
			wp_reset_postdata();




		elseif( get_row_layout() == 'columns_block' ):

			$post = get_sub_field('col_posts');
			$c_qeue = new WP_Query(array('p' => $post));

			while($c_qeue->have_posts()) :
				$c_qeue->the_post();
				$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

			<div class="columnas_home fondo_azul bloque_horizontal">
				<div class="columnas_autor_foto">
					<img src="<?php echo $imgUrl; ?>" alt="">
				</div>
				<div class="container spacer columnas_quote">
					<h2>Columnas Designaholic</h2>
					<blockquote><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_sub_field('quote'); ?></a></blockquote>
					<p class="color_gris_claro"><?php the_sub_field('author'); ?></p>
				</div>
			</div><?php

			endwhile;
			wp_reset_postdata();




		elseif( get_row_layout() == 'tax_block' ):

			if(get_sub_field('choose') == 'tags') {
				$selTermID = get_sub_field('tax');
				$args = array( 'tag' => $selTermID->slug, 'posts_per_page' => 3 );
				$neue_q = new WP_Query( $args );
			} else {
				$selTermID = get_sub_field('cats');
				$args = array( 'cat' => $selTermID->term_id, 'posts_per_page' => 3 );
				$neue_q = new WP_Query( $args );
			} ?>

			<div class="container spacer">
				<h2><?php
					if(get_sub_field('choose') == 'tags') {
						$noSpaces = str_replace(' ', '', $selTermID->name);
						$hashPos = strpos($noSpaces, '#');
						if ($hashPos === 0) {
							echo $noSpaces;
						} else {
							echo '#'.$noSpaces;
						}
					} else {
						echo $selTermID->name;
					} ?></h2><?php

				$count = 0;
				if ( $neue_q->have_posts() ) : ?>
				<div class="row fluid"><?php
					while ( $neue_q->have_posts() ) {
						$neue_q->the_post();
						$count++;
						cards(363, $count, TRUE);
					} ?>
				</div><?php
				else :
					echo '<p>Nope</p>';
				endif;
				wp_reset_postdata(); ?>
			</div><?php




		elseif( get_row_layout() == 'ads_block' ):

			$choose = get_sub_field('arrangement');

			// echo $choose;
			if($choose == 'three') {

				patrocinadores();


			} elseif($choose == 'two' OR $choose == 'two_google') { ?>

				<div class="container spacer">
					<div class="row home_ads_uno ad_group">
						<div class="ten columns offset-by-one"><?php


						$rows = get_field('txt_ads', 'option');
						$rand_row = $rows[ array_rand( $rows ) ];
						$img = $rand_row['img'];

						if($rows) : ?>
							<div class="ad_dh_uno">
								<div>
									<a href="<?php echo $rand_row['url']; ?>"><img src="<?php echo $img['sizes']['large']; ?>" alt=""></a>
								</div>
								<div>
									<div>
										<a href="<?php echo $rand_row['url']; ?>" target="_blank"><h4><?php if($rand_row['title'])echo '<strong>'.$rand_row['title'].'</strong>'; ?> <?php echo $rand_row['description']; ?></h4></a>
									</div>
									<?php if( get_field('ads_link', 'option') ) echo '<div class="small_notice"><span>'.get_field('ads_link', 'option').'</span></div>'; ?>
								</div>
							</div><?php
						endif;


						$rows = get_field('img_ads', 'option');
						$rand_row = $rows[ array_rand( $rows ) ];
						$imgAd = $rand_row['img']; ?>

							<div class="ad_google_uno">
								<img src="<?php echo $imgAd['sizes']['large']; ?>" width="300" alt="<?php echo $row['description']; ?>">
							</div>

						</div>
					</div>
				</div><?php


			// } elseif($choose == 'two_google') { 				ABRIR CUANDO INSTALE GOOGLE ADWORDS

			} elseif($choose == 'large') {

				$imgAd = get_sub_field('img');
				$rawId = get_sub_field('gtm_id');
				$cleanId = strtr( $rawId, $unwanted_array );
				$stripedId = strtolower( $cleanId ); ?>

				<div class="row home_ads_dos ad_group container spacer">
					<a href="<?php the_sub_field('url'); ?>" id="<?php echo $stripedId; ?>" data-title="<?php echo $rawId; ?>" class="register_ga ten columns offset-by-one" onClick="ga('send', 'event', 'imagen: <?php echo $rawId; ?>', 'click', location.pathname);" title="<?php the_sub_field('description'); ?>" target="_blank">
						<div class="ad_google_uno">
							<img src="<?php echo $imgAd['sizes']['large']; ?>" alt="<?php the_sub_field('about'); ?>">
						</div>
					</a>
				</div><?php

			} elseif($choose == 'large_google') { ?>

				<div class="row home_ads_dos ad_group container spacer">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Home Large -->
					<ins class="adsbygoogle"
						 style="display:inline-block;width:970px;height:250px"
						 data-ad-client="ca-pub-5768279375233007"
						 data-ad-slot="6931039173"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div><?php

			} else {}




		elseif( get_row_layout() == 'recent_block' ):

			$post = get_sub_field('exclude');
			$c_qeue = new WP_Query(array( 'post__not_in' => $post, 'posts_per_page' => 2 ));
			$c_second_qeue = new WP_Query(array( 'post__not_in' => $post, 'posts_per_page' => 4, 'offset' => 2)); ?>


			<div class="container spacer">
				<div class="home_destacados_dos lista_articulos">
					<h2>Artículos Recientes</h2>
					<div class="row"><?php

					while($c_qeue->have_posts()) :
						$c_qeue->the_post();

						cards(2);

					endwhile;
					wp_reset_postdata(); ?>
					</div>
					<div class="row fluid"><?php

					while($c_second_qeue->have_posts()) :
						$c_second_qeue->the_post();

						cards();

					endwhile;
					wp_reset_postdata(); ?>
					</div>
				</div>
			</div><?php




		elseif( get_row_layout() == 'special_block' ):

			$title = get_sub_field('title'); ?>


	<div class="container spacer">
		<div class="home_destacados_tres">
			<?php if($title) echo '<h2>'.$title.'</h2>'; ?>
			<div class="row"><?php

			if(get_sub_field('block_1')) : ?>
				<div class="three columns articulo"><?php
				while (have_rows('block_1')) {

					the_row();
					$link = get_sub_field('url');
					$img = get_sub_field('img');
					$text = get_sub_field('text');

					if($link) echo '<a href="'.$link.'">';
					if($img) echo '<img src="'.$img['sizes']['usual'].'" alt="'.$img['caption'].'">';
					if($text) echo $text;
					if($link) echo '</a>';

				} ?>
				</div><?php
			endif;


			if(get_sub_field('block_2')) : ?>
				<div class="six columns articulo"><?php
				while (have_rows('block_2')) {

					the_row();
					$link = get_sub_field('url');
					$img = get_sub_field('img');
					$text = get_sub_field('text');

					if($link) echo '<a href="'.$link.'">';
					if($img) echo '<img src="'.$img['sizes']['usual'].'" alt="'.$img['caption'].'">';
					if($text) echo '<h2>'.$text.'</h2>';
					if($link) echo '</a>';

				} ?>
				</div><?php
			endif;


			if(get_sub_field('block_3')) : ?>
				<div class="three columns articulo"><?php
				while (have_rows('block_3')) {

					the_row();
					$link = get_sub_field('url');
					$img = get_sub_field('img');
					$text = get_sub_field('text');

					if($link) echo '<a href="'.$link.'">';
					if($img) echo '<img src="'.$img['sizes']['usual'].'" alt="'.$img['caption'].'">';
					if($text) echo $text;
					if($link) echo '</a>';

				} ?>
				</div><?php
			endif; ?>

			</div>
		</div>
	</div><?php




		endif;
	endwhile;
endif; ?>




<?php get_footer(); ?>
