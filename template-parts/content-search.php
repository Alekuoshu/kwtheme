<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Koshucas_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php the_title( sprintf( '<h2 class="page-subtitle"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			kwtheme_posted_on();
			kwtheme_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	<?php kwtheme_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php kwtheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
