<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package veroniquedelauney
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true); 
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />
	
</head>

<body <?php body_class( 'my-body-class' ); ?>>
<?php wp_body_open(); ?>
<div id="page">
	<header id="masthead" class="site-header">

	<center>
		<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/v.png'; ?> " alt="Véronique Delauney" title="Véronique Delauney" />
	</center>

	<style>
.label:after{
    content:'text I want to change';
}
.label:hover:after{
    content:'changed text';
}
</style>
<body>
<p>text <span class="label"></span> text</p>
</body>
	

		<div class="topnav">

			<div class="links">

				<!-- Nouvelle zone de menu -->
				<!-- <div id="topMenu">
					<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'container_class' => 'header' ) ); ?>
				</div>

				<div class="menu-hamburger">
					<div class="hamburger-icon">
						<img src="<?php echo THEME_URI . '/assets/img/hamburger.webp'; ?> " alt="Voir le menu" />
					</div>
					<div class="hamburger-icon-close">
						<img src="<?php echo THEME_URI . '/assets/img/stateopen.webp'; ?> " alt="Fermer le menu" />
					</div>
				</div> -->

			</div>

		</div>		

	</header>
	<!-- #masthead -->