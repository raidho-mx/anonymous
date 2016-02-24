<?php
/*
Designaholic Templates
Autores
*/
?>

<?php get_header(); ?>

	<div class="container spacer">

		<h2><?php the_title(); ?></h2>
		<p><?php

			$userObjects = get_field('exclude_user');

			foreach ($userObjects as $excUser) {
				$exclude .= $excUser['ID'].', ';
			} ?>
		</p>

		<div class="row fluid autores_listado"><?php

			// The Query
			$user_query = new WP_User_Query( array( 'exclude' => $exclude, 'number' => -1 ) );

			// User Loop
			if ( ! empty( $user_query->results ) ) {
				foreach ( $user_query->results as $user ) {
					$id = $user->ID;
					$img = get_field('usr_img', 'user_'.$id); ?>
					<div class="three columns">
						<a href="<?php echo get_author_posts_url($id); ?>">
							<img src="<?php echo $img['sizes']['large']; ?>" alt="">
							<p class="color_gris_claro"><?php the_field('usr_role', 'user_'.$id); ?></p>
							<h4><?php echo $user->display_name; ?></h4>
							<p class="color_rojo"><?php the_field('usr_org', 'user_'.$id); ?></p>
						</a>
					</div><?php

/*
					WP_User Object
					(
					    [data] =&gt; stdClass Object
					        (
					            [ID] =&gt; 2
					            [user_login] =&gt; admin
					            [user_pass] =&gt; $P$B5xr93YpveNt1Ut2Kkw6S4OihsbYfB1
					            [user_nicename] =&gt; admin
					            [user_email] =&gt; hola@ministeriovisual.com
					            [user_url] =&gt;
					            [user_registered] =&gt; 2016-02-16 16:04:31
					            [user_activation_key] =&gt;
					            [user_status] =&gt; 0
					            [display_name] =&gt; Equipo Editorial
					        )

					    [ID] =&gt; 2
					    [caps] =&gt; Array
					        (
					            [subscriber] =&gt; 1
					        )

					    [cap_key] =&gt; wp_capabilities
					    [roles] =&gt; Array
					        (
					            [0] =&gt; subscriber
					        )

					    [allcaps] =&gt; Array
					        (
					            [read] =&gt; 1
					            [level_0] =&gt; 1
					            [subscriber] =&gt; 1
					        )

					    [filter] =&gt;
					)


					 */
				}
			} else {
				echo 'No users found.';
			}
			?>


		</div>

		<?php // get_template_part('inc/patrocinadores'); ?>

	</div>

<?php get_footer(); ?>
