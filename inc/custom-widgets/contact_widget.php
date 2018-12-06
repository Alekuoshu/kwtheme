<div class="contact_widget">
	<?php if (get_field("celular", $widget_id)): ?>
		<div class="celular">
			<span class="clabel"><?php echo pll__('Celular:'); ?></span> <a href="tel:<?php the_field("celular", $widget_id); ?>"><?php the_field("celular", $widget_id); ?></a>
		</div>
	<?php endif; ?>
	<?php if (get_field("fijo", $widget_id)): ?>
		<div class="fijo">
			<span class="clabel"><?php echo pll__('Fijo:'); ?></span> <a href="tel:<?php the_field("fijo", $widget_id); ?>"><?php the_field("fijo", $widget_id); ?></a>
		</div>
	<?php endif; ?>
	<?php if (get_field("texto_boton", $widget_id)): ?>
		<a href="<?php the_field("url_boton", $widget_id); ?>" class="btn-style-1" rel="alternate"><?php the_field("texto_boton", $widget_id); ?></a>
	<?php endif; ?>
</div>
