<?php

define( 'FS_METHOD', 'direct' );

require get_template_directory().'/inc/templates/theme-support.php';
require get_template_directory().'/inc/custom-post-type.php';
require get_template_directory().'/inc/ajax.php';

	/*SETUP*/
function seafront_setup() {

	//Wordpress manage Document title
	add_theme_support( 'title-tag' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
	// add html5 support to form
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1568, 9999 );
	add_post_type_support( 'page', 'excerpt' );

	//navigation menu
	register_nav_menus(
		array(
			'menu-1' => __( 'Primary', 'seafront' ),
			'footer' => __( 'Footer Menu', 'seafront' ),
			'social' => __( 'Social Links Menu', 'seafront' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action('after_setup_theme', 'seafront_setup');

/**
*
*STYLES TEMPLATE
*
**/
function styles_template() {

	// jQuery 3.4.1
	wp_deregister_script( 'jquery' );
	wp_enqueue_script('jquery', get_theme_file_uri('js/jquery.min.js'), array(), '3.4.1', TRUE);
	wp_register_script('jquery-migrate', get_theme_file_uri('js/jquery-migrate.js'), array(), '3.0.1');

	//owl carousel
	/*wp_enqueue_style( 'owl-carousel', get_theme_file_uri('assets/owlcarousel/owl.carousel.min.css'));
	wp_enqueue_style( 'owltheme', get_theme_file_uri('assets/owlcarousel/owl.theme.default.min.css'));
	wp_enqueue_script('owl-carousel', get_theme_file_uri('assets/owlcarousel/owl.carousel.min.js'), array(), '2.3.4', TRUE);*/

	//slick carousel
	wp_enqueue_style( 'slick-carousel', get_theme_file_uri('assets/slick/slick.css'));
	wp_enqueue_style( 'slicktheme', get_theme_file_uri('assets/slick/slick-theme.css'));
	wp_enqueue_script('slickjs', get_theme_file_uri('assets/slick/slick.js'), array(), '1.8.1', TRUE);

	 wp_enqueue_style( 'seafront', get_stylesheet_uri(), array(),date("h:i:s"));
	 
	/**
	 * CR: Use local file. 
	 */
	//javascript
	wp_enqueue_script('fancybox', get_theme_file_uri('assets/fancybox/jquery.fancybox.min.js'), array(), '1.8.1', TRUE);

	wp_enqueue_script('scripts', get_theme_file_uri('js/script.js'), array('jquery'),date("h:i:s") , TRUE);
}
add_action( 'wp_enqueue_scripts', 'styles_template' );


function store_custom_post() {
    $labels = array(
        'name' => __('store'),
        'singular_name' => __('store')
    );
    register_post_type('store',
        array(
            'labels'            => $labels,
            'show_in_rest'      => true,
            'show_ui'           => true,
            'show_in_nav_menus' => true,
            'public'            => true,
            'has_archive'       => true,
            'rewrite'           => array( 'slug' => 'store' ),
            'supports'          => array( 'title', 'editor', 'thumbnail','excerpt' ),
            'taxonomies'        => array( 'Branch' ),
            'menu_icon'         => 'dashicons-admin-multisite'
        )
    );
    register_taxonomy( 'Branch', 'store',
        array(
            'labels'            => array( 'name' => 'Branch' ),
            'hierarchical'      => true,
            'show_in_rest'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'public'            => true,
            'rewrite'           => array( 'slug' => 'store' )
        )
    );
}
add_action('init', 'store_custom_post');

add_action( 'wp_roles_init', static function ( \WP_Roles $roles ) {
    $roles->roles['author']['name'] = 'Seller';
    $roles->role_names['author'] = 'Seller';
} );

/** 
 * Email SMTP
 */
// define( 'WPMS_ON', true );
// define( 'WPMS_SMTP_PASS', 'mkixukzaamwhkiwd' );