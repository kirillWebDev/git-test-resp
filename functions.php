<?php
add_action( 'after_setup_theme', 'theme_one_setup' );
function theme_one_setup()
{ 

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary menu', 'universal-theme' ),
		)
	);
	add_theme_support( 'post-thumbnails' );

}

add_action('wp_enqueue_scripts', 'enqueue_script_style');
function enqueue_script_style()
{
	wp_register_style('main_global', get_template_directory_uri().'/assets/styles/main_global.css', array(), filemtime(get_template_directory().'/assets/styles/main_global.css'));

	wp_register_style('app_css', get_template_directory_uri().'/assets/styles/app.css', array(), filemtime(get_template_directory().'/assets/styles/app.css'));

	wp_enqueue_style('main_global');
	wp_enqueue_style('app_css');

	wp_register_script('font_loader', get_template_directory_uri().'/assets/js/font-loader.js', ['jquery'], filemtime(get_template_directory().'/assets/js/font-loader.js'), true );
	wp_register_script('all_js', get_template_directory_uri().'/assets/js/all.js', ['jquery'], filemtime(get_template_directory().'/assets/js/all.js'), true );
	wp_register_script('main_js', get_template_directory_uri().'/assets/js/main.js', ['jquery'], filemtime(get_template_directory().'/assets/js/main.js'), true );
	


	wp_enqueue_script('font_loader');
	wp_enqueue_script('all_js');
	wp_enqueue_script('main_js');
}

add_filter('wp_nav_menu','add_menuclass');
function add_menuclass($ulclass) 
{
   return preg_replace('/<a /', '<a class="header_menu_link"', $ulclass);
}

add_action( 'init', 'register_post_type_team' );
function register_post_type_team()
{

	register_post_type( 'team', [
		'label'  => null,
		'labels' => [
			'name'               => 'Team',
			'singular_name'      => 'Team',
			'add_new'            => 'Add Team',
			'menu_name'          => 'Team',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null,
		'show_in_rest'        => null,
		'rest_base'           => null,
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail', 'author' ],
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}

add_action( 'init', 'register_post_type_testimonials' );
function register_post_type_testimonials()
{

	register_post_type( 'testimonials', [
		'label'  => null,
		'labels' => [
			'name'               => 'Testimonials',
			'singular_name'      => 'Testimonials',
			'add_new'            => 'Add testimonials',
			'menu_name'          => 'Testimonials',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null,
		'show_in_rest'        => null,
		'rest_base'           => null,
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'author' ],
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}
// Front-end.work
//root
// 4yvSKL^@ADNJjAaj4EUWNzbN

//admin
//GR3X%i5(u3GU4bRS7@F38t^1