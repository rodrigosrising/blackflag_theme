<?php if( have_rows('destaques', 'option') ):  while( have_rows('destaques', 'option') ): the_row(); ?>
		<div class="feature-box">
			<div class="row">
				<div class="small-12 medium-6 large-3 columns">
					<h4><?php the_sub_field('titulo_destaque_1'); ?></h4>
					<p><small><?php the_sub_field('texto_destaque_1'); ?></small></p>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<h4><?php the_sub_field('titulo_destaque_2'); ?></h4>
					<p><small><?php the_sub_field('texto_destaque_2'); ?></small></p>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<h4><?php the_sub_field('titulo_destaque_3'); ?></h4>
					<p><small><?php the_sub_field('texto_destaque_3'); ?></small></p>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<h4><?php the_sub_field('titulo_destaque_4'); ?></h4>
					<p><small><?php the_sub_field('texto_destaque_4'); ?></small></p>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>