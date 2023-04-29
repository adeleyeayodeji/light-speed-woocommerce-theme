<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Light_Speed
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="container">
		<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
			<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
				<?php
				//get site icon url
				$site_icon_url = get_site_icon_url();
				//if site icon url is not empty
				if (!empty($site_icon_url)) {
					//display site icon
				?>
					<img src="<?php echo $site_icon_url; ?>" alt="<?php bloginfo('name'); ?>" width="32" height="32" class="bi me-2">
				<?php
				}
				?>
				<span class="fs-4">
					<?php bloginfo('name'); ?>
				</span>
			</a>
			<?php
			//get wp nav menu for Main Menu
			wp_nav_menu(
				array(
					'theme_location' => 'light-speed-menu',
					'container' => false,
					'menu_class' => 'nav nav-pills'
				)
			);
			?>
		</header>