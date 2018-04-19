<div class="blog-wrapper main-blog">
	<div class="row">
		<div class="small-12 medium-8 large-9 columns">
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts(array(
				'paged' => $paged,
				'post_type' => 'post',
				));
				if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<section id="post-<?php the_ID(); ?>" <?php post_class('inner-column-post') ?>>
					<div class="row">
						<div class="small-12 medium-2 columns hide-for-small-only text-right">
							<p class="stat uppercase"><?php the_time('d M'); ?></p>
							<p><small><?php the_category( ', ' ); ?></small></p>
						</div><!-- columns -->
						<div class="small-12 medium-10 columns">
							<?php if (has_post_thumbnail( )): ?>
								<div class="thumbnail">
									<a href="<?php the_permalink(); ?>" title="<?php the_title( ); ?>" alt="<?php the_title( ); ?>" rel="bookmark"><?php the_post_thumbnail( 'blog-list-size' ); ?></a>
								</div><!-- thumbnail -->
							<?php endif ?>
							<h4 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title( ); ?>" alt="<?php the_title( ); ?>" rel="bookmark"><?php the_title( ); ?></a></h4>
							<div class="entry-meta hide-for-small-only">
								<?php $user_post_count = count_user_posts( get_the_author_meta('ID') ); ?>
								<span class="posted-on"><p class="subheader"><small><i class="fa fa-user" aria-hidden="true"></i> <?php the_author_posts_link(); ?> | <?php echo "Posts Publicados: {$user_post_count}"; ?><span class="comments-link float-right"><i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( ); ?></span><!-- comment-links --></small></p></span><!-- entry-meta -->
							</div><!-- entry-meta -->
							<div class="hide-for-medium">
								<p class="uppercase"><small><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('d M'); ?></small> <small class="float-right"><i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_category( ', ' ); ?></small></p>
							</div><!-- columns -->
							<p><?php the_excerpt(); ?></p>
							<?php if (has_tag( )): ?>
								<div class="entry-footer clearfix">
									<div class="post-tags">
										<p><small><?php the_tags( '<i class="fa fa-tags" aria-hidden="true"></i> Marcados em: ', '   ', '<br />' ); ?></small></p>
									</div><!-- post-tags -->
								</div><!-- entry-footer -->
							<?php endif; ?>
						</div><!-- columns -->
					</div><!-- inner row -->
				</section>
				<?php endwhile; ?>

				<!-- pagination here -->
				<div class="pagination-area">
					<?php bfp_custom_post_navigation(); ?>
				</div>
				<!-- pagination here -->
			<?php else:  ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; wp_reset_query(); ?>
		</div>
		<div class="small-12 medium-4 large-3 columns">
			<?php get_sidebar( 'sidebar' ); ?>
		</div>
	</div><!-- row -->
</div><!-- blog-wrapper -->