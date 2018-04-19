<?php require_once 'inc/security.php' ?>
<?php get_header(); ?>
	<main  <?php post_class('main portfolio-content'); ?>>
		<?php get_template_part( 'loop' ); ?>
	</main><!-- main -->
<?php get_footer(); ?>