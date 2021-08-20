<?php @ini_set( 'upload_max_size' , '12M' );@ini_set( 'post_max_size', '12M');@ini_set( 'max_execution_time', '300' );


//Trocar Logomarca

// function minha_logomaraca(){
//     //Estrutura

//     register_post_type('logomarca',
//         array(
//             'labels' => array(
//                 'name' => __('Trocar Logomarca'),
//                 'singular_name' => __('logomarca')
//             ),

//             'public'      => true,
//             'has_archive' => true,
//             'menu_icon'   => 'dashicons-format-image',
//             'supports'     => array('title', 'thumbnail', 'page-attributes'),
//             'rewrite' => true,

//         )
//     );
// }
// add_action('init', 'minha_logomaraca');




function tamanhos_thumbs(){
    add_theme_support('post-thumbnails');
    add_image_size('icones_thumb', 128, 128, true);
    add_image_size('banner-image', 9999, 600, true);
    add_image_size('post-image', 100, 100, true);
    add_image_size('post-image2', 200, 100, true);
    add_image_size('busca-image', 200, 150, true);
    add_image_size('post-menor-image', 9999, 150, true);
}
add_action('after_setup_theme', 'tamanhos_thumbs');


// Limite de caracteres
function new_excerpt_length($length) {
    return 10;
}
add_filter('excerpt_length', 'new_excerpt_length');


//Limite Caracteres do Titulo das postagens menores

function title_limite($maximo) {
    $title = get_the_title();
    if ( strlen($title) > $maximo ) {
        $continua = '...';
    }
    $title = mb_substr( $title, 0, $maximo, 'UTF-8' );
    echo $title.$continua;
}


//função para menus
register_nav_menus(
    array(
        'meu_menu_principal' => 'Menu Principal Tema',
        'menu_rodape' => 'Menu Localizado no Rodapé da Página',
        'menu_mapa' => 'Menu Mapa do Site',
    )
);


//Caminho de Pão


function custom_breadcrumbs() {

    // Configuracoes
    $separator          = '/';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumb';
    $home_title         = 'Home';

    // Se você tiver algum tipo de postagem personalizado com taxonomias personalizadas, coloque o nome da taxonomia abaixo (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Obter as informações de consulta e publicação
    global $post,$wp_query;

    // Não exibir na página inicial
    if ( !is_front_page() ) {

        // Construa o breadcrumbs
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';


        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</span></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // Se post é um tipo de postagem personalizado
            $post_type = get_post_type();

            // Se for um nome e link de exibição de tipo de postagem personalizado
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . $custom_tax_name . '</span></li>';

        } else if ( is_single() ) {

            $post_type = get_post_type();

            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            // Obter informações de categoria
            $category = get_the_category();

            if(!empty($category)) {

                // A última publicação da categoria está em
                $last_category = end(array_values($category));

                // Obter pai de qualquer categoria
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop através de categorias pai e armazenar em variável $ cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                }

            }

            // Se for um tipo de publicação personalizado dentro de uma taxonomia personalizada
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Verifique se o post está em uma categoria
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

                // Em caso de publicação em uma taxonomia personalizada
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            }

        } else if ( is_category() ) {

            // Página Category
            echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';

        } else if ( is_page() ) {

            // Página padrão
            if( $post->post_parent ){


                $anc = get_post_ancestors( $post->ID );

                $anc = array_reverse($anc);

                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                echo $parents;

                // Página Atual
                echo '<li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';

            } else {

                // Basta exibir a página atual se não os pais
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></li>';

            }

        } else if ( is_tag() ) {

            // Página de Tag

            // Obter informações de tag
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Exibir o nome da Tag
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</span></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></li>';

        } else if ( is_month() ) {

            // Arquivo

            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';


            echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></li>';

        } else if ( is_year() ) {


            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></li>';

        } else if ( is_author() ) {

            // Autor

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );


            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></li>';

        } else if ( get_query_var('paged') ) {


            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</span></li>';

        } else if ( is_search() ) {

            // Página Search
            echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Resultado da pesquisa por: ' . get_search_query() . '">Resultado da pesquisa por: ' . get_search_query() . '</span></li>';

        } elseif ( is_404() ) {

            // Pagina 404
            echo '<li>' . 'Página não encontrada' . '</li>';
        }

        echo '</ul>';

    }

}

/******************************************************** */

function wpb_custom_new_menu() {
    register_nav_menus(
      array(
        'menu-top' => __( 'Menu Top' ),
      )
    );
  }
  add_action( 'init', 'wpb_custom_new_menu' );

  function wpb_custom_rodape_menu() {
    register_nav_menus(
      array(
        'menu-rodape' => __( 'Menu Rodape' ),
      )
    );
  }
  add_action( 'init', 'wpb_custom_rodape_menu' );

  function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function atg_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'menu-item') {
      $classes[] = 'list-inline-item';
    }
    return $classes;
  }
  add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
      $atts['class'] = $args->link_class;
    }
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );


  /***** Form Comments ****/

  