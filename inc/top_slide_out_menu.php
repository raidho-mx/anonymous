<?php
/*
Designaholic Templates
Menú (superior) desplegable para categorías
*/

if(get_field('secondary-menu', 'options')) : ?>

<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
	<div class="cbp-hsinner fondo_rojo">
		<ul class="cbp-hsmenu"><?php
		while (have_rows('secondary-menu', 'options')) :
			the_row(); ?>
			<li>
				<a href="#">Arquitectura</a>
				<?php get_template_part('inc/loop4col1rowMenuTop'); ?>
			</li><?php
		endwhile; ?>
		</ul>
	</div>
</nav><?php

endif; ?>


<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
	<div class="cbp-hsinner fondo_rojo">
		<ul class="cbp-hsmenu">
			<li>
				<a href="#">Arquitectura</a>
				<?php include 'includes/loop4col1rowMenuTop.php'; ?>
			</li>
			<li>
				<a href="#">Comercial</a>
				<?php include 'includes/loop4col1rowMenuTop.php'; ?>
			</li>
			<li>
				<a href="#">Interiores</a>
				<?php include 'includes/loop4col1rowMenuTop.php'; ?>
			</li>
		</ul>
	</div>
</nav>
