	<footer class="site-footer">
		<div class="container">
			<div class="footer-content">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'fallback_cb'    => false,
					'container'      => false,
					'depth'          => 1,
				) );
				?>
			</div>
			<p class="copyright">
				&copy; <?php echo esc_html( date( 'Y' ) ); ?>
				<?php bloginfo( 'name' ); ?>.
				<?php _e( 'All rights reserved.', 'nyarracare-theme' ); ?>
			</p>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
