<?php
get_header();
?>

<main id="main" class="site-main">
	<div class="container">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php
						if ( is_singular() ) {
							the_title( '<h1 class="entry-title">', '</h1>' );
						} else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}
						?>
						<div class="post-meta">
							<?php
							echo 'By ' . esc_html( get_the_author() );
							echo ' | ' . esc_html( get_the_date() );
							if ( has_category() ) {
								echo ' | ' . esc_html( get_the_category_list( ', ' ) );
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
						if ( is_singular() ) {
							the_content();
						} else {
							the_excerpt();
							?>
							<p>
								<a href="<?php esc_attr( the_permalink() ); ?>" class="read-more">
									<?php _e( 'Read More', 'nyarracare-theme' ); ?>
								</a>
							</p>
							<?php
						}

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nyarracare-theme' ),
							'after'  => '</div>',
						) );
						?>
					</div>
				</article>
				<?php
			}

			the_posts_navigation();
		} else {
			?>
			<article>
				<h2><?php _e( 'Nothing Found', 'nyarracare-theme' ); ?></h2>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'nyarracare-theme' ); ?></p>
			</article>
			<?php
		}
		?>
	</div>
</main>

<?php
get_footer();
