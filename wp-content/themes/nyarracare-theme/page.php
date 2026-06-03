<?php
get_header();
?>

<main id="main" class="site-main">
	<div class="container">
		<?php
		while ( have_posts() ) {
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>

				<?php
				if ( has_post_thumbnail() ) {
					echo '<div class="post-thumbnail">';
					the_post_thumbnail( 'large' );
					echo '</div>';
				}
				?>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nyarracare-theme' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</article>
			<?php

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
		?>
	</div>
</main>

<?php
get_footer();
