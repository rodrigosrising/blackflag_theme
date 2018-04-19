<?php /* Template Name: Contato */ ?>
<?php get_header(); ?>
	<main  <?php post_class('main'); ?>>
		<div class="row">
			<div class="columns small-12 portfolio-content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				<?php endwhile; else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
				<div class="row">
					<div class="small-12 medium-7 large-8 columns">
						<?php echo do_shortcode( '[contact-form-7 id="145" title="Formulário de contato 1"]' ); ?>
					</div>
					<div class="small-12 medium-5 large-4 columns">
						<?php if( have_rows('contato', 'option') ):  while( have_rows('contato', 'option') ): the_row(); ?>
							<address>
								<h3>Endereço</h3>
								<?php if( get_sub_field('endereco', 'option') ): ?>
									<p><small><i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_sub_field('endereco', 'option'); ?></small></p>
								<?php endif; ?>
								<?php if( get_sub_field('telefones', 'option') ): ?>
									<p><small><i class="fa fa-phone" aria-hidden="true"></i> <?php the_sub_field('telefones', 'option'); ?></small></p>
								<?php endif; ?>
								<?php if( get_sub_field('email', 'option') ): ?>
									<p><small><i class="fa fa-envelope" aria-hidden="true"></i> <?php the_sub_field('email', 'option'); ?></small></p>
								<?php endif; ?>
							</address>
						<?php endwhile; endif; ?>
						<div class="responsive-embed">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3603.224780688372!2d-49.293864948775514!3d-25.43074753907189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dce3f03783fabb%3A0x570ce90687fdd9dd!2sAv.+C%C3%A2ndido+Hartmann%2C+528+-+56+-+Merc%C3%AAs%2C+Curitiba+-+PR%2C+80710-570!5e0!3m2!1spt-BR!2sbr!4v1488828047496" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div><!-- maps -->
					</div><!-- columns -->
				</div><!-- row -->
			</div><!-- columns -->
		</div><!-- row -->
	</main><!-- main -->
<?php get_footer(); ?>