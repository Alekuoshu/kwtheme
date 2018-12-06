<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Koshucas_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="page-header">', '</h1>' );
		else :
			the_title( '<h2 class="item-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
?>

	<?php	if ( 'post' === get_post_type() ) : ?>

			<!-- <div class="entry-meta">
				<?php
				// kwtheme_posted_on();
				// kwtheme_posted_by();
				?>
			</div> -->
		<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kwtheme' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kwtheme' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
