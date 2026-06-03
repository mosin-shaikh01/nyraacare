<?php
/**
 * Contact Form Section Template Part
 *
 * Displays a contact form using shortcode
 *
 * @package Nyarracare
 */

$form_heading = isset( $args['heading'] ) ? $args['heading'] : get_theme_mod( 'contact_form_heading', 'Contact Us' );
$form_description = isset( $args['description'] ) ? $args['description'] : get_theme_mod( 'contact_form_description', 'Have a question or want to get in touch? Fill out the form below and we\'ll get back to you as soon as possible.' );
$form_shortcode = isset( $args['shortcode'] ) ? $args['shortcode'] : get_theme_mod( 'contact_form_shortcode', '' );
?>

<section class="contact-form-section">
	<div class="container">
		<div class="contact-form-wrapper">
			<?php if ( $form_heading ) : ?>
				<h2 class="contact-form-heading section-heading">
					<?php echo wp_kses_post( $form_heading ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $form_description ) : ?>
				<p class="contact-form-description">
					<?php echo wp_kses_post( $form_description ); ?>
				</p>
			<?php endif; ?>

			<?php
			if ( $form_shortcode ) {
				?>
				<div class="contact-form-container">
					<?php
					echo do_shortcode( wp_kses_post( $form_shortcode ) );
					?>
				</div>
				<?php
			} else {
				?>
				<div class="contact-form-placeholder">
					<p><?php _e( 'No contact form shortcode added yet. Add one in Appearance → Customize → Contact Form.', 'nyarracare-theme' ); ?></p>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
