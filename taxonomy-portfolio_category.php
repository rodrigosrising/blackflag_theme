<?php get_header(); ?>
	<main  <?php post_class('main'); ?>>
	<div class="wrapper-container-portfolio">
			<div class="row expanded collapse">

			<?php
			// Get posts (tweak args as needed)
			$queried_object = get_queried_object();

			$portfolio = new WP_Query(array(
				'posts_per_page' => -1,
				'post_type' => 'portfolio',
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => $queried_object->taxonomy,
						'field' => 'slug',
						'terms' => $queried_object->slug,
					),
				)
			));
			if ($portfolio->have_posts()) : while ($portfolio->have_posts()) : $portfolio->the_post(); ?>
				<?php
					global $wp_query;
					$terms = get_the_term_list( $post->ID, 'portfolio_category', '', ' e ', '' );
					$terms = strip_tags( $terms );
				?>
				<div onclick="self.location.href='<?php the_permalink(); ?>'" id="post-<?php the_ID(); ?>" <?php post_class('columns small-12 medium-6 large-3 portfolio-item'); ?> >
				<?php the_post_thumbnail(  ) ?>
					<div class="item-content">
						<div class="text-container">
							<h4><a href="<?php the_permalink(); ?>" title="<?php the_title( ); ?>" alt="<?php the_title( ); ?>" rel="bookmark"><?php the_title( ); ?></a></h4>
							<p class="portfolio-terms"><small><?php echo $terms;?> <i class="fa fa-info-circle" aria-hidden="true"></i></small></p>
						</div>
					</div><!-- item-content -->
				</div><!-- portfolio-item -->
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</main><!-- main -->
<?php get_footer(); ?>