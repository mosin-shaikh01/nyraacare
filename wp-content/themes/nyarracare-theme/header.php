<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header class="site-header">
		<div class="container">
			<div class="site-branding">
				<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				}
				?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
				<p class="site-description">
					<?php bloginfo( 'description' ); ?>
				</p>
			</div>
		</div>
	</header>

	<nav class="main-navigation">
		<div class="container">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'fallback_cb'    => 'wp_page_menu',
				'container'      => false,
				'depth'          => 2,
			) );
			?>
		</div>
	</nav>
