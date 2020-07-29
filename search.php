<?php get_header(); ?>

<div class="container">
    <div class="product">
        <div class="sidebar">
            <?php wp_nav_menu(array('theme_location' => 'cat_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'cat_menu', 'container_class' => 'cat_menu_wrap',)); ?>
            <?php if(!dynamic_sidebar( 'Sidebar' )): ?> 
            <?php endif; ?>
        </div>
        <div class="product_wrap">       
            <?php if( have_posts() ) : while ( have_posts() ) : the_post();?>
                <div class="product_item">
                    <div class="product_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
                    <!-- <div class="product_descr"><?php the_content(); ?></div>  -->
                    <div class="product_title"><?php the_title(); ?></div>
                    <div class="product_price"><?php $price = get_post_meta( $post->ID, 'price', true); echo $price;?> &nbsp BYN</div> 
                    <div class="product_btn"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
                </div>                                               
                    <?php endwhile; ?>
                <div class="pagination">
                    <?php 
                        the_posts_pagination(array(
                            'prev_text'    => __('«'),
                            'next_text'    => __('»'),
                        ));
                    ?>
                </div> 
            <?php else: ?>
                    <p>Нет товаров в этой категории</p>
            <?php endif; ?>
            <?php wp_reset_query()?>
        </div>       
    </div>   
</div>

<?php get_footer();?>