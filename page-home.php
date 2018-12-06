<?php
/**
* Template Name: Page Home
*
* @package Koshucas_Theme
*/

get_header();
?>
<?php //load slider
do_action('kwtheme_homepage_slider'); ?>

<section id="section-seals">
	<div class="container">
		<div class="seals block jn-animation-scroll jn-animation-fly-from-below jn-animation-slow">
			<?php // seals widget ?>
			<?php echo do_shortcode('[do_widget id=seals_widget-2]'); ?>
		</div>
	</div>
</section>

<div id="primary" class="content-area home-page">
	<div class="container">
		<main id="main" class="site-main block">

			<div class="row">
				<div class="col-sm-6 jn-animation-scroll jn-animation-fly-from-left jn-animation-slow">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
						<?php if(get_field('boton')): ?>
							<a class="btn-style-1" href="<?php the_field('url_boton'); ?>" rel="alternate"><?php the_field('boton'); ?></a>
						<?php endif; ?>
					<?php endwhile;	else: ?>
						<strong><?php echo pll__('Lo siento, esta página no existe.'); ?></strong>
					<?php endif; ?>
				</div>
				<div class="col-sm-6 jn-animation-scroll jn-animation-fly-from-right jn-animation-slow">
					<?php kwtheme_post_thumbnail('box'); ?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- .container -->
</div><!-- #primary -->
<section id="section-procedures">
	<div class="container">
		<div class="procedures block jn-animation-scroll jn-animation-fly-from-below jn-animation-slow">
			<h3 class="widget-title"><?php echo pll__('Procedimientos'); ?></h3>
			<div class="row">
				<?php $current_language = pll_current_language(); ?>
				<?php // Language conditionals ?>
				<?php if($current_language == 'en') {
					$lang = 'en';
					$cat = 17;
				}else {
					$lang = 'es';
					$cat = 15;
				}
				?>
				<?php
				// loop
				$procedures = new WP_Query(array(
					'post_type' => 'post',
					'cat' => $cat,
					'showposts' => 4,
					'lang' => $lang,
					'order' => 'ASC'
				));
				?>
				<?php
				$n = 0;
				if($procedures->have_posts()) :
					while($procedures->have_posts()) :
						$n++;
						$procedures-> the_post(); ?>
						<div class="col-sm-3">
							<div class="image-container">
								<?php kwtheme_post_thumbnail('box'); ?>
								<a href="#modalp-<?php echo $n; ?>" data-toggle="modal" data-target="#modalp-<?php echo $n; ?>">
									<div class="rollover">
										<h4 class="procedure-title"><?php the_title(); ?></h4>
									</div>
								</a>
								<!-- Procedures Modal -->
								<div class="modal fade" id="modalp-<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel"><?php the_title(); ?></h4>
												</div>
												<div class="modal-body">
													<div class="content">
														<?php echo content(80); ?>
													</div>
												</div>
												<div class="modal-footer">
													<a href="<?php the_permalink(); ?>" class="btn-style-1"><?php echo pll__('Leer Más'); ?></a>
												</div>
										</div>
									</div>
								</div>
							</div>
							<?php if(get_field('surgery_1')): ?>
								<div class="links">
									<?php if(get_field('surgery_1')): ?>
										<a href="<?php the_field('link_1'); ?>" rel="alternate"><?php the_field('surgery_1'); ?></a>
									<?php endif; ?>
									<?php if(get_field('surgery_2')): ?>
										<a href="<?php the_field('link_2'); ?>" rel="alternate"><?php the_field('surgery_2'); ?></a>
									<?php endif; ?>
									<?php if(get_field('surgery_3')): ?>
										<a href="<?php the_field('link_3'); ?>" rel="alternate"><?php the_field('surgery_3'); ?></a>
									<?php endif; ?>
									<?php if(get_field('surgery_4')): ?>
										<a href="<?php the_field('link_4'); ?>" rel="alternate"><?php the_field('surgery_4'); ?></a>
									<?php endif; ?>
									<?php if(get_field('surgery_5')): ?>
										<a href="<?php the_field('link_5'); ?>" rel="alternate"><?php the_field('surgery_5'); ?></a>
									<?php endif; ?>
									<?php if(get_field('surgery_6')): ?>
										<a href="<?php the_field('link_6'); ?>" rel="alternate"><?php the_field('surgery_6'); ?></a>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>
<!-- Section before after -->
<section id="section-before-after">
	<div class="container">
		<div class="before-after block jn-animation-scroll jn-animation-fly-from-left jn-animation-slow">
			<?php // before-after widget ?>
			<?php echo do_shortcode('[do_widget id=black-studio-tinymce-2]'); ?>
			<?php echo do_shortcode('[do_widget id=black-studio-tinymce-3]'); ?>
		</div>
	</div>
</section>
<!-- Section Medios -->
<section id="section-medios">
	<div class="container">
		<div class="medios block jn-animation-scroll jn-animation-fly-from-right jn-animation-slow">
			<?php
			// Medios
			if (!dynamic_sidebar ('widget-medios')) {
				echo pll__("No ha configurado el widget!");
			}
			?>
		</div>
	</div>
</section>
<!-- Section Testimonials -->
<section id="section-testimonials">
	<div class="container">
		<div class="testimonials block jn-animation-scroll jn-animation-zoom jn-animation-slow">
			<?php get_template_part('/template-parts/general-testimonials'); ?>
		</div>
	</div>
</section>
<!-- Section cometolima -->
<section id="section-cometolima">
	<div class="container-fluid">
		<div class="cometolima block jn-animation-scroll jn-animation-fly-from-below jn-animation-slow">
			<?php
			// cometolima
			if (!dynamic_sidebar ('widget-cometolima')) {
				echo pll__("No ha configurado el widget!");
			}
			?>
		</div>
	</div>
</section>
<!-- Section cita -->
<section id="section-cita">
	<div class="container">
		<div class="cita block jn-animation-scroll jn-animation-fly-from-below">
			<?php // cita widget ?>
			<?php echo do_shortcode('[do_widget id=black-studio-tinymce-4]'); ?>
			<?php echo do_shortcode('[do_widget id=black-studio-tinymce-5]'); ?>
		</div>
	</div>
</section>
<!-- Section instalaciones -->
<section id="section-instalaciones">
	<div class="container">
		<div class="instalaciones block jn-animation-scroll jn-animation-fly-from-below">
			<?php // instalaciones widget ?>
			<?php echo do_shortcode('[do_widget id=black-studio-tinymce-6]'); ?>
			<?php echo do_shortcode('[do_widget id=black-studio-tinymce-7]'); ?>
		</div>
	</div>
</section>
<!-- Section Rervaciones -->
<section id="section-reservaciones">
	<div class="container-fluid">
		<div class="reservaciones block jn-animation-scroll jn-animation-fly-from-below jn-animation-slow">
			<?php // reservaciones widget ?>
			<?php echo do_shortcode('[do_widget id=black-studio-tinymce-8]'); ?>
			<?php echo do_shortcode('[do_widget id=black-studio-tinymce-9]'); ?>
		</div>
	</div>
</section>

<?php
get_footer();
