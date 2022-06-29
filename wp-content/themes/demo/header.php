<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EpicPress
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'epicpress' ); ?></a>

	<header id="masthead" class="site-header">

		<nav id="main-nav" class="navbar navbar-expand-lg navbar-dark bg-primary" aria-labelledby="main-nav-label">
			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation'); ?>
			</h2>

			<div class="navbar-container d-lg-flex w-100">
				<div class="navbar-left d-flex justify-content-between">			
					<a class="navbar-brand text-center" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
						EpicPress
					</a>	
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon"></span>
					</button>			
				</div>
		
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- The WordPress Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'navbar-container toggle-offcanvas',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'primary',
							'depth'           => 2,
							'walker'          => new EpicPress_WP_Bootstrap_Navwalker(),
						)
					);
					?>
				</div>	
			</div>
		</nav>
		
	</header><!-- #masthead -->
	<div class="offcanvas-content">