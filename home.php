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

Timber::render('pages/home.twig', $context); // Affichage de home.twig en passant les paramètres context