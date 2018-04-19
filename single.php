<?php require_once 'inc/security.php' ?>
<?php get_header(); ?>
	<div class="blog-wrapper main-blog">
	<div class="row">
		<div class="small-12 medium-8 large-9 columns">
			<?php	if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<section <?php post_class('inner-column-post') ?>>
					<div class="row">
						<div class="hide-for-small-only medium-2 columns text-right">
							<p class="stat uppercase"><?php the_time('d M'); ?></p>
							<p><small><?php the_category( ', ' ); ?></small></p>
						</div><!-- columns -->
						<div class="small-12 medium-10 columns">
							<header class="entry-header">
								<h1 class="post-title"><?php the_title( ); ?></h1>
								<div class="hide-for-medium">
									<p class="uppercase"><?php the_time('d M'); ?> <small class="float-right"><?php the_category( ', ' ); ?></small></p>
								<div class="entry-meta clearfix">
									<small>
										<span class="posted-on float-left">Publicado por <?php the_author_posts_link(); ?></span><!-- entry-meta -->
										<span class="comments-link float-right"><?php comments_number( ); ?></span><!-- comment-links -->
									</small>
								</div><!-- entry-meta -->
							</header><!-- entry-header -->
							<div class="entry-content clearfix">
								<?php the_content( ); ?>
								<?php social_share( ); ?>
							</div><!-- entry-content -->
							<div class="entry-footer clearfix">
								<div class="post-tags">
									<p><?php the_tags( 'Marcados em: ', '   ', '<br />' ); ?></p>
								</div><!-- post-tags -->
							</div><!-- entry-footer -->
							<div class="comments-area">
								<?php comments_template(); ?> 
							</div><!-- comments-area -->
						</div><!-- columns -->
					</div><!-- inner row -->
				</section><!-- section -->
			<?php endwhile; ?>
			<?php else:  ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; wp_reset_query(); ?>
		</div>
		<div class="small-12 medium-4 large-3 columns">
			<?php get_sidebar( 'sidebar' ); ?>
		</div>
	</div><!-- row -->
</div><!-- blog-wrapper -->
<?php get_footer(); ?>