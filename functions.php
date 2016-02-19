<?php

/*
 *	Functions
 */




	/*
	 *  ACF - Options
	 */

		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page(array(
				'page_title' 	=> 'Opciones Generales',
				'menu_title'	=> 'Opciones',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
		}
