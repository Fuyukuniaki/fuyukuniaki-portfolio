<?php
    add_theme_support( 'menus' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form' ) );

    // function hamburger_title( $title ) {
    //     if ( is_front_page() && is_home() ) { //トップページなら
    //         $title = get_bloginfo( 'name', 'display' );
    //     } elseif ( is_singular() ) { //シングルページなら
    //         $title = single_post_title( '', false );
    //     }
    //         return $title;
    //     }
    // add_filter( 'pre_get_document_title', 'hamburger_title' );

    function fuyukuniaki_script() {
        wp_enqueue_style( 'webfonts', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&family=M+PLUS+1:wght@100;300;500;700;800;900&display=swap', array() );
        wp_enqueue_script( 'font-awesome', '//kit.fontawesome.com/958005243b.js', array() );
        wp_enqueue_script( 'GA4', 'www.googleoptimize.com/optimize.js?id=OPT-KC7CGN5', array(), );
        wp_enqueue_script('javascript',  get_template_directory_uri() . '/js/script.js', array(), '1.0.0' );
        wp_enqueue_style( 'ress', '//unpkg.com/modern-css-reset/dist/reset.min.css', array() );
        wp_enqueue_style( 'fuyukuniaki', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' );
        wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.0.0' );
    }
    add_action( 'wp_enqueue_scripts', 'fuyukuniaki_script' );

    function fuyukuniaki_theme_add_editor_styles() {
        add_editor_style( get_template_directory_uri() . "/css/editor-style.css" );
    }
    add_action( 'admin_init', 'fuyukuniaki_theme_add_editor_styles' );

    function new_excerpt_more($more) {
        return ' ';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

    // function custom_search($search, $wp_query) {
    //     global $wpdb;

    //     if (!$wp_query->is_search)
    //     return $search;
    
    //     if (!isset($wp_query->query_vars))
    //     return $search;

    //     $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
    //     if ( count($search_words) > 0 ) {
    //         $search = '';
    //         foreach ( $search_words as $word ) {
    //             if ( !empty($word) ) {
    //                 $search_word = $wpdb->escape("%{$word}%");
    //                 $search .= " AND (
    //                         {$wpdb->posts}.post_title LIKE '{$search_word}'
    //                         OR {$wpdb->posts}.post_content LIKE '{$search_word}'
    //                         OR {$wpdb->posts}.ID IN (
    //                             SELECT distinct r.object_id
    //                             FROM {$wpdb->term_relationships} AS r
    //                             INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
    //                             INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
    //                             WHERE t.name LIKE '{$search_word}'
    //                         OR t.slug LIKE '{$search_word}'
    //                         OR tt.description LIKE '{$search_word}'
    //                         )
    //                         OR {$wpdb->posts}.ID IN (
    //                             SELECT distinct p.post_id
    //                             FROM {$wpdb->postmeta} AS p
    //                             WHERE p.meta_value LIKE '{$search_word}'
    //                         )
    //                 ) ";
    //             }
    //         }
    //     }
    //     return $search;
    // }
    // add_filter('posts_search','custom_search', 10, 2);

    // function searchin_change_posts_per_page( $query ) {
    //     if ( is_admin() || ! $query->is_main_query() ) {
    //       return;
    //     }
    //     if ( $query->is_search() ) {
    //       $query->set( 'posts_per_page', 5 );
    //     }
    //   }
    //   add_action( 'pre_get_posts', 'searchin_change_posts_per_page' );