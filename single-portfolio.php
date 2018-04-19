<?php get_header('portfolio');?>
<main  <?php post_class('main'); ?>>
	<div class="row" id="post-<?php the_ID(); ?>" >
		<div class="small-12 columns portfolio-content">
			<?php if (have_posts()): while (have_posts()) : the_post();?>
				<?php
					global $wp_query;
					$terms = get_the_term_list( $post->ID, 'portfolio_category', '', ' e ', '' );
					// $terms = strip_tags( $terms );
				?>
				<h2><?php the_title( ); ?></h2>
				<?php the_content( ); ?>
				<div class="entry-meta clearfix">
					<p class="portfolio-terms"><small><i class="fa fa-folder-open" aria-hidden="true"></i> <?php echo $terms;?></small></p>
				</div><!-- entry-meta -->
			<?php endwhile; else:?>
			<?php endif; wp_reset_query(); ?>
		</div><!-- columns -->
	</div><!-- row -->
	<div class="row">
		<div class="small-12 columns portfolio-images">
			<?php if( have_rows('portfolio') ): // check if the repeater field has rows of data
				while ( have_rows('portfolio') ) : the_row();  ?> <!-- // loop through the rows of data -->
				<div class="single-image-portfolio">
					<img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_title( ); ?>">
				</div>
			<?php endwhile; else:?>
		<?php endif; wp_reset_query(); ?>

		<?php if( have_rows('videos') ): // check if the repeater field has rows of data
				while ( have_rows('videos') ) : the_row();  ?> <!-- // loop through the rows of data -->
				<div class="single-image-portfolio responsive-embed widescreen">
					
					<?php
					// get iframe HTML
					$iframe = get_sub_field('video');

					// use preg_match to find iframe src
					preg_match('/src="(.+?)"/', $iframe, $matches);
					$src = $matches[1];

					// add extra params to iframe src
					$params = array(
						'rel'        => 0,
						'controls'    => 0,
						'hd'        => 1,
						'autohide'    => 1
						);

					$new_src = add_query_arg($params, $src);

					$iframe = str_replace($src, $new_src, $iframe);

					// add extra attributes to iframe html
					$attributes = 'frameborder="0"';

					$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

					// echo $iframe
					echo $iframe;
					?>


				</div>
			<?php endwhile; else:?>
		<?php endif; wp_reset_query(); ?>
		</div><!-- columns -->
	</div>
</main><!-- main -->
<?php get_footer( );?>