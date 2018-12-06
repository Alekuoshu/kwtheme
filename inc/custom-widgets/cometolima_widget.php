<div class="cometolima_widget">
	<div class="row">
		<div class="col-sm-6">
			<div class="image-container">
				<img src="<?php the_field("image", $widget_id); ?>" alt="<?php the_field("title", $widget_id); ?>">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="content">
				<?php if (get_field("title", $widget_id)): ?>
					<h3 class="widget-title"><?php the_field("title", $widget_id); ?></h3>
					<h4 class="subtitle"><?php the_field("subtitle", $widget_id); ?></h4>
					<p><?php the_field("description", $widget_id); ?></p>
				<?php endif; ?>
				<?php if (get_field("boton_1", $widget_id)): ?>
					<a href="<?php the_field("url_boton_1", $widget_id); ?>" class="btn-style-2" rel="external"><?php the_field("boton_1", $widget_id); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
