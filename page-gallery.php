<?php
/**
* Template Name: Page Gallery
*
* @package Koshucas_Theme
*/

get_header();
?>

<div id="primary" class="content-area page-gallery">
	<div class="container">
		<main id="main" class="site-main block">
			<?php the_title( '<h1 class="page-header">', '</h1>' ); ?>
			<?php
			while ( have_posts() ) :
				the_post();

					the_content('page');

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- .container -->
	</div><!-- #primary -->

	<?php
	get_footer();
