<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
	<main <?php post_class('main'); ?>>
		<?php get_template_part( 'template-parts/content','home-features' ); ?>
		<?php get_template_part( 'template-parts/content','portfolio-home' ); ?>
		<?php get_template_part( 'template-parts/content','blog-home' ); ?>
		<?php get_template_part( 'template-parts/content','empresas' ); ?>
	</main><!-- main -->
<?php get_footer(); ?>
