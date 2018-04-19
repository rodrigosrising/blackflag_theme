<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="theme-color" content="#131313">
	<meta name="google-site-verification" content="CWsvIfXi9ZscBuaSmWuT4n1MxkpKNUwhrFpSMuCrmuA" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head( ); ?>
	<?php
	setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
	date_default_timezone_set('America/Sao_Paulo');
	?>
</head>
<body <?php body_class( 'body' ); ?>>
	<?php if (is_front_page()): ?>
		<?php if (get_field('video_background', 'option')): ?>
			<div class="video-off-canvas off-canvas-wrapper">
		<?php else : ?>
			<div class="off-canvas-wrapper">
		<?php endif; ?>
	<?php else : ?>
		<div class="off-canvas-wrapper">
	<?php endif; ?>
	<!-- <div class="off-canvas-wrapper"> -->
		<div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas data-transition="push">
			<!-- Your menu or Off-canvas content goes here -->
			<button class="close-button" aria-label="Close menu" type="button" data-close>
				<span aria-hidden="true">&times;</span>
			</button>
			<nav>
				<?php
				wp_nav_menu( array(
					'container' => false,
					'theme_location'  => 'menu-header',
					'menu'            => 'menu-header',
					'menu_class'      => 'vertical menu off-menu',
					'menu_id'         => '', ) );
				?><!-- menu -->
			</nav><!-- nav -->
		</div><!-- off-canvas-menu -->

		<div class="off-canvas-content" data-off-canvas-content>
			<header class="header">
				<div class="main-header-content">
					<div class="row">
						<div class="small-12 columns inner-header">
							<div class="row">
								<div class="shrink columns logo-home">
								<?php
								if ( function_exists( 'the_custom_logo' ) ) {
										the_custom_logo();
									};
								?>
								</div><!-- shrink logo -->
								<div class="columns nav-menu-column">
									<div class="row">
										<div class="columns small-12 info-header text-right show-for-medium">
											<?php if( have_rows('contato', 'option') ):  while( have_rows('contato', 'option') ): the_row(); ?>
												<p><small><i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_sub_field('endereco', 'option'); ?></small> <small><i class="fa fa-phone" aria-hidden="true"></i> <?php the_sub_field('telefones', 'option'); ?></small></p>
											<?php endwhile; endif; ?>

										</div><!-- columns -->
										<div class="columns small-12">
											<button class="menu-icon hide-for-medium float-right" type="button" data-open="offCanvasLeft"></button>
											<nav class="float-right hide-for-small-only">
												<?php
												wp_nav_menu( array(
													'container' => false,
													'theme_location'  => 'menu-header',
													'menu'            => 'menu-header',
													'menu_class'      => 'menu header-menu',
													'menu_id'         => '', ) );
												?><!-- menu -->
											</nav><!-- nav -->
										</div><!-- columns nav-container -->
									</div><!-- row -->
								</div><!-- columns menu -->
							</div><!-- inner-row -->
						</div><!-- columns -->
					</div><!-- row -->
				</div><!-- main-header-container -->
				<?php if (is_front_page()): ?>
				<!-- VIDEO BACKGROUND IF-->
				<?php if (get_field('video_background', 'option')): ?>
					<div class="video-background">
						<?php
							function convertYoutube($string) {
								return preg_replace(
									"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
									"<iframe width=\"100%\" height=\"100%\" src=\"//www.youtube.com/embed/$2?autoplay=1&mute=1&playlist=$2&loop=1&autohide=1&controls=0&showinfo=0\" allowfullscreen frameborder=\"0\"></iframe>",
									$string
								);
							}
							$youtube_link = get_field('video_background', 'option');
						?>
						<video autoplay loop="true" width="1280" height="720" poster="<?php the_field('capa', 'option');  ?>" class="video-wrapper">
						<source type="video/webm" src="<?php the_field('video_mp4', 'option');  ?>">
						<source type="video/mp4" src="<?php the_field('video_mp4', 'option');  ?>">
						</video>
						<div class="text-container">
							<div class="row">
								<div class="columns small-12">
									<h3 class="titulo-banner no-before-after"><?php the_field( 'texto' , 'option'); ?></h3>
								</div>
							</div>
						</div>
					</div>
					<div class="home-animation" id="gctu1w_animation"></div>
				<?php else: ?><!-- VIDEO BACKGROUND ELSE-->

					<div class="owl-carousel owl-theme olw-home-slides">
						<?php if(have_rows( 'slides', 'option' )): ?>
						<?php while(have_rows( 'slides', 'option' )): the_row(); ?>
							<?php if (get_sub_field('link')): ?>
									<div class="the_slide" style="background-image:url('<?php the_sub_field('banner_slide'); ?>');" data-src="<?php the_sub_field('banner_slide'); ?>">
										<div class="titulo-banner-container">
											<div class="inner-banner-container">
												<a target="_self" href="<?php the_sub_field( 'link' ); ?>"><h3 class="titulo-banner no-before-after"><?php the_sub_field( 'texto_da_imagem' ); ?></h3></a>
												<a target="_self" href="<?php the_sub_field( 'link' ); ?>" class="saiba-mais-banner button clearfix">Saiba Mais</a>
											</div><!-- inner-banner-container -->
										</div><!-- titulo-banner-container -->
									</div><!-- background-->
							<?php else: ?>
								<div class="the_slide" style="background-image:url('<?php the_sub_field('banner_slide'); ?>');" data-src="<?php the_sub_field('banner_slide'); ?>">
										<div class="titulo-banner-container">
											<div class="inner-banner-container">
												<h3 class="titulo-banner no-before-after"><?php the_sub_field( 'texto_da_imagem' ); ?></h3>
											</div><!-- inner-banner-container -->
										</div><!-- titulo-banner-container -->
									</div><!-- background -->
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</div><!-- home-slides -->

					<?php endif; ?><!-- VIDEO BACKGROUND END IF-->

				<?php elseif (is_home() || is_category( ) || is_archive() || is_tag( ) || is_404()|| is_search()): ?>
				<div class="background-header">
					<div class="background-header-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/blackflag-blog.jpg')" data-stellar-background-ratio="0.5"></div>
					<!-- <div class="home-animation" id="gctu1w_animation"></div> -->
				</div>
				<?php else: ?>
				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<div class="background-header">
					<div class="background-header-image" style="background-image: url('<?php echo $thumb['0'];?>')" data-stellar-background-ratio="0.5"></div>
					<!-- <div class="home-animation" id="gctu1w_animation"></div> -->
				</div>
				<?php endif; ?>
			</header><!-- header -->