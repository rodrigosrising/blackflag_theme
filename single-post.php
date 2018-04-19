<?php get_header(); ?>
	<div class="blog-wrapper main-blog">
	<div class="row">
		<div class="small-12 medium-8 large-9 columns">
			<?php	if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<section id="post-<?php the_ID(); ?>" <?php post_class('inner-column-post') ?>>
					<div class="row">
						<div class="hide-for-small-only medium-2 columns text-right">
							<p class="stat uppercase"><?php the_time('d M'); ?></p>
							<p><small><?php the_category( ', ' ); ?></small></p>
						</div><!-- columns -->
						<div class="small-12 medium-10 columns">
							<header class="entry-header">
								<h1 class="post-title"><?php the_title( ); ?></h1>
								<div class="entry-meta hide-for-small-only">
									<?php $user_post_count = count_user_posts( get_the_author_meta('ID') ); ?>
									<span class="posted-on">
										<p class="subheader">
											<small>
												<i class="fa fa-user" aria-hidden="true"></i> <?php the_author_posts_link(); ?> | <?php echo "Posts Publicados: {$user_post_count}"; ?>
												<span class="comments-link float-right" data-magellan><a href="#commentarea"><i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( ); ?></a></span><!-- comment-links -->
											</small>
										</p>
									</span><!-- entry-meta -->
								</div><!-- entry-meta -->
								<div class="hide-for-medium">
									<p class="uppercase"><small><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('d M'); ?></small> <small class="float-right"><i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_category( ', ' ); ?></small></p>
								<div class="entry-meta clearfix">
									<small>
										<span class="posted-on float-left"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span><!-- entry-meta -->
										<span class="comments-link float-right"><i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( ); ?></span><!-- comment-links -->
									</small>
								</div><!-- entry-meta -->
							</header><!-- entry-header -->
							<div class="entry-content clearfix">
								<?php the_content( ); ?>
								<?php social_share( ); ?>
							</div><!-- entry-content -->
							<?php if (has_tag( )): ?>
								<div class="entry-meta entry-footer clearfix">
									<div class="post-tags">
										<p><small><?php the_tags( '<i class="fa fa-tags" aria-hidden="true"></i> Marcados em: ', '   ', '<br />' ); ?></small></p>
									</div><!-- post-tags -->
								</div><!-- entry-footer -->
							<?php endif; ?>
							<div id="commentarea" class="comments-area" data-magellan-target="commentarea">
								<?php if ( comments_open() || get_comments_number() ) {
									comments_template();
								} ?>
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