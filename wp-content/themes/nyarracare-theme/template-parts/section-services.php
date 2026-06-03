<?php
/**
 * Services Section Template Part
 *
 * Displays a grid of services
 *
 * @package Nyarracare
 */

$services = isset( $args['services'] ) ? $args['services'] : array();
?>

<section class="services-section">
	<div class="container">
		<?php if ( isset( $args['heading'] ) ) : ?>
			<h2 class="section-heading">
				<?php echo wp_kses_post( $args['heading'] ); ?>
			</h2>
		<?php endif; ?>

		<?php if ( ! empty( $services ) ) : ?>
			<div class="services-grid">
				<?php foreach ( $services as $service ) : ?>
					<div class="service-card">
						<?php if ( isset( $service['icon'] ) ) : ?>
							<div class="service-icon">
								<?php echo wp_kses_post( $service['icon'] ); ?>
							</div>
						<?php endif; ?>

						<?php if ( isset( $service['title'] ) ) : ?>
							<h3 class="service-title">
								<?php echo wp_kses_post( $service['title'] ); ?>
							</h3>
						<?php endif; ?>

						<?php if ( isset( $service['description'] ) ) : ?>
							<p class="service-description">
								<?php echo wp_kses_post( $service['description'] ); ?>
							</p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
