<?php
/**
* Template Name: Page Contacto
*
* @package Koshucas_Theme
*/

get_header();
?>

<div id="primary" class="content-area page-contact">
	<div class="container">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="page-header">', '</h1>' );
			else :
				the_title( '<h2 class="item-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<div class="row">
				<div class="col-md-9">
					<main id="main" class="site-main block">

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/contacto', 'page' );

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
					<?php echo do_shortcode('[do_widget id=black-studio-tinymce-15]'); ?>
					<?php echo do_shortcode('[do_widget id=black-studio-tinymce-12]'); ?>
				</div>
				<div class="col-md-3">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div><!-- .container -->
	</div><!-- #primary -->

	<?php
	get_footer();
