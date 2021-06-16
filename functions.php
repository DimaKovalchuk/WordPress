<?php
function wpschool_create_movies_posttype() {
    $labels = array(
        'name' => _x( 'Книги', 'Тип записей Книги', 'root' ),
        'singular_name' => _x( 'Книга', 'Тип записей Книги', 'root' ),
        'menu_name' => __( 'Книги', 'root' ),
        'all_items' => __( 'Все книги', 'root' ),
        'view_item' => __( 'Смотреть книгу', 'root' ),
        'add_new_item' => __( 'Добавить новую книгу', 'root' ),
        'add_new' => __( 'Добавить новую', 'root' ),
        'edit_item' => __( 'Редактировать книгу', 'root' ),
        'update_item' => __( 'Обновить книгу', 'root' ),
        'search_items' => __( 'Искать книгу', 'root' ),
        'not_found' => __( 'Не найдено', 'root' ),
        'not_found_in_trash' => __( 'Не найдено в корзине', 'root' ),
    );

    $args = array(
        'label' => __( 'movies', 'root' ),
        'description' => __( 'Каталог книг', 'root' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies' => array( 'genres' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'movies', $args );

}
add_action( 'init', 'wpschool_create_movies_posttype', 0 );

function wpschool_add_movies_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'movies' ) );
    return $query;
}
add_action( 'pre_get_posts', 'wpschool_add_movies_to_query' );


