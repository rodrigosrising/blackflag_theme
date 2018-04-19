<?php get_header(); ?>
	<main  <?php post_class('main'); ?>>
	<div class="wrapper-container-portfolio">
			<div class="row expanded collapse">
			<?php $portfolio = new WP_Query(array(
				'posts_per_page' => -1,
				'post_type' => 'portfolio',
				'orderby' => 'rand',
			));
			if ($portfolio->have_posts()) : while ($portfolio->have_posts()) : $portfolio->the_post(); ?>
				<?php
					global $wp_query;
					$terms = get_the_term_list( $post->ID, 'portfolio_category', '', ' e ', '' );
					$terms = strip_tags( $terms );
				?>
				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<div onclick="self.location.href='<?php the_permalink(); ?>'" id="post-<?php the_ID(); ?>" <?php post_class('columns small-12 medium-6 large-4 portfolio-item type-1'); ?> style="background-image: url('<?php echo $thumb['0'];?>')">
					<div class="item-content">
						<h4><a href="<?php the_permalink(); ?>" title="<?php the_title( ); ?>" alt="<?php the_title( ); ?>" rel="bookmark"><?php the_title( ); ?></a></h4>
						<p class="portfolio-terms"><small><i class="fa fa-folder-open" aria-hidden="true"></i> <?php echo $terms;?></small></p>
						<a href="<?php the_permalink(); ?>" title="<?php the_title( ); ?>" alt="<?php the_title( ); ?>" rel="bookmark">Ver Projeto</a>
					</div><!-- item-content -->
				</div><!-- portfolio-item -->
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</main><!-- main -->
<?php get_footer(); ?>