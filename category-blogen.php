<?php
/**
* The template for displaying categories pages
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Koshucas_Theme
*/

get_header();
?>
<div id="primary" class="content-area page-blog">
	<div class="container">
		<main id="main" class="site-main block">
			<?php if ( have_posts() ) : ?>

				<?php $this_category = get_category($cat); ?>

				<h1 class="page-header"><?php echo $this_category->cat_name; ?></h1>
				<div id="loadmore" class="blog">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/blog', get_post_type() );

					endwhile;

					// the_posts_pagination( array(
					// 	'mid_size'  => 2,
					// 	'prev_text' => __( '<< Previous', 'kwtheme' ),
					// 	'next_text' => __( 'Next >>', 'kwtheme' ),
					// ) );

				endif;

				?>
			</div>
			<?php load_more_button(); ?>
			<?php //echo pll__('Cargar Más'); ?>
		</main><!-- #main -->
	</div><!-- .container -->
</div><!-- #primary -->

<?php
get_footer();
