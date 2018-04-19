			<footer class="footer">
				<div class="row">
					<div class="small-12 medium-4 column small-order-2 medium-order-1 nav-box">
						<nav>
							<?php
								wp_nav_menu( array(
									'container' => false,
									'theme_location'  => 'menu-footer',
									'menu'            => 'menu-footer',
									'menu_class'      => 'vertical menu',
									'menu_id'         => '', ) );
								?><!-- menu -->
						</nav><!-- nav -->
					</div><!-- columns -->
					<div class="small-12 medium-4 column small-order-1 medium-order-2 address-box">
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
					</div><!-- columns -->
					<div class="small-12 medium-4 columns small-order-3 medium-order-3 social-box">
						<h3>Redes Sociais</h3>
						<p>Nos acompanhe em nossas redes sociais.</p>
						<div class="button-group social-buttons">
							<?php if( get_field('facebook', 'option') ): ?>
								<a href="<?php the_field('facebook', 'option'); ?>" class="button"><i class="fa fa-facebook"></i></a>
							<?php endif; ?>
							<?php if( get_field('instagram', 'option') ): ?>
								<a href="<?php the_field('instagram', 'option'); ?>" class="button"><i class="fa fa-instagram"></i></a>
							<?php endif; ?>
							<?php if( get_field('linkedin', 'option') ): ?>
								<a href="<?php the_field('linkedin', 'option'); ?>" class="button"><i class="fa fa-linkedin"></i></a>
							<?php endif; ?>
							<?php if( get_field('behance', 'option') ): ?>
								<a href="<?php the_field('behance', 'option'); ?>" class="button"><i class="fa fa-behance"></i></a>
							<?php endif; ?>
							<?php if( get_field('twitter', 'option') ): ?>
								<a href="<?php the_field('twitter', 'option'); ?>" class="button"><i class="fa fa-twitter"></i></a>
							<?php endif; ?>
							<?php if( get_field('youtube', 'option') ): ?>
								<a href="<?php the_field('youtube', 'option'); ?>" class="button"><i class="fa fa-youtube"></i></a>
							<?php endif; ?>
							<?php if( get_field('google_plus', 'option') ): ?>
								<a href="<?php the_field('google_plus', 'option'); ?>" class="button"><i class="fa fa-google-plus"></i></a>
							<?php endif; ?>
							<?php if( get_field('pinterest', 'option') ): ?>
								<a href="<?php the_field('pinterest', 'option'); ?>" class="button"><i class="fa fa-pinterest"></i></a>
							<?php endif; ?>
						</div><!-- button-group social-buttons -->
					</div><!-- columns -->
				</div><!-- row -->
				<hr>
				<div class="row">
					<div class="small-12 medium-8 medium-offset-2 text-center columns small-order-1 medium-order-2 newsletter-box">
						<h3>Newsletter</h3>
						<p>Assine nossa newsletter e receba nossas novidades.</p>
						<?php echo do_shortcode( '[contact-form-7 id="190" title="Newsletter"]' ); ?>
						<!-- <form action="">
							<div class="input-group">
								<input class="input-group-field" type="email" placeholder="email">
								<div class="input-group-button">
									<input type="submit" class="button" value="Assinar">
								</div>
							</div>
						</form> --> <!-- form -->
					</div><!-- columns -->
				</div><!-- row -->
				<hr>
				<div class="row">
					<div class="columns text-left copy">
						<p><small>© <?php echo date('Y'); ?> Black Flag Publicidade. Todos os direitos reservados</small></p>
					</div><!-- columns -->
					<div class="columns shrink">
						<ul class="menu-parceiros align-right">
							<li class="sinapro-pr">
								<a href="http://www.sinapropr.org.br/" target="_blank">Sinapro-PR</a>
							</li>
							<li class="cenp">
								<a href="http://www.cenp.com.br/" target="_blank">Cenp</a>
							</li>
						</ul>
					</div><!-- columns -->
				</div><!-- row -->
			</footer><!-- footer -->
		</div><!-- off-canvas-content -->
	</div><!-- off-canvas-wrapper -->
<?php wp_footer( ); ?>
</body>
</html>