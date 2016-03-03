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

					<div class="post_sharer">
						<p>Comparte este artículo:</p>
						<ul class="follow_links">
							<li class="follow_twitter"><a href="#">Tw</a></li><li class="follow_google">
								<a href="#">G+</a></li><li class="follow_facebook">
								<a href="#">Fb</a></li><li class="follow_linkedin">
								<a href="#">Rss</a></li><li class="follow_pinterest">
								<a href="#">Pi</a>
							</li>
						</ul>
					</div>

				</article>

				<?php get_template_part('inc/post_sidebar'); ?>

			</div>
			<!-- Termina row para contener post + sidebar -->

			<!-- Artículos Relacionados -->
			<div class="post_relacionado"><?php

				$recent = new WP_Query( array( 'posts_per_page' => 4 ) );

				if ( $recent->have_posts() ) : ?>
					<h2>Relacionado</h2>
					<div class="row"><?php
					while ( $recent->have_posts() ) {
						$recent->the_post();
						cards(6);
					} ?>
					</div><?php
				endif;
				wp_reset_postdata(); ?>

			</div>

			<?php get_template_part('inc/ad_dh_dos'); ?>

		</div>
		<!-- Termina container -->

		<?php comments_template(); ?>

	</div><!-- Termina .single_post -->
<?php

	endwhile;
	get_footer(); ?>
