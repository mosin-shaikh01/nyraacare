<?php
/**
 * Template Name: Home Page
 * Template Post Type: page
 * Description: Homepage template with hero section and modular content sections
 *
 * @package Nyarracare
 */

get_header();
?>

<main id="main" class="site-main home-page">
	<?php
	get_template_part( 'template-parts/section', 'hero' );
	?>

	<?php
	get_template_part( 'template-parts/section', 'contact-info' );
	?>

	<?php
	get_template_part( 'template-parts/section', 'contact-form' );
	?>

	<div class="container home-sections">
		<?php
		// Hook for adding additional sections
		do_action( 'nyarracare_home_sections' );
		?>
	</div>
</main>

<?php
get_footer();
