<?php
/*-------------------------------------------------------------------------*/
/*  Custom Wordpress Login
/*-------------------------------------------------------------------------*/

function custom_url( $url ) {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'custom_url' );

function cutom_admin_style() {
	echo "<style type=\"text/css\">
	body.login{
		background-color: #131313;
		background-image: url(".get_bloginfo('template_directory')."/assets/img/fundo.jpg);
		-webkit-background-size: cover;
		-moz-background-size: cover;
		background-size: cover;
		background-position: center;
	}
	body.login div#login h1 a {
		background: url(".get_bloginfo('template_directory')."/assets/img/blackflag_branco2.png) no-repeat 0 0;
		-webkit-background-size: 100%;
		-moz-background-size: 100%;
		background-size: 100%;
		width: 160px;
		height:120px;
	}
	body.login #backtoblog a, body.login #nav a{
		color:#fff;
	}
	body.login #login_error, body.login .message {
		border-left: 4px solid #FFFF00;
		background-color: #131313;
		color: #FFF;
		box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		font-weight: 300;
	}
	body.login form {
		margin-top: 20px;
		margin-left: 0;
		padding: 26px 24px 46px;
		background: #131313;
		box-shadow: 0 1px 3px rgba(0,0,0,.13);
		font-weight: 300;
	}
	body.login label{
		color:#fff;
		font-weight: 300;
	}
	body.login form .input, body.login form input[type=checkbox], body.login input[type=text] {
		border-color: #131313!important;
		background-color: #1f1d1d;!important
		color: #828282!important;
		text-shadow: 1px 1px 1px #080707!important;
		font-weight: 300;
		font-size: 1.2rem;
		line-height: 1.8rem;
		margin: 10px 6px 8px 0;
		padding: 3px 5px;
		box-shadow: inset 0 1px 2px rgba(10, 10, 10, 0.1);
		transition: box-shadow 0.5s, border-color 0.25s ease-in-out;
		color: #FFF;
	}
	input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus {
		border-color: transparent;
		background-color: #1f1d1d!important;
		-webkit-box-shadow: inset 2px 2px 8px #080707!important;
		box-shadow: inset 2px 2px 8px #080707!important;
	}
	body.login .button-primary {
		background: #FFFF00;
		border-color: transparent;
		box-shadow: none;
		color: #161616;
		text-decoration: none;
		text-shadow: none;
		border-radius:0;
		font-weight: 500;
		transition: background-color 0.5s, border-color 0.25s ease-in-out;
	}
	body.login .button-primary:hover, body.login .button-primary:focus{
		background: #eaea00;
		color: #161616;
		box-shadow: none;
		border-color: transparent;
	}
	</style>";
}
add_action( 'login_enqueue_scripts', 'cutom_admin_style' );

// Saudação customizada
function replace_howdy( $wp_admin_bar ) {
	$my_account=$wp_admin_bar->get_node('my-account');
	$newtitle = str_replace( 'Olá', 'Bem vindo', $my_account->title );            
	$wp_admin_bar->add_node( array(
		'id' => 'my-account',
		'title' => $newtitle,
		) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

// Customizar o Footer do WordPress
function remove_footer_admin () {
	echo '© <a href="http://blackflag.com.br/">Black Flag Publicidade</a> - Todos os direitos reservados';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/*-------------------------------------------------------------------------*/
/*  WP VERSION
/*-------------------------------------------------------------------------*/

// function bfc_remove_version(){
// global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
// }
// add_filter('pre_site_transient_update_core','bfc_remove_version');
// add_filter('pre_site_transient_update_plugins','bfc_remove_version');
// add_filter('pre_site_transient_update_themes','bfc_remove_version');
/*-------------------------------------------------------------------------*/
/*  WP ADMIN VERSION
/*-------------------------------------------------------------------------*/
function change_footer_version() {
	return ' ';
}
add_filter( 'update_footer', 'change_footer_version', 9999 );
