<?php
/*
 * Template Name: Бренды
*/
?>

<?php get_header(); ?>

<div class="container">
    <div class="brends">
        <?php wp_nav_menu(array('theme_location' => 'page_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'sidebar_menu', 'container_class' => 'sidebar_menu_wrap',)); ?>
        <div class="brends_wrap">




        
            <?php $brend = new WP_Query(array('post_type' => 'brend', 'posts_per_page' => 9));?>
            <!-- , 'paged' => get_query_var('paged') ? get_query_var('paged') : 1 -->
            <?php if( $brend->have_posts() ) : ?> 
                <?php while ( $brend->have_posts() ) : $brend->the_post(); ?>
                <div class="brends_item">
                    <div class="brends_img"><?php the_post_thumbnail('full'); ?></div>
                    <div class="brends_title"><?php the_title(); ?></div> 
                </div>
             
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
        </div>
    </div>

    <div class="pagination">
        <?php
            $big = 999999999; // уникальное число
            echo paginate_links( array(
                'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'current' => max( 1, get_query_var('paged') ),
                'total'   => $brend->max_num_pages,
                'prev_next'    => true, 
                'prev_text'    => __('«'),
                'next_text'    => __('»'),
            ) );
        ?>
            
        </div>
            <?php else: ?>
                <p>Место под слайдер</p>
            <?php endif; ?> 
                <?php wp_reset_query()?>       

</div>

<?php get_footer();?>