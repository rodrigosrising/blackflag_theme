<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area row" role="complementary">
		<?php dynamic_sidebar( 'blog_sidebar' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>