<div class="wrapper-container-empresas">
	<div class="row expanded align-middle">
		<div class="columns small-12 text-center">
			<h3 class="uppercase">Conheça alguns Clientes Já Atendidos</h3>
		</div><!-- columns -->
		<div class="columns small-12">
			<!-- Set up your HTML -->
			<div class="owl-empresas owl-carousel owl-theme">
				<?php if(have_rows( 'clientes', 'option' )): ?>
				<?php while(have_rows( 'clientes', 'option' )): the_row(); ?>
					<img src="<?php the_sub_field('imagem_cliente'); ?>" alt="">
				<?php endwhile; endif; ?>
			</div><!-- owl-empresas -->
		</div><!-- columns -->
	</div><!-- row -->
</div><!-- wrapper-empresas -->