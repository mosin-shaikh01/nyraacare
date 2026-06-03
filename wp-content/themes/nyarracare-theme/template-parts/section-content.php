<?php
/**
 * Content Section Template Part
 *
 * A reusable section template for displaying content with heading and description
 *
 * @package Nyarracare
 */

$section_heading = isset( $args['heading'] ) ? $args['heading'] : '';
$section_content = isset( $args['content'] ) ? $args['content'] : '';
$section_class = isset( $args['class'] ) ? $args['class'] : '';
?>

<section class="content-section <?php echo esc_attr( $section_class ); ?>">
	<div class="section-container">
		<?php if ( $section_heading ) : ?>
			<h2 class="section-heading">
				<?php echo wp_kses_post( $section_heading ); ?>
			</h2>
		<?php endif; ?>

		<?php if ( $section_content ) : ?>
			<div class="section-content">
				<?php echo wp_kses_post( $section_content ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
