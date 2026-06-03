<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NYARRACARE_THEME_VERSION', '1.0.0' );
define( 'NYARRACARE_THEME_DIR', get_template_directory() );
define( 'NYARRACARE_THEME_URI', get_template_directory_uri() );

function nyarracare_setup() {
	load_theme_textdomain( 'nyarracare-theme', NYARRACARE_THEME_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height' => 100,
		'width' => 300,
		'flex-height' => true,
		'flex-width' => true,
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'nyarracare-theme' ),
		'footer' => __( 'Footer Menu', 'nyarracare-theme' ),
	) );
}

add_action( 'after_setup_theme', 'nyarracare_setup' );

function nyarracare_scripts() {
	wp_enqueue_style( 'nyarracare-style', NYARRACARE_THEME_URI . '/style.css', array(), NYARRACARE_THEME_VERSION );
}

add_action( 'wp_enqueue_scripts', 'nyarracare_scripts' );

function nyarracare_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'nyarracare-theme' ),
		'id'            => 'primary-sidebar',
		'description'   => __( 'Primary sidebar', 'nyarracare-theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'nyarracare_widgets_init' );

function nyarracare_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'nyarracare_hero_section', array(
		'title'       => __( 'Hero Section', 'nyarracare-theme' ),
		'description' => __( 'Customize the home page hero section', 'nyarracare-theme' ),
		'priority'    => 30,
	) );

	$wp_customize->add_setting( 'hero_heading', array(
		'default'           => 'Welcome to Nyarracare',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'hero_heading', array(
		'label'       => __( 'Hero Heading', 'nyarracare-theme' ),
		'section'     => 'nyarracare_hero_section',
		'type'        => 'text',
		'priority'    => 10,
	) );

	$wp_customize->add_setting( 'hero_subheading', array(
		'default'           => 'Providing exceptional healthcare services for your family',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'hero_subheading', array(
		'label'       => __( 'Hero Subheading', 'nyarracare-theme' ),
		'section'     => 'nyarracare_hero_section',
		'type'        => 'textarea',
		'priority'    => 20,
	) );

	$wp_customize->add_setting( 'hero_button_text', array(
		'default'           => 'Get Started',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'hero_button_text', array(
		'label'       => __( 'Button Text', 'nyarracare-theme' ),
		'section'     => 'nyarracare_hero_section',
		'type'        => 'text',
		'priority'    => 30,
	) );

	$wp_customize->add_setting( 'hero_button_url', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'hero_button_url', array(
		'label'       => __( 'Button URL', 'nyarracare-theme' ),
		'section'     => 'nyarracare_hero_section',
		'type'        => 'url',
		'priority'    => 40,
	) );

	$wp_customize->add_setting( 'hero_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image', array(
		'label'       => __( 'Hero Image', 'nyarracare-theme' ),
		'section'     => 'nyarracare_hero_section',
		'priority'    => 50,
	) ) );

	// Contact Info Section
	$wp_customize->add_section( 'nyarracare_contact_section', array(
		'title'       => __( 'Contact Information', 'nyarracare-theme' ),
		'description' => __( 'Customize contact information cards', 'nyarracare-theme' ),
		'priority'    => 40,
	) );

	$wp_customize->add_setting( 'contact_info_heading', array(
		'default'           => 'Get In Touch',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'contact_info_heading', array(
		'label'       => __( 'Section Heading', 'nyarracare-theme' ),
		'section'     => 'nyarracare_contact_section',
		'type'        => 'text',
		'priority'    => 10,
	) );

	$wp_customize->add_setting( 'contact_address', array(
		'default'           => '123 Healthcare Street, Medical City, MC 12345',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'contact_address', array(
		'label'       => __( 'Address', 'nyarracare-theme' ),
		'section'     => 'nyarracare_contact_section',
		'type'        => 'textarea',
		'priority'    => 20,
	) );

	$wp_customize->add_setting( 'contact_phone', array(
		'default'           => '+1 (555) 123-4567',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'contact_phone', array(
		'label'       => __( 'Phone Number', 'nyarracare-theme' ),
		'section'     => 'nyarracare_contact_section',
		'type'        => 'tel',
		'priority'    => 30,
	) );

	$wp_customize->add_setting( 'contact_email', array(
		'default'           => 'info@nyarracare.com',
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'contact_email', array(
		'label'       => __( 'Email Address', 'nyarracare-theme' ),
		'section'     => 'nyarracare_contact_section',
		'type'        => 'email',
		'priority'    => 40,
	) );

	// Contact Form Section
	$wp_customize->add_section( 'nyarracare_contact_form_section', array(
		'title'       => __( 'Contact Form', 'nyarracare-theme' ),
		'description' => __( 'Add a contact form to your website. Use shortcodes from Contact Form 7, WPForms, Gravity Forms, or any other form plugin.', 'nyarracare-theme' ),
		'priority'    => 45,
	) );

	$wp_customize->add_setting( 'contact_form_heading', array(
		'default'           => 'Contact Us',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'contact_form_heading', array(
		'label'       => __( 'Section Heading', 'nyarracare-theme' ),
		'section'     => 'nyarracare_contact_form_section',
		'type'        => 'text',
		'priority'    => 10,
	) );

	$wp_customize->add_setting( 'contact_form_description', array(
		'default'           => 'Have a question or want to get in touch? Fill out the form below and we\'ll get back to you as soon as possible.',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'contact_form_description', array(
		'label'       => __( 'Section Description', 'nyarracare-theme' ),
		'section'     => 'nyarracare_contact_form_section',
		'type'        => 'textarea',
		'priority'    => 20,
	) );

	$wp_customize->add_setting( 'contact_form_shortcode', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'contact_form_shortcode', array(
		'label'       => __( 'Form Shortcode', 'nyarracare-theme' ),
		'description' => __( 'Enter the shortcode for your contact form plugin (e.g., [contact-form-7 id="123"], [wpforms id="123"], etc.)', 'nyarracare-theme' ),
		'section'     => 'nyarracare_contact_form_section',
		'type'        => 'textarea',
		'priority'    => 30,
	) );
}

add_action( 'customize_register', 'nyarracare_customize_register' );
