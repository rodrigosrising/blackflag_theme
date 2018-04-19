<?php
require_once 'inc/security.php';

if ( ! function_exists( 'bfp_setup' ) ) :
	function bfp_setup() {

/*-------------------------------------------------------------------------*/
/* ENQUEUE CSS
/*-------------------------------------------------------------------------*/
function bfp_enqueue_css() {

	wp_register_style( 'foundation', get_stylesheet_directory_uri() . '/assets/css/foundation.css' );
	wp_enqueue_style('foundation');
	wp_register_style( 'mui', get_stylesheet_directory_uri() . '/assets/css/mui.css' );
	wp_enqueue_style('mui');
	wp_register_style( 'slick', get_stylesheet_directory_uri() . '/assets/css/slick.css' );
	wp_enqueue_style('slick');
	wp_register_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style('font-awesome');
	wp_register_style( 'slick', get_stylesheet_directory_uri() . '/assets/css/slick.css' );
	wp_enqueue_style('slick');
	wp_register_style( 'slick-theme', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css' );
	wp_enqueue_style('slick-theme');
	wp_register_style( 'principal', get_stylesheet_directory_uri() . '/assets/css/app.css' );
	wp_enqueue_style('principal');
	wp_enqueue_style('stylesheet', get_stylesheet_directory_uri() . '/style.css');

}
add_action('wp_enqueue_scripts', 'bfp_enqueue_css', 99);

/*-------------------------------------------------------------------------*/
/*	ENQUEUE JAVASCRIPT
/*-------------------------------------------------------------------------*/
function bfp_add_scripts() {

	// wp_register_script('principal', get_template_directory_uri() . '/assets/js/vendor/jquery.js', array(), 'null', true);
	// wp_enqueue_script('principal');
	wp_enqueue_script('jquery');
	wp_register_script('what-input', get_template_directory_uri() . '/assets/js/vendor/what-input.min.js', array(), 'null', true);
	wp_enqueue_script('what-input');
	wp_register_script('foundation', get_template_directory_uri() . '/assets/js/vendor/foundation.js', array(), 'null', true);
	wp_enqueue_script('foundation');
	wp_register_script('slickslide', get_template_directory_uri() . '/assets/js/slick.js', array(), 'null', true);
	wp_enqueue_script('slickslide');
	wp_register_script('bfpscript', get_template_directory_uri() . '/assets/js/app.js', array(), 'null', true);
	wp_enqueue_script('bfpscript');

}
add_action('wp_enqueue_scripts','bfp_add_scripts');

/*-------------------------------------------------------------------------*/
/* REMOVE CSS/JS VERSION
/*-------------------------------------------------------------------------*/
add_filter( 'style_loader_src', 'bfp_remove_version' );
add_filter( 'script_loader_src', 'bfp_remove_version' );

function bfp_remove_version( $url ){
	return remove_query_arg( 'ver', $url );
}

/*-------------------------------------------------------------------------*/
/* ADD ASYNC SCRIPTS
/*-------------------------------------------------------------------------*/
// add_filter( 'script_loader_tag', 'js_async_attr', 10 );
// function js_async_attr($tag){
// 	# Add async to all remaining scripts
// 	return str_replace( ' src', ' defer="defer" src', $tag );
// }

/*-------------------------------------------------------------------------*/
/*  POST THUMBNAIL SUPPORT
/*-------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 600, 600, true );
add_image_size( 'small-size', 300, 300, true );
add_image_size( 'medium-size', 500, 500, true );	
add_image_size( 'large-size', 800, 800, true );
add_image_size( 'blog-list-size', 700, 350, true );

/*-------------------------------------------------------------------------*/
/*  CUSTOM MENU SUPPORT
/*-------------------------------------------------------------------------*/
register_nav_menus( array(
	'menu-header' => 'Menu Header',
	'menu-footer' => 'Menu Footer',
	) );
	// ADD active class to current menu item
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	if( in_array('menu-item', $classes) ){
		$classes[] = 'columns ';
	}
	return $classes;
}
/*-------------------------------------------------------------------------*/
/*  REGISTER SIDEBAR
/*-------------------------------------------------------------------------*/
add_action( 'widgets_init', 'bfp_widgets_init' );
function bfp_widgets_init() {

	register_sidebar( array(
		'name'          => 'Blog Sidebar',
		'id'            => 'blog_sidebar',
		'before_widget' => '<aside class="widget-sidebar small-12 columns">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
		) );
}
/*-------------------------------------------------------------------------*/
/* THEME SUPORT
/*-------------------------------------------------------------------------*/
add_theme_support( 'custom-logo' );

/*-------------------------------------------------------------------------*/
/*  HTML5 SUPORT
/*-------------------------------------------------------------------------*/
add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
	) );

/*-------------------------------------------------------------------------*/
/*  WOOCOMMERCE SUPPORT
/*-------------------------------------------------------------------------*/
add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

/*-------------------------------------------------------------------------*/
/*  POST FORMATS
/*-------------------------------------------------------------------------*/
add_theme_support( 'structured-post-formats', array(
	'link', 'video'
	) );
add_theme_support( 'post-formats', array(
	'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status'
	) );

/*-------------------------------------------------------------------------*/
/* TITLE TAG AND FEED LINKS
/*-------------------------------------------------------------------------*/
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );

} endif;/*bfp_setup*/
add_action( 'after_setup_theme', 'bfp_setup' );

/*-------------------------------------------------------------------------*/
/*  PAGINATION
/*-------------------------------------------------------------------------*/
function bfp_custom_post_navigation() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<ul class="pagination text-center" role="navigation" aria-label="Pagination">' . "\n";

	/** Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link('Anterior') );

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="current"' : '';

		printf( '<li><a%s href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li class="ellipsis"></li>';
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="current"' : '';
		printf( '<li><a%s href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li class="ellipsis"></li>' . "\n";

		$class = $paged == $max ? ' class="current"' : '';
		printf( '<li><a%s href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link('Próxima') );

	echo '</ul>' . "\n";

}

add_filter( 'login_errors', 'no_wordpress_errors' );

function no_wordpress_errors(){
	return 'Há algo de errado aqui!';
}

/*-------------------------------------------------------------------------*/
/* EXCERPT LENGTH
/*-------------------------------------------------------------------------*/
function custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
	global $post;
	return '... <a href="'. get_permalink($post->ID) . '"> Continue lendo...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*-------------------------------------------------------------------------*/
/*  SOCIAL SHARE
/*-------------------------------------------------------------------------*/
function social_share(){
	?>
	<style type="text/css">
	p.share-info{
		margin-bottom: 0;
	}
	.share-buttons .has-tip{
		border: none;
	}
	.share-buttons a{
		border: none;
		width: 33px;
		height: 33px;
	}
	.share-buttons a.button{
		padding: 0;
		margin-right: 3px!important;
		color: #FFF;
	}
	.share-buttons a.button.facebook{
		background: rgb(59, 89, 152);
	}
	.share-buttons a.button.twitter{
		background: rgb(29, 161, 242);
	}
	.share-buttons a.button.linkedin{
		background: rgb(0, 119, 181);
	}
	.share-buttons a.button.google-plus{
		background: rgb(220, 78, 65);
	}
	.share-buttons a.button.whatsapp{
		background: rgb(77, 194, 71);
	}
	.share-buttons a i{
		font-size: 1.4rem;
		line-height: 2.4rem;
	}
	</style>
	<p class="share-info"><small>Compartilhe:</small></p>
	<div class="button-group share-buttons">
		<span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Facebook">
			<a class="button facebook" id="facebook-share" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'Compartilhar notícia', 'width=490,height=530');return false;"><i class="fa fa-facebook"></i></a>
		</span>
		<span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Twitter">
			<a class="button twitter" id="twitter-share" href="https://twitter.com/home?status=<?php the_permalink(); ?>" onclick="window.open(this.href, 'Compartilhar notícia', 'width=490,height=530');return false;"><i class="fa fa-twitter"></i></a>
		</span>
		<span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="LinkedIn">
			<a class="button linkedin" id="linkedin-share" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title( ); ?>&summary=&source=<?php bloginfo( 'url' ); ?>" onclick="window.open(this.href, 'Compartilhar notícia', 'width=490,height=530');return false;"><i class="fa fa-linkedin"></i></a>
		</span>
		<span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="Google plus">
			<a class="button google-plus" id="google-plus-share" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'Compartilhar notícia', 'width=490,height=530');return false;"><i class="fa fa-google-plus"></i></a>
		</span>
		<span data-tooltip aria-haspopup="true" class="has-tip top hide-for-large" data-disable-hover="false" tabindex="1" title="WhatsApp">
			<a class="button whatsapp" id="whatsapp-share" href="whatsapp://send?text=<?php the_permalink(); ?>" onclick="window.open(this.href, 'Compartilhar notícia', 'width=490,height=530');return false;"><i class="fa fa-whatsapp"></i></a>
		</span>
	</div>
	<?php
}

/*-------------------------------------------------------------------------*/
/* EXCLUDE PAGE AND CUSTOM POST TYPES FROM SEARCH
/*-------------------------------------------------------------------------*/
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');

/*-------------------------------------------------------------------------*/
/* CHANGE STICKY CLASS
/*-------------------------------------------------------------------------*/
function change_sticky_class( $classes ) {
    if ( in_array( 'sticky', $classes, true ) ) {
        $classes = array_diff($classes, array('sticky'));
        $classes[] = 'wp-sticky';
    }
    return $classes;
}
add_filter( 'post_class', 'change_sticky_class' );


/*-------------------------------------------------------------------------*/
/* REMOVE YOAST LICENCE
/*-------------------------------------------------------------------------*/
function remove_yoast_license_nag_from_admin_page() {
    echo
    '<style>
		div.yoast-notice-error {
			display: none!important;
		}
	</style>';
}

add_action('admin_head', 'remove_yoast_license_nag_from_admin_page');

/*-------------------------------------------------------------------------*/
/* CUSTOM ADDS
/*-------------------------------------------------------------------------*/
require get_template_directory() . '/inc/theme_acf_func.php';
require get_template_directory() . '/inc/custom_admin.php';
require get_template_directory() . '/inc/portfolio_cpt.php';
// require('inc/portfolio_cpt.php');

/*-------------------------------------------------------------------------*/
/*  ANALYTICS CODE
/*-------------------------------------------------------------------------*/
add_action('wp_footer', 'add_googleanalytics', 50);
remove_action('wp_footer', 'add_googleanalytics', 50);
function add_googleanalytics() { ?>
<!-- analytics async -->
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-66052500-1']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
<!-- analytics -->
<?php } 

/*-------------------------------------------------------------------------*/
/*  ADSENSE CODE
/*-------------------------------------------------------------------------*/
add_action('wp_footer', 'add_adsensecode', 50);
remove_action('wp_footer', 'add_adsensecode', 50);
function add_adsensecode() { ?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
(adsbygoogle = window.adsbygoogle || []).push({
	google_ad_client: "ca-pub-7577390149593374",
	enable_page_level_ads: true
});
</script>
<?php } 
