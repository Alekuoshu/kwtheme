<?php
/*
Template Name: Testimonios
Template Post Type: post
*/
?>

<h3 class="section-title"><?php echo pll__('Testimonios'); ?></h3>

<?php $current_language = pll_current_language(); ?>
<?php // Language conditionals ?>
<?php if($current_language == 'en') {
	$lang = 'en';
	$cat = 'testimonials';
	$url_viewall = '../testimonials';
}else {
	$lang = 'es';
	$cat = 'testimonios';
	$url_viewall = 'testimonios';
}
?>
<?php
// Loop for testimonials items
$testimonios = new WP_Query(array(
	'post_type' => 'post',
	'category_name' => $cat,
	'showposts' => 8,
	'lang' => $lang,
	'order' => 'DESC'
));
?>
<?php $n = -1; ?>
<div id="carousel-testimonials" class="carousel slide" data-ride="carousel">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php
		if($testimonios->have_posts()) :
			while($testimonios->have_posts()) :
				$testimonios-> the_post();
				$n++;
				?>

				<div class="item <?php if($n==0) echo "active"; ?>">
					<?php content(40); ?>
					<h4 class="testimonio-title"><?php the_title(); ?></h4>
				</div>

				<?php
			endwhile; //end loop ?>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-testimonials" role="button" data-slide="prev">
			<span class="fa fa-angle-left" aria-hidden="true"></span>
		</a>
		<a class="right carousel-control" href="#carousel-testimonials" role="button" data-slide="next">
			<span class="fa fa-angle-right" aria-hidden="true"></span>
		</a>
	</div>

<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php
// Loop for testimonials info
$info = new WP_Query(array(
	'post_type' => 'post',
	'name' => 'testimonios',
	'showposts' => 1,
	'lang' => $lang
));
?>
<?php
if($info->have_posts()) :
	while($info->have_posts()) :
		$info-> the_post(); ?>
		<a class="btn-style-3" href="<?php echo $url_viewall; ?>" rel="alternate"><?php echo pll__('Ver Todos'); ?></a>
		<div class="row">
			<div class="col-sm-4">
				<div class="average">
					<span><?php echo pll__('Promedio: '); ?></span>
					<?php the_field("promedio"); ?>
				</div>
			</div>
			<div class="col-sm-4">
				<?php the_field("star_raiting"); ?>
			</div>
			<div class="col-sm-4">
				<div class="reviews">
					<span><?php echo pll__('Total de '); ?></span> <?php the_field("resenas_totales"); ?> <?php echo pll__('Reseñas'); ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
