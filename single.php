<?php
/*
Designaholic Templates
Single Post
*/
?>

<?php get_header();

	if ( have_posts() ) while ( have_posts() ) : the_post();

	$class = checkClass();
	$preTitle = checkTag(); ?>


	<div class="single_post <?php echo $class; ?>" id="sp_portada_grande">
		<div class="container spacer"><?php

			$images = get_field('gallery');
			if(has_category('galerias') AND $images ) {

				echo 'galerias';

				if($images) {
					echo ' :D';
				} else {
					echo ' :(';
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

					<p class="categoria_tag"><?php the_category(', '); ?></p>
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
