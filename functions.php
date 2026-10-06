<?php
/**
 * Saffron theme setup and helpers.
 *
 * @package Saffron
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SAFFRON_VERSION', '1.0.0' );

/**
 * Theme setup: supports, menus, image sizes.
 */
function saffron_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 64,
		'width'       => 220,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'saffron' ),
		'footer'  => esc_html__( 'Footer Menu', 'saffron' ),
	) );

	add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'saffron_setup' );

/**
 * Enqueue front-end assets: Google Fonts, stylesheet and theme script.
 */
function saffron_enqueue_assets() {
	wp_enqueue_style(
		'saffron-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Jost:wght@300;400;500;600&display=swap',
		array(),
		SAFFRON_VERSION
	);

	wp_enqueue_style( 'saffron-style', get_stylesheet_uri(), array( 'saffron-fonts' ), SAFFRON_VERSION );

	wp_enqueue_script(
		'saffron-theme',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		SAFFRON_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'saffron_enqueue_assets' );

/**
 * Register footer widget area.
 */
function saffron_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'saffron' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Widgets shown in the site footer.', 'saffron' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'saffron_widgets_init' );

/**
 * Register the Saffron block pattern category.
 */
function saffron_register_pattern_category() {
	register_block_pattern_category(
		'saffron',
		array( 'label' => esc_html__( 'Saffron', 'saffron' ) )
	);
}
add_action( 'init', 'saffron_register_pattern_category' );

/**
 * Register custom block styles.
 */
function saffron_register_block_styles() {
	register_block_style( 'core/button', array(
		'name'  => 'saffron-sheen',
		'label' => esc_html__( 'Saffron Sheen', 'saffron' ),
	) );
	register_block_style( 'core/group', array(
		'name'  => 'saffron-card',
		'label' => esc_html__( 'Saffron Card', 'saffron' ),
	) );
	register_block_style( 'core/image', array(
		'name'  => 'saffron-framed',
		'label' => esc_html__( 'Framed', 'saffron' ),
	) );
	register_block_style( 'core/heading', array(
		'name'  => 'saffron-eyebrow',
		'label' => esc_html__( 'Eyebrow', 'saffron' ),
	) );
	register_block_style( 'core/quote', array(
		'name'  => 'saffron-pull',
		'label' => esc_html__( 'Pull Quote', 'saffron' ),
	) );
}
add_action( 'init', 'saffron_register_block_styles' );

/**
 * Shorten excerpts for menu and news teasers.
 *
 * @return int Excerpt length in words.
 */
function saffron_excerpt_length() {
	return 24;
}
add_filter( 'excerpt_length', 'saffron_excerpt_length' );

/**
 * Render an inline SVG icon.
 *
 * @param string $name Icon name: phone, pin, clock, star.
 * @return string SVG markup.
 */
function saffron_icon( $name ) {
	$icons = array(
		'phone' => '<path d="M6.6 2.8c.4-.4 1-.4 1.4 0l2.1 2.1c.4.4.4 1 0 1.4l-1.2 1.2c.6 1.4 1.7 2.5 3.1 3.1l1.2-1.2c.4-.4 1-.4 1.4 0l2.1 2.1c.4.4.4 1 0 1.4l-1.4 1.4c-.6.6-1.5.8-2.3.5-2.9-1-5.6-2.8-7.6-5.2-1.3-1.6-2.2-3.4-2.7-5.4-.2-.8 0-1.7.5-2.3l1.4-1.1z"/>',
		'pin'   => '<path d="M12 2a7 7 0 0 0-7 7c0 5.2 7 13 7 13s7-7.8 7-13a7 7 0 0 0-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/>',
		'clock' => '<path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm1 10.6l4.2 2.5-.8 1.3L11 13.5V7h2v5.6z"/>',
		'star'  => '<path d="M12 2l2.9 6.3 6.9.8-5.1 4.7 1.4 6.8L12 17.2 5.9 20.6l1.4-6.8L2.2 9.1l6.9-.8L12 2z"/>',
	);

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	return sprintf(
		'<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">%s</svg>',
		$icons[ $name ]
	);
}
