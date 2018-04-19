<?php /* Template Name: trabalhos */ ?>
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
			</div>
		</div>
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