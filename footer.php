<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Koshucas_Theme
*/

?>

</div><!-- #content -->

<footer id="site-footer" class="site-footer jn-animation-scroll jn-animation-fly-from-below jn-animation-slow">
	<section id="sectio-logo-footer">
		<div class="container">
			<div class="logo-footer block">
				<?php // logo-footer widget ?>
				<?php echo do_shortcode('[do_widget id=media_image-2]'); ?>
				<?php echo do_shortcode('[do_widget id=media_image-4]'); ?>
			</div>
		</div>
	</section>
	<section id="menu-map-facebook">
		<div class="container">
			<div class="contact-footer block">
				<div class="row">
					<div class="col-sm-4">
						<div class="menu-footer">
							<h3 class="widget_title"><?php echo pll__('Procedimientos'); ?></h3>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'footer-menu',
								'container'=>'nav',
								'container_class'=>'footer-menu',
								'menu_class'=>'nav menu'
							) );
							?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="map-footer">
							<?php // mapa-footer widget ?>
							<?php echo do_shortcode('[do_widget id=googlemapswidget-3]'); ?>
						</div>
						<div class="socials">
							<?php // socials widget ?>
							<?php echo do_shortcode('[do_widget id=wpcw_social-2]'); ?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="facebook">
							<?php // facebook widget ?>
							<?php echo do_shortcode('[do_widget id=responsivefacebookpagewidget-2]'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- menu-map-facebook -->
	<section id="site-info">
		<div class="container">
			<div class="copyright block">
				<?php // logo leap widget ?>
				<?php echo do_shortcode('[do_widget id=media_image-3]'); ?>
				<p>
					<?php echo pll__('Diseñado y Desarrollado por'); ?> <a href="https://leapperu.com" target="_blank" rel="nofollow">LEAP</a>
				</p>
				<p>Copyright © <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
					<span class="sep"></a></p>
				</div>
			</div>
		</section><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php wp_enqueue_script("jquery"); ?>
</body>
</html>
