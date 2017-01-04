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

				<div class="newsLetterContain">

					<form id="mensual" action="//designaholic.us4.list-manage.com/subscribe/post?u=1a671e0d1692072eee0f68325&amp;id=eefa7bdd05" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<div id="mc_embed_signup_scroll">
							<input type="text" value="" name="FNAME" class="required" id="mce-FNAME" placeholder="Tu Nombre">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Tu Correo" required>
							<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_1a671e0d1692072eee0f68325_eefa7bdd05" tabindex="-1" value=""></div>
							<div class="clear"><input type="submit" value="Suscríbete" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						</div>
					</form>

					<form id="diario" action="http://feedburner.google.com/fb/a/mailverify" method="post" onsubmit="window.open(&quot;http://feedburner.google.com/fb/a/mailverify?uri=designaholic/mx&quot;, &quot;popupwindow&quot;, &quot;scrollbars=yes,width=550,height=520&quot;); return true" target="popupwindow" style="display:none">
						<input type="text" value="" name="NOMBRE" class="required" id="mce-NOMBRE" placeholder="Tu Nombre" disabled>
						<input type="email" name="email" onblur="if(this.value=='') this.value='Tu Correo'" onclick="if(this.value=='Tu Correo') this.value=''" placeholder="Tu Correo" id="mce-EMAIL">
						<input type="submit" value="Suscríbete" name="subscribe" id="mc-embedded-subscribe" class="boton">
						<input name="uri" type="hidden" value="designaholic/mx">
						<input name="loc" type="hidden" value="en_US">
					</form>

					<form id="newsLetterChoose">
						<input type="radio" name="nl" value="mensualCh" id="mensualCh" checked> <label for="mensualCh">Mensual</label>
						<input type="radio" name="nl" value="diarioCh" id="diarioCh"> <label for="diarioCh">Diario</label>
					</form>
				</div>
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

					echo '<li '.$color.' href="'.get_sub_field('url').'" title="'.$red.'" target="_blank">'.$network['name'].'</a></li>';
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
<script src="<?php bloginfo('template_url'); ?>/scripts/scripts.js"></script><?php

if(is_single()) { ?>
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.fitvids.js"></script>
	<script>
		$(document).ready(function(){
			$(".fit-vid").fitVids({
				'customSelector': 'iframe[src*="ted.com"]'
			});
			$( "#commentform #comment" ).insertAfter( "#commentform #email" );

			$( "ul.comentarios_listado li" ).each(function(){
				var singleTime = $(this).find('time');
				var singleAuthor = $(this).find('.comment-author');
				var singleSays = $(this).find('.says');
				singleSays.html("comentó el ");
				singleAuthor.append(singleTime).append(":");
			});
		});
	</script><?php
} elseif(is_front_page()) { ?>
	<script src="<?php bloginfo('template_url'); ?>/scripts/home.js"></script><?php
} ?>

<?php // Remove while Staging. ?>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-2607823-6', 'auto');
	ga('send', 'pageview');
</script>
</body>
</html>
