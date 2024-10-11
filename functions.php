<?php

// Theme paths
define('THEME_URI', get_template_directory_uri()); // url vers le thème 
define('THEME_DIR', get_template_directory()); // Chemin absolu

// On définit la version du thème
$assets_version = wp_get_theme()['Version']; // Récupère les infos du fichier style.css
define('ASSETS_VERSION', $assets_version);

include "vendor/autoload.php";

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' ); // Ajoute les scripts et les styles
function theme_enqueue_styles() {
    wp_enqueue_style( 'main-style', THEME_URI . '/assets/css/theme.css', [], ASSETS_VERSION ); // get_stylesheet_directory_uri => thème enfant
    wp_enqueue_script( 'app-script', THEME_URI . '/assets/js/app_js.js', ["jquery"], ASSETS_VERSION ); // get script qui est dépendant de jquery
    wp_localize_script('app-script', 'theme_data', [ // Pour passer les variables directement au javascript
		'ajaxurl' 					=> admin_url( 'admin-ajax.php' ),		
		'is_logged_in'				=> (is_user_logged_in())
	]);
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');
    wp_enqueue_script( 'app-script', get_stylesheet_directory_uri() . '/assets/js/app.js', array('skrollr', 'swiper-js') ); // On indique que c'est dépendant de skrollr
}

$path = '/js/app.js';

add_action( 'after_setup_theme', 'theme_functions' );
function theme_functions() {
    add_theme_support( 'title-tag' );
}


// Create new menu zones
function register_menus() {
    register_nav_menu('top-menu',__( 'Top menu' ));
    register_nav_menu('footer-menu',__( 'Footer menu' ));
}
add_action( 'init', 'register_menus' );



//-----------------------------
// CPT
//-----------------------------
// CPT Compétences
function competenciesCPT() {	
    $labels = array(
        'name' => 'Compétences',
        'all_items' => 'Compétences',  // Affiché dans le sous menu
        'singular_name' => 'Compétence',
        'add_new' => 'Ajouter une compétence',
        'add_new_item' => 'Ajouter une compétence',
        'edit_item' => 'Modifier une compétence',
        'view_item' => 'Voir la compétence',
        'search_items' => 'Rechercher des compétences',
        'menu_name' => 'Compétences',
        'not_found' => 'Aucune compétence trouvée',
        'not_found_in_trash' => 'Aucune compétence trouvée dans la corbeille'
    );
	$args = array(
        'labels' => $labels,
        'public' => false,
        'show_in_rest' => true,
        'has_archive' => true,
        'show_ui' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-thumbs-up',
        'meta_key' => 'Competency', // Champ personnalisé
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
	);
	register_post_type( 'competency', $args );
}
add_action( 'init', 'competenciesCPT' );


// CPT Websites
function websitesCPT() {	
    $labels = array(
        'name' => 'Sites web',
        'all_items' => 'Sites web',  // Affiché dans le sous menu
        'singular_name' => 'Site web',
        'add_new' => 'Ajouter un site web',
        'add_new_item' => 'Ajouter un site web',
        'edit_item' => 'Modifier un site web',
        'view_item' => 'Voir le site web',
        'search_items' => 'Rechercher des sites web',
        'menu_name' => 'Sites web',
        'not_found' => 'Aucun site web trouvé',
        'not_found_in_trash' => 'Aucun site web trouvé dans la corbeille'
    );
	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'show_ui' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-admin-site',
        'meta_key' => 'Website', // Champ personnalisé
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
	);
	register_post_type( 'website', $args );
}
add_action( 'init', 'websitesCPT' );


// CPT Services
function servicesCPT() {	
    $labels = array(
        'name' => 'Services',
        'all_items' => 'Services',  // Affiché dans le sous menu
        'singular_name' => 'Service',
        'add_new' => 'Ajouter un service',
        'add_new_item' => 'Ajouter un service',
        'edit_item' => 'Modifier un service',
        'view_item' => 'Voir le service',
        'search_items' => 'Rechercher des services',
        'menu_name' => 'Services',
        'not_found' => 'Aucun service trouvé',
        'not_found_in_trash' => 'Aucun service trouvé dans la corbeille'
    );
	$args = array(
        'labels' => $labels,
        'public' => false,
        'show_in_rest' => false,
        'has_archive' => false,
        'show_ui' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-plus',
        'meta_key' => 'Services', // Champ personnalisé
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
	);
	register_post_type( 'service', $args );
}
add_action( 'init', 'servicesCPT' );