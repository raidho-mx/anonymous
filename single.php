<?php
/*
Designaholic Templates
Single Post
*/
?>

<?php get_header();

	if ( have_posts() ) while ( have_posts() ) : the_post();

	$class = checkClass();
	$preTitle = checkTag(true); ?>


	<div class="single_post <?php echo $class; ?>" id="sp_portada_grande">
		<div class="container spacer"><?php

			$vidEmbed = get_field('vid_embed');
			$images = get_field('gallery');
			if(has_category('galerias') AND $images ) {


				// echo '<pre>GALLERY exists.';
				$a = 1;
				$amount = count( $images );

				if($images) {
					// echo ' IMAGES inside it exist.</pre>';

					if( $images ): ?>
				<div class="galeria_thumbnails fondo_gris_calido">
					<div class="container">
						<div class="slider-for"><?php
						foreach( $images as $image ):

							if($image['caption']) { $caption = $image['caption']; }
							elseif($image['description']) { $caption = $image['description']; }
							else { $caption = $image['alt']; }

							?>
							<div>
								<div class="img_cont">
									<div>
										<div class="counter">
											<p><span><?php echo$a++ ;?> de <?php echo $amount; ?></span>  — <?php echo $caption; ?></p>
										</div>
										<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
									</div>
								</div>
							</div><?php

						endforeach; ?>
						</div>
						<div class="slider-nav"><?php
						foreach( $images as $image ):

							?>
							<div>
								<img src="<?php echo $image['sizes']['thumbnail']; ?>">
							</div><?php

						endforeach; ?>
						</div>
					</div>
				</div><?php
					endif;


				} else {
					// echo ' But it has NO IMAGES.</pre>';
				}

			} elseif ((has_category('videos-creativos') || has_category('conferencias-videos-creativos') || has_category('entrevistas-videos-creativos') || has_category('procesos-videos-creativos')) AND $vidEmbed) { ?>

					<div class="fit-vid">
						<?php echo $vidEmbed; ?>
					</div><?php

			} elseif(has_post_thumbnail()) { ?>
				<div class="portada_grande">
					<div class="row">
						<div class="twelve columns">
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
				</div><?php
			} ?>



			<div class="row">

				<!-- Cuerpo principal post -->
				<article class="cuerpo_post eight columns">

					<p class="categoria_tag"><?php
					// the_category(', ');

					$cats = get_the_category();
					foreach ($cats as $cat) {
					$catUrl = get_category_link($cat->term_id);
						if($cat->name == 'Videos' OR $cat->name == 'Sin categoría' OR $cat->name == 'Galerias') {
						} else {
							echo '<a href="'.$catUrl.'">'.$cat->name.'</a> ';
						}
					}

					?></p>
					<h1><?php echo $preTitle; ?><?php the_title(); ?></h1>
					<div class="meta">
						<span><?php the_time('l j \d\e F \d\e Y'); ?></span>
						<span>Publicado por <?php the_author_posts_link(); ?></span>
					</div>

					<?php the_content(); ?>

					<?php get_template_part('inc/sharer'); ?>

				</article>

				<?php get_template_part('inc/post_sidebar'); ?>

			</div>
			<!-- Termina row para contener post + sidebar --><?php


		while(have_rows('author')) :
			the_row();
			$img = get_sub_field('img');
			if(get_sub_field('name')) : ?>


			<div class="external_author">
				<p>Artículo propuesto por:</p>
				<div class="row fluid">
					<img class="profile_img two columns" src="<?php echo $img['sizes']['thumbnail']; ?>" >
					<h5 class="six columns"><?php
						if(get_sub_field('twitter')) {
							echo '<a href="http://www.twitter.com/'.get_sub_field('twitter').'" class="rojo_txt">'.get_sub_field('name').'</a> ';
						} else {
							echo '<strong class="rojo_txt">'. get_sub_field('name') .'</a> ';
						}
						if(get_sub_field('age')) echo '('.get_sub_field('age').')';
						if(get_sub_field('occupation')) echo ', '.get_sub_field('occupation').'. ';
						if(get_sub_field('location')) echo get_sub_field('location').'.';
						echo '<br>';
						if(get_sub_field('sitio_web')) echo '<a href="'.get_sub_field('sitio_web').'" class="rojo_txt">'.get_sub_field('sitio_web').'</a>'; ?>
					</h5>
				</div>
			</div><?php

			endif;
		endwhile; ?>

			<!-- Artículos Relacionados -->
			<?php echo do_shortcode('[jprel]');  ?>

			<?php get_template_part('inc/ad_dh_dos'); ?>

		</div>
		<!-- Termina container -->

		<?php comments_template(); ?>

	</div><!-- Termina .single_post -->
<?php

	endwhile;
	get_footer(); ?>
