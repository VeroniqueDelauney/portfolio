<?php
// Initialize Timber.
Timber\Timber::init();
$context = Timber::context(); // Infos sur le site (nom, url, etc)
$context['theme_uri'] = THEME_URI;

// Websites
$args = array(
	'post_status' => 'publish', 
	'posts_per_page' => '-1',
	'post_type' => 'website',
	'orderby' => 'rand'
);
$context['websites'] = get_posts($args);

// Competencies
$argsCompetencies = array(
	'post_status' => 'publish', 
	'posts_per_page' => '-1',
	'post_type' => 'competency',
	'orderby' => 'rand'
);
$context['competencies'] = get_posts($argsCompetencies);

// Services
$argsServices = array(
	'post_status' => 'publish', 
	'posts_per_page' => '3',
	'post_type' => 'service',
	'orderby' => 'rand'
);
$context['servicesBlocks'] = get_posts($argsServices);



$context['services'] = get_field("services");
$context['competences'] = get_field("competences");
$context['contact'] = get_field("contact");
$context['a_propos'] = get_field("a_propos");
$context['site_options'] = get_fields('options');

Timber::render('pages/front-page.twig', $context); // Affichage de home.twig en passant les paramètres context