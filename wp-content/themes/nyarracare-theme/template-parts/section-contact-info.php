<?php
/**
 * Contact Info Section Template Part
 *
 * Displays 3 cards with address, contact number, and email
 *
 * @package Nyarracare
 */

$cards = isset( $args['cards'] ) ? $args['cards'] : array(
	array(
		'icon'  => '📍',
		'title' => 'Address',
		'content' => get_theme_mod( 'contact_address', '123 Healthcare Street, Medical City, MC 12345' ),
	),
	array(
		'icon'  => '📞',
		'title' => 'Phone',
		'content' => get_theme_mod( 'contact_phone', '+1 (555) 123-4567' ),
		'link_type' => 'tel',
	),
	array(
		'icon'  => '✉️',
		'title' => 'Email',
		'content' => get_theme_mod( 'contact_email', 'info@nyarracare.com' ),
		'link_type' => 'email',
	),
);

$section_heading = isset( $args['heading'] ) ? $args['heading'] : get_theme_mod( 'contact_info_heading', 'Get In Touch' );
?>

<section class="contact-info-section">
	<div class="container">
		<?php if ( $section_heading ) : ?>
			<h2 class="section-heading">
				<?php echo wp_kses_post( $section_heading ); ?>
			</h2>
		<?php endif; ?>

		<div class="contact-cards-grid">
			<?php foreach ( $cards as $card ) : ?>
				<div class="contact-card">
					<?php if ( isset( $card['icon'] ) ) : ?>
						<div class="contact-card-icon">
							<?php echo wp_kses_post( $card['icon'] ); ?>
						</div>
					<?php endif; ?>

					<?php if ( isset( $card['title'] ) ) : ?>
						<h3 class="contact-card-title">
							<?php echo wp_kses_post( $card['title'] ); ?>
						</h3>
					<?php endif; ?>

					<?php if ( isset( $card['content'] ) ) : ?>
						<div class="contact-card-content">
							<?php
							$content = $card['content'];
							$link_type = isset( $card['link_type'] ) ? $card['link_type'] : '';

							if ( $link_type === 'tel' ) {
								$href = 'tel:' . preg_replace( '/[^0-9+\-]/', '', $content );
								echo '<a href="' . esc_url( $href ) . '">' . esc_html( $content ) . '</a>';
							} elseif ( $link_type === 'email' ) {
								$href = 'mailto:' . sanitize_email( $content );
								echo '<a href="' . esc_attr( $href ) . '">' . esc_html( $content ) . '</a>';
							} else {
								echo wp_kses_post( $content );
							}
							?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
