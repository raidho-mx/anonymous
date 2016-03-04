
<?php

// $link = get_the_permalink();
$link = 'http://designaholic.mx/2016/01/design-miami-2015-el-evento-que-junta-el-arte-con-el-diseno.html';
$fbSharer = 'https://www.facebook.com/sharer/sharer.php?s=100&p[url]='. urlencode($link);

?>
<div class="post_sharer">
	<p>Comparte este artículo:</p>
	<ul class="follow_links">
		<li class="follow_twitter"><a href="http://twitter.com/home?status=<?php echo wp_get_shortlink(); //echo do_shortcode('[shortlink]'); ?> @_designaholic" target="_blank">Tw</a></li><li class="follow_google">
			<a href="https://plus.google.com/share?url=<?php echo urlencode($link); ?>">G+</a></li><li class="follow_facebook">
			<a href="<?php echo $fbSharer; ?>" target="_blank">Fb</a></li><li class="follow_linkedin">
			<a href="<?php echo esc_url( home_url( '/feed/' ) ); ?>" target="_blank">Rss</a></li><li class="follow_pinterest">
				<!-- <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php // post_thumbnail_url(); ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pi</a> -->
			<a href="https://www.pinterest.com/pin/create/button/" class="pin-it-button"data-pin-do="buttonBookmark" data-pin-custom="true">Pi</a>
		</li>
	</ul>
</div>
