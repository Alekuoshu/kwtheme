<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

				get_template_part( 'template-parts/content-procedimientos', get_post_type() );

				// previous_post_link('&laquo; %link', '%title', TRUE);
				// next_post_link('&laquo; %link', '%title', TRUE);


				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- container -->
</div><!-- #primary -->

<?php
get_footer();
