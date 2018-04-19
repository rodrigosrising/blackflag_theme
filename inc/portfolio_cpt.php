<?php require_once 'security.php' ?>
<?php

function my_custom_post_portfolios() {
	$labels = array(
		'name' => __( 'Portfólios', 'portfolios' ),
		'singular_name' => __( 'portfolio', 'portfolios' ),
		'add_new' => _x( 'Adicionar novo', 'portfolios' ),
		'all_items' => _x( 'Todos os Portfólios', 'portfolios' ),
		'add_new_item' => _x( 'Adicionar novo portfolio', 'portfolios' ),
		'edit_item' => _x( 'Editar portfolio', 'portfolios' ),
		'new_item' => _x( 'Novo portfolio', 'portfolios' ),
		'view_item' => _x( 'Ver portfolio', 'portfolios' ),
		'search_items' => _x( 'Procurar Portfólios', 'portfolios' ),
		'not_found' => _x( 'Nenhum portfolio encontrado', 'portfolios' ),
		'not_found_in_trash' => _x( 'Nenhum portfolio encontrado na lixeira', 'portfolios' ),
		'parent_item_colon' => null,
		'menu_name' => _x( 'Portfólios' ),
		);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'menu_position' => 5,
		'menu_icon'           => 'dashicons-format-gallery',
		'supports'      => array( 
			'title', 
			'editor',
			'author',
			'thumbnail', 			
			'page-attributes',
			'post-formats'
			),
		'has_archive'   => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => 5,
		'exclude_from_search' => true,
		'rewrite' => array( 'slug' => '', 'with_front' => true ),
		'can_export' => true,
		);
	register_post_type( 'portfolio', $args ); 
}
add_action( 'init', 'my_custom_post_portfolios' );


function my_taxonomies_portfolio() {
	$labels = array(
		'name'              => _x( 'Categorias de Portfólios', 'taxonomy general name' ),
		'singular_name'     => _x( 'Categoria', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Categoria' ),
		'all_items'         => __( 'Todas as Categorias' ),
		'parent_item'       => null,
		'parent_item_colon' => null,
		'edit_item'         => __( 'Editar Categoria' ), 
		'update_item'       => __( 'Atualizar Categoria' ),
		'add_new_item'      => __( 'Adicionar Nova Categoria' ),
		'new_item_name'     => __( 'Nova Categoria' ),
		'menu_name'         => __( 'Categorias Portfólios' ),
		);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'has_archive' => true,
		'public'        => true,
		'rewrite' => array(
			'slug' => 'portfolios' ),
		);
	register_taxonomy( 'portfolio_category', 'portfolio', $args );
}
add_action( 'init', 'my_taxonomies_portfolio', 0 );




    // SHOW CUSTOM POST CONTENT

add_filter( 'manage_taxonomies_for_portfolio_columns', 'portfolio_type_columns' );
function portfolio_type_columns( $taxonomies ) {
	$taxonomies[] = 'activity-type';
	return $taxonomies;
}

// ADD CUSTOM TAXONOMIES TO POST_CLASS
    // add_filter( 'post_class', 'custom_taxonomy_post_class', 10, 3 );
    // if( !function_exists( 'custom_taxonomy_post_class' ) ) {
    //     function custom_taxonomy_post_class( $classes, $class, $ID ) {
    //         $taxonomy = 'portfolio_category';
    //         $terms = get_the_terms( (int) $ID, $taxonomy );
    //         if( !empty( $terms ) ) {
    //             foreach( (array) $terms as $order => $term ) {
    //                 if( !in_array( $term->slug, $classes ) ) {
    //                     $classes[] = $term->slug;
    //                 }
    //             }
    //         }
    //         return $classes;
    //     }
    // }  