<?php
get_header();
?>

<main id="main" class="site-main">
	<div class="container">
		<article class="error-404 not-found">
			<header class="entry-header">
				<h1 class="entry-title">
					<?php esc_html_e( '404 - Page Not Found', 'nyarracare-theme' ); ?>
				</h1>
			</header>

			<div class="entry-content">
				<p>
					<?php esc_html_e( 'The page you are looking for could not be found.', 'nyarracare-theme' ); ?>
				</p>
				<p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php esc_html_e( 'Go back to the homepage', 'nyarracare-theme' ); ?>
					</a>
				</p>
			</div>
		</article>
	</div>
</main>

<?php
get_footer();
