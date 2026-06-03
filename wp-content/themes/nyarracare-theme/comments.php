<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) {
		?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				esc_html_e( '1 Comment', 'nyarracare-theme' );
			} else {
				echo esc_html(
					sprintf(
						/* translators: %s: number of comments */
						_n( '%s Comment', '%s Comments', $comment_count, 'nyarracare-theme' ),
						$comment_count
					)
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'type'      => 'comment',
				'short_ping' => true,
				'avatar_size' => 50,
			) );
			?>
		</ol>

		<?php
		the_comments_pagination( array(
			'prev_text' => esc_html__( 'Previous', 'nyarracare-theme' ),
			'next_text' => esc_html__( 'Next', 'nyarracare-theme' ),
		) );
	}

	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'nyarracare-theme' ); ?></p>
		<?php
	}

	comment_form();
	?>
</div>
