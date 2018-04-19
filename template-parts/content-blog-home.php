<?php
$args = array(
	'post_status' => 'publish',
	'post_type'   => 'post',
	'posts_per_page' => 4
	);
$query_blog = new WP_Query( $args );
?>
<?php if( $query_blog->have_posts() ) : ?>
	<div class="blog-wrapper main-blog">
		<div class="row expanded">
			<div class="large-12 columns">
				<h2 class="text-center">BLOG</h2>
			</div><!-- columns -->
		</div><!-- row -->
		<div class="row expanded blog-container" data-equalizer data-equalize-on="medium" id="blog-eq">
			<?php  while( $query_blog->have_posts() ) : $query_blog->the_post(); ?>
			<div class="small-12 large-6 columns column-post" data-equalizer-watch>
				<div class="row">
					<div class="small-3 medium-2 columns text-right">
						<p class="stat uppercase"><?php the_time('d M'); ?></p>
						<p><small><?php the_category( ', ' ); ?></small></p>
					</div><!-- columns -->
					<div class="small-9 medium-10 columns">
						<h4 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title( ); ?>" alt="<?php the_title( ); ?>" rel="bookmark"><?php the_title( ); ?></a></h4>
						<p><?php the_excerpt(); ?></p>
					</div><!-- columns -->
				</div><!-- inner row -->
			</div><!-- columns post -->
		<?php endwhile; ?>

	</div><!-- row -->
	<div class="row expanded">
		<div class="large-12 columns">
			<a href="<?php echo site_url('/blog.php'); ?>" class="button ver-blog">Ver todos os posts do blog</a>
		</div><!-- columns -->
	</div><!-- row -->
</div><!-- blog-wrapper -->
<?php endif; wp_reset_query(); ?>