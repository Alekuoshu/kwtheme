<?php
/**
* Template Name: Page About
*
* @package Koshucas_Theme
*/

get_header();
?>

<div id="primary" class="content-area page-about">
	<div class="container">
		<main id="main" class="site-main block">
			<?php the_title('<h1 class="page-header">', '</h1>'); ?>

			<div class="row">
				<div class="col-sm-2 col-md-3">
					<?php kwtheme_post_thumbnail('box'); ?>
				</div>
				<div class="col-sm-10 col-md-9">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile;	else: ?>
						<strong><?php echo pll__('Lo siento, esta página no existe.'); ?></strong>
					<?php endif; ?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- .container -->
</div><!-- #primary -->

<?php
get_footer();
