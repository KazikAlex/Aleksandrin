<?php
/*
 * Template Name: Блог
 */
?>

<?php get_header(); ?>

<div class="container">
    <div class="blog">
        <?php wp_nav_menu(array('theme_location' => 'page_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'sidebar_menu', 'container_class' => 'sidebar_menu_wrap',)); ?>
        <div class="blog_wrap">       
            <?php $blog = new WP_Query(array('post_type' => 'blog'));?>
            <?php if( $blog->have_posts() ) : ?> 
                <?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
                <div class="blog_item">
                    <div class="blog_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
                    <div class="blog_title"><?php the_title(); ?></div> 
                    <div class="blog_descr"><?php the_excerpt(); ?></div> 
                </div>        
                <?php endwhile; ?>
        </div>
    </div>
            <?php else: ?>
                <p>Место под слайдер</p>
            <?php endif; ?> 
                <?php wp_reset_query()?>   
                
    <div class="pagination">

        <?php 
                the_posts_pagination(array(
                    //'show_all'     => false, // показаны все страницы участвующие в пагинации
                    //'end_size'     => 1,     // количество страниц на концах
                    //'mid_size'     => 1,     // количество страниц вокруг текущей
                    'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                    'prev_text'    => __('«'),
                    'next_text'    => __('»'),
                    //'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                    //'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                    //'screen_reader_text' => __( 'Posts navigation' ),
                ));
        ?>
    </div> 
                
                
</div>

<?php get_footer();?>
