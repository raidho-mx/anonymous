<?php
/*
Designaholic Templates
Footer
*/

wp_footer(); ?>

<!-- Footer -->
<div id="footer" class="fondo_azul_oscuro bloque_horizontal">
	<div class="container spacer">
		<div class="row">
			<div class="ten columns">
				<h3><?php the_field('footer_about', 'options'); ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="four columns">
				<h4>Suscríbete a nuestro newsletter</h4>
				<form action="" class="forma_negativo">
					<input type="text" placeholder="Tu Nombre">
					<input type="text" placeholder="Tu Correo">
					<input type="submit" value="Suscríbete">
				</form>
			</div>
			<div class="four columns"><?php
			if(get_field('social', 'options')) : ?>

				<h4>Síguenos en redes</h4>
				<ul class="follow_links"><?php
				while (have_rows('social', 'options')) {
					the_row();
					$red = get_sub_field('network');
					if($red == 'Twitter') $network = array('name' => 'Tw', 'class' => 'follow_twitter');
					if($red == 'Google +') $network = array('name' => 'G+', 'class' => 'follow_google');
					if($red == 'Facebook') $network = array('name' => 'Fb', 'class' => 'follow_facebook');
					if($red == 'LinkedIn') $network = array('name' => 'Li', 'class' => 'follow_linkedin');
					if($red == 'RSS') $network = array('name' => 'Rss', 'class' => 'follow_rss');
					if($red == 'Pinterest') $network = array('name' => 'Pin', 'class' => 'follow_pinterest');
					if($red == 'Otro') $network = array('name' => get_sub_field('name'), 'class' => '');
					if($network['class']) {
						$color = 'class="'.$network['class'].'"><a ';
					} else {
						$color = '><a style="background-color:'.get_sub_field('color').'" ';
					}

					echo '<li '.$color.' href="'.get_sub_field('url').'" title="'.$red.'">'.$network['name'].'</a></li>';
				} ?>
				</ul><?php

			endif; ?>
			</div>
			<div class="three columns offset-by-one"><?php
			if(get_field('footer_links', 'options')) : ?>
				<h4>Ligas de interés</h4>
				<ul><?php
				while (have_rows('footer_links', 'options')) {
					the_row();
					if(get_sub_field('manual')) {
						echo '<li><a href="'.get_sub_field('url').'">'.get_sub_field('name').'</a></li>';
					} else {
						$page = get_sub_field('page_link');
						echo '<li><a href="'.get_page_link($page).'">'.get_the_title($page).'</a></li>';
					}
				} ?>
				</ul><?php
			endif; ?>
			</div>
		</div>
	</div>
</div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php // <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script> ?>
<script src="<?php bloginfo('template_url'); ?>/scripts/cbpHorizontalSlideOutMenu.min.js"></script>
<script>
	var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
</script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/scripts/scripts.js"></script>
<script src="<?php bloginfo('template_url'); ?>/scripts/linda.js"></script><?php

if(is_single()) { ?>
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.fitvids.js"></script>
	<script>
		$(document).ready(function(){
			$(".fit-vid").fitVids({
				'customSelector': 'iframe[src*="ted.com"]'
			});
			$( "#commentform #comment" ).insertAfter( "#commentform #email" );
			// $( "ul.comentarios_listado li time" ).insertAfter( "#commentform #email" );

			$( "ul.comentarios_listado li" ).each(function(){
				var singleTime = $(this).find('time');
				var singleAuthor = $(this).find('.comment-author');
				var singleSays = $(this).find('.says');
				singleSays.html("comentó el ");
				singleAuthor.append(singleTime).append(":");
			});





		});
	</script><?php
} ?>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
	function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
	e=o.createElement(i);r=o.getElementsByTagName(i)[0];
	e.src='https://www.google-analytics.com/analytics.js';
	r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
	ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>
