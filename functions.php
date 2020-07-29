<?php 

include 'taxfunction.php';
include 'metafunction.php';

//function load_style_script() {
    // wp_enqueue_script('jquery-1', 'http://code.jquery.com/jquery-1.11.0.min.js');
    // wp_enqueue_script('jquery-mig', get_template_directory_uri() . '/js/jquery-migrate-1.2.1.min.js');
    // wp_deregister_script('jquery');
    // wp_enqueue_script( 'jquery' );
    // wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.11.0.min.js');
    // wp_enqueue_script('jquery-mig', 'https://code.jquery.com/jquery-migrate-1.2.1.min.js');
    // wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.js');
    // wp_enqueue_script('javascript', get_template_directory_uri() . '/js/js.js');
    // wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
//}


// add_action('wp_enqueue_scripts', 'load_style_script');

add_theme_support('post-thumbnails');
// add_theme_support('custom-fields');


add_action( 'after_setup_theme', function() { 
	register_nav_menus( [
        'page_menu' => 'Меню страниц',
        'main_menu' => 'Меню категорий',
        'cat_menu' => 'Меню категорий сайдбара'
	] );
} );

register_sidebars(2, array(
    'name' => 'Виджеты сайдбара %d',
    'id' => 'sidebar',
    'description' => 'Здесь размещайте виджеты'
));

add_action( 'init', 'news' );
function news() {
    register_post_type('news', array(
      'public' => true,
      'supports'  => array ('thumbnail', 'title', 'editor', 'excerpt'),
      'menu_icon' => 'dashicons-format-aside',
      'labels' => array(
          'name' => 'Новости',
          'all_items' => 'Все новости',
          'add_new' => 'Добавить новую',
          'add_new_item' => 'Добавить новость'         
        )
    ));
}

add_action( 'init', 'brend' );
function brend() {
    register_post_type('brend', array(
      'has_archive' => true,
      'public' => true,
      'supports'  => array ('thumbnail', 'title'),
      'menu_icon' => 'dashicons-media-spreadsheet',
      'labels' => array(
          'name' => 'Бренды',
          'all_items' => 'Все бренды',
          'add_new' => 'Добавить новый',
          'add_new_item' => 'Добавить бренд'         
        ),
        'has_archive' => true
    ));
}

add_action( 'init', 'license' ); 
function license() {
    register_post_type('license', array(
      'public' => true,
      'supports'  => array ('thumbnail', 'title', 'editor'),
      'menu_icon' => 'dashicons-awards',
      'labels' => array(
          'name' => 'Лицензии',
          'all_items' => 'Все лицензии',
          'add_new' => 'Добавить лицензию',
          'add_new_item' => 'Добавить новую'         
      )
    ));
}

add_action( 'init', 'awards' ); 
function awards() {
    register_post_type('awards', array(
      'public' => true,
      'supports'  => array ('thumbnail', 'title', 'editor'),
      'menu_icon' => 'dashicons-awards',
      'labels' => array(
          'name' => 'Награды',
          'all_items' => 'Все награды',
          'add_new' => 'Добавить награду',
          'add_new_item' => 'Добавить новую'         
      )
    ));
}

add_action( 'init', 'blog' ); 
function blog() {
    register_post_type('blog', array(
      'public' => true,
      'supports'  => array ('thumbnail', 'title', 'editor'),
      'menu_icon' => 'dashicons-format-image',
      'labels' => array(
          'name' => 'Блог',
          'all_items' => 'Все заметки',
          'add_new' => 'Добавить новую',
          'add_new_item' => 'Добавить новую'         
      )
    ));
}

add_action( 'init', 'contact' ); 
function contact() {
    register_post_type('contact', array(
      'public' => true,
      'supports'  => array ('title', 'editor'),
      'menu_icon' => 'dashicons-location-alt',
      'labels' => array(
          'name' => 'Контакты',
          'all_items' => 'Все контакты',
          'add_new' => 'Добавить новый',
          'add_new_item' => 'Добавить контакт'
          
      )
    ));
}


function the_breadcrumb() {
    echo '<div id="breadcrumb"><ul><li><a href="/">На первую страницу</a></li><li>></li>';

    if ( is_category() || is_single() ) {
        $cats = get_the_category();
        $cat = $cats[0];
        echo '<li><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></li><li>></li>';
    }

    if(is_single()){
        echo '<li>';
        the_title();
        echo '</li>';
    }

    if(is_page()){
        echo '<li>';
        the_title();
        echo '</li>';
    }

    echo '</ul><div class="clear"></div></div>';
}

?>