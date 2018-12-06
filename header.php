<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Koshucas_Theme
*/

?>
<!doctype html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>
	</head>
	<!-- navbar-fixed-top -->

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<header id="masthead" class="site-header">
				<div id="header-1" class="navbar-fixed-top">
					<div class="container-fluid">
						<div class="main-menu visible-md visible-lg">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'main-menu',
								'container'=>'nav',
								'container_class'=>'main-menu',
		            			'menu_class'=>'nav menu navbar-nav'
							) );
							?>
						</div>
					</div>
				</div> <!-- #header-1 -->
				<div id="header-2">
					<div class="container">
						<div class="row">
							<div class="col-sm-3">
								<div class="address-info block">
									<?php
								// header address
								if (!dynamic_sidebar ('widget-haddress')) {
									echo pll__("No ha configurado el widget!");
								}
								?>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="logo block">
									<?php $current_language = pll_current_language(); ?>
									<?php // Language conditionals ?>
									<?php if($current_language == 'es') { ?>
										<?php if(has_custom_logo()): ?>
											<?php the_custom_logo(); ?>
										<?php endif; ?>
									<?php
									}else {
										// logo english
										if (!dynamic_sidebar ('logo')) {
											echo pll__("No ha configurado el widget!");
										}
									}
									?>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="contact-header block">
									<?php
								// Contact header
								if (!dynamic_sidebar ('widget-cheader')) {
									echo pll__("No ha configurado el widget!");
								}
								?>
								</div>
							</div>
						</div>
					</div>
					<div class="site-branding">
						<?php
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?></a></h1>
						<?php
						else :
							?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
						$kwtheme_description = get_bloginfo( 'description', 'display' );
						if ( $kwtheme_description || is_customize_preview() ) :
							?>
						<p class="site-description">
							<?php echo $kwtheme_description; /* WPCS: xss ok. */ ?>
						</p>
						<?php endif; ?>
					</div><!-- .site-branding -->
				</div><!-- #header-2 -->
			</header><!-- #masthead -->

			<div id="content" class="site-content">