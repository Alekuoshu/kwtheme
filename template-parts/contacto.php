<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Koshucas_Theme
 */

?>

<div <?php post_class(); ?>>

	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

</div><!-- #post-<?php the_ID(); ?> -->
