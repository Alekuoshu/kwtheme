<?php
/**
* Template Name: Page No Cover
*
* @package Koshucas_Theme
*/

get_header();
?>

<div id="primary" class="content-area">
	<div class="container">
		<main id="main" class="site-main block">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content-nocover', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- .container -->
</div><!-- #primary -->

<?php
get_footer();
