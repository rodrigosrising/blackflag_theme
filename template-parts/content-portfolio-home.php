<div class="wrapper-container-portfolio">
	<div class="row expanded collapse" data-equalizer data-equalize-on="small" data-equalize-on-stack="true">

		<div <?php post_class('columns small-12 medium-6 large-3 portfolio-first'); ?> data-equalizer-watch>
			<span>
			<blockquote>
				<p>Design, publicidade e propaganda, mídias digitais, web design, gerenciamento e planejamento de redes sociais, produção de conteúdo, eventos, ativação de marca, embalagem, planejamento de mídia, branding, diagramação de livros e revistas, planejamento de marketing, comunicação corporativa e muito mais…</p>
			</blockquote>

			</span>
		</div><!-- portfolio-item -->

	<?php $portfolio = new WP_Query(array(
		'posts_per_page' => 10,
		'post_type' => 'portfolio',
		'orderby' => 'rand',
	));
	if ($portfolio->have_posts()) : while ($portfolio->have_posts()) : $portfolio->the_post(); ?>
		<?php
			global $wp_query;
			$terms = get_the_term_list( $post->ID, 'portfolio_category', '', ' e ', '' );
			$terms = strip_tags( $terms );
		?>

		<div onclick="self.location.href='<?php the_permalink(); ?>'" id="post-<?php the_ID(); ?>" <?php post_class('columns small-12 medium-6 large-3 portfolio-item'); ?> data-equalizer-watch>
		<?php the_post_thumbnail(  ) ?>
			<div class="item-content">
				<div class="text-container">
					<h4><a href="<?php the_permalink(); ?>" title="<?php the_title( ); ?>" alt="<?php the_title( ); ?>" rel="bookmark"><?php the_title( ); ?></a></h4>
					<p class="portfolio-terms"><small><?php echo $terms;?></small> <i class="fa fa-info-circle" aria-hidden="true"></i></p>
				</div>
			</div><!-- item-content -->
		</div><!-- portfolio-item -->
		<?php endwhile; endif; wp_reset_postdata(); ?>


		<div onclick="self.location.href='<?php echo site_url('/trabalhos'); ?>'" <?php post_class('columns small-12 medium-6 large-3 portfolio-item portfolio-veja-mais'); ?> data-equalizer-watch>
			<img src="<?php echo get_theme_file_uri('assets/img/BF-site.png'); ?>" alt="">
			<span>
			<p class="button uppercase">Veja todos os trabalhos</p>
			</span>
		</div><!-- portfolio-item -->


	</div>
</div>