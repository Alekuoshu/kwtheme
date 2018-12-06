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
		<?php //consulta si el post tiene imagen de portada sino inserta la imagen destacada ?>
		<?php $coverImage = get_field('imagen_adicional'); ?>
		<?php if($coverImage): ?>
			<?php kwtheme_cover_image('cinema'); ?>
		<?php elseif (has_post_thumbnail()): ?>
			<?php kwtheme_post_thumbnail('cinema'); ?>
		<?php else: ?>
			<div class="cover-image">
				<img src="<?php echo get_template_directory_uri(); ?>/images/bin/intro-image.png" alt="cover-image">
			</div>
		<?php endif; ?>

		<i class="fa fa-comment"></i>
		<?php comments_popup_link( pll__('No hay comentarios »'), pll__('1 comentario »'), pll__('% comentarios »') ); ?>

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
