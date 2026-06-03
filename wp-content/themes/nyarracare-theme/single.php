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
					<div class="post-meta">
						<?php
						echo 'By ' . esc_html( get_the_author() );
						echo ' | ' . esc_html( get_the_date() );
						if ( has_category() ) {
							echo ' | ' . wp_kses_post( get_the_category_list( ', ' ) );
						}
						?>
					</div>
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

				<footer class="entry-footer">
					<?php
					$tags = get_the_tags();
					if ( $tags ) {
						echo '<p class="tags">';
						_e( 'Tags: ', 'nyarracare-theme' );
						echo wp_kses_post( get_the_tag_list( '', ', ' ) );
						echo '</p>';
					}
					?>
				</footer>
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
