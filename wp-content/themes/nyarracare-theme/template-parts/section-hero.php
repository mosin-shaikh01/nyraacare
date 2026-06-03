<?php
/**
 * Hero Section Template Part
 *
 * @package Nyarracare
 */

$hero_heading = get_theme_mod( 'hero_heading', 'Welcome to Nyarracare' );
$hero_subheading = get_theme_mod( 'hero_subheading', 'Providing exceptional healthcare services for your family' );
$hero_button_text = get_theme_mod( 'hero_button_text', 'Get Started' );
$hero_button_url = get_theme_mod( 'hero_button_url', '#' );
$hero_image = get_theme_mod( 'hero_image' );
?>

<section class="hero-section">
	<div class="hero-container">
		<?php if ( $hero_image ) : ?>
			<div class="hero-image">
				<img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo esc_attr( $hero_heading ); ?>">
			</div>
		<?php endif; ?>

		<div class="hero-content">
			<div class="hero-text">
				<?php if ( $hero_heading ) : ?>
					<h1 class="hero-heading">
						<?php echo wp_kses_post( $hero_heading ); ?>
					</h1>
				<?php endif; ?>

				<?php if ( $hero_subheading ) : ?>
					<p class="hero-subheading">
						<?php echo wp_kses_post( $hero_subheading ); ?>
					</p>
				<?php endif; ?>

				<?php if ( $hero_button_text && $hero_button_url ) : ?>
					<a href="<?php echo esc_url( $hero_button_url ); ?>" class="hero-button cta-button">
						<?php echo esc_html( $hero_button_text ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
