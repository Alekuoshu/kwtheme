<?php
/**
* Template part for displaying posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Koshucas_Theme
*/

?>

<div id="blog-<?php the_ID(); ?>" class="blog-item">
	<?php
	if ( is_singular() ) :
		the_title( '<h1 class="page-header">', '</h1>' );
	endif;
	?>
	<div class="row">
		<div class="col-md-4">
			<a href="<?php the_permalink(); ?>">
				<?php kwtheme_post_thumbnail('wide'); ?>
			</a>
		</div>
		<div class="col-md-8">
			<div class="content-item">
				<?php
				the_title( '<h3 class="item-title">', '</h3>' );
				the_excerpt();
				?>
				<a class="btn-style-1" href="<?php the_permalink(); ?>"><?php echo pll__('Leer Más'); ?></a>
			</div><!-- .entry-item -->
		</div>
	</div>

</div><!-- #blog-<?php the_ID(); ?> -->
