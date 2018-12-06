<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Koshucas_Theme
 */

?>

<div id="testimonio-<?php the_ID(); ?>" class="testimonio-item">
	<i class="fa fa-quote-left"></i>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="page-header">', '</h1>' );
		else :
			the_title( '<h2 class="item-title">', '</h2>' );
		endif;
?>

	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

	<i class="fa fa-quote-right"></i>
</div><!-- #testimonio-<?php the_ID(); ?> -->
