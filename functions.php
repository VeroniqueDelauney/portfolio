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


// Create new menu zones -- VD
function register_menus() {
    register_nav_menu('top-menu',__( 'Top menu' ));
    register_nav_menu('footer-menu',__( 'Footer menu' ));
}
add_action( 'init', 'register_menus' );





// Create shortcode pour SEO block
add_shortcode("pubcompare_top_protocols" , function($atts){

    // Pour les shortcodes avec paramètres - ex "Keyword"
    $atts = shortcode_atts( array(
        'keyword' => '',
    ), $atts, 'pubcompare_top_protocols' );    
    echo "-->".$atts["keyword"];

    
		$context = [
		"firstname" => "titi",
		"lastname" => "tutu",
	];

	return \Timber::compile('parts/protocols-list.twig', $context);

});








// // Pages d'options du site
// if( function_exists( 'acf_add_options_page' ) ) {
	
// 	acf_add_options_page( array(
// 		'page_title' 	=> 'Options du thème',
// 		'menu_title'	=> 'Options',
// 		'menu_slug' 	=> 'theme-general-settings',
// 		'capability'	=> 'edit_posts',
// 		'redirect'		=> false,
//         'position'    	=> 2
// 	) );
	
// 	acf_add_options_sub_page( array(
// 		'page_title' 	=> 'Couleurs du thème',
// 		'menu_title'	=> 'Couleurs',
// 		'parent_slug'	=> 'theme-general-settings',
// 	) );
	
// }

// // Shortcode pour les compétences
// function competenciesShortCode() {
//     ob_start();
//     include('includes/competenciesCPT.php');
//     $data = ob_get_contents();
//     ob_end_clean();
//     return $data;
// }    
// add_shortcode('competenciesCPT', 'competenciesShortCode');


// // Shortcode pour les sites web
// function websitesShortCode() {
//     ob_start();
//     include('includes/websitesCPT.php');
//     $data = ob_get_contents();
//     ob_end_clean();
//     return $data;
// }    
// add_shortcode('websitesCPT', 'websitesShortCode');


// CPT Compétences
function competenciesCPT() {	
    $labels = array(
        'name' => 'Compétences',
        'all_items' => 'Compétences',  // affiché dans le sous menu
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
        // 'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-thumbs-up',
        'meta_key' => 'Competency', // nom du champ personnalisé
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
	);
	register_post_type( 'competency', $args );
}
add_action( 'init', 'competenciesCPT' ); // Le hook init lance la fonction



// CPT Websites
function websitesCPT() {	
    $labels = array(
        'name' => 'Sites web',
        'all_items' => 'Sites web',  // affiché dans le sous menu
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
        // 'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-admin-site',
        'meta_key' => 'Website', // nom du champ personnalisé
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
	);
	register_post_type( 'website', $args );
}
add_action( 'init', 'websitesCPT' ); // Le hook init lance la fonction


// CPT Services
function servicesCPT() {	
    $labels = array(
        'name' => 'Services',
        'all_items' => 'Services',  // affiché dans le sous menu
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
        // 'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-plus',
        'meta_key' => 'Services', // nom du champ personnalisé
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
	);
	register_post_type( 'service', $args );
}
add_action( 'init', 'servicesCPT' ); // Le hook init lance la fonction






// Retourne les termes d'une taxonomie non-associée à un post_id => Menu déroulants page d'accueil
function menuSelectTerms($taxo_slug) {
    $terms = get_terms( array(
        'taxonomy' => $taxo_slug,
        'hide_empty' => true
    ));        
    if ( !empty($terms) ) {
        echo '<option>--------------------------</option>';
        foreach ( $terms as $term ) {
            echo '<option value=' . $term->slug .'>' . $term->name . '</option>';
        }
    }
}


// Retourne un tableau des termes d'une taxo 'taxo_slug' associés à un post 'post_id'
function get_terms_of_posts($post_id, $taxo_slug) {
    $retour = [];
    $terms = get_the_terms($post_id, $taxo_slug);
    foreach($terms as $term) {
        $retour[] = $term->name;
    }
    return $retour;
}



/**
 * Save and load ACF fields from JSON
 */
add_filter('acf/settings/load_json', function ($paths) {
	unset($paths[0]);
	$paths[] = THEME_DIR . '/acf-json';
	return $paths;
});

add_filter('acf/settings/save_json', function ($path) {
	$path = THEME_DIR . '/acf-json';
	return $path;
});