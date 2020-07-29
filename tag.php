<?php get_header(); ?>

<div class="container">
    <div class="product">
        <div class="sidebar">
            <?php wp_nav_menu(array('theme_location' => 'cat_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'cat_menu', 'container_class' => 'cat_menu_wrap',)); ?>
            <?php if(!dynamic_sidebar( 'Sidebar' )): ?> 
            <?php endif; ?>
        </div>

        <div class="product_wrapper">
            <div class="product_header">
                <div class="product_header_wrap">
                    <div class="product_header_img">
                    <?php $posttags = get_the_tags();
                        if( $posttags ){
                            foreach( $posttags as $tag ){
                                $term_id = get_queried_object_id();
                                $image_id = get_term_meta( $term_id, '_thumbnail_id', 1 );
                                $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                                echo '<img src="'. $image_url .'" alt="" />';
                            }
                        } ?>
                    </div>
                    <div class="product_header_title">
                        <?php $posttags = get_the_tags();
                            if( $posttags ){
                                foreach( $posttags as $tag ){
                                    echo $tag->name . ' '; 
                                }
                            } ?>
                    </div>
                </div>
                <div class="product_header_descr">
                    <?php $posttags = get_the_tags();
                        if( $posttags ){
                            foreach( $posttags as $tag ){
                                echo $tag->description . ' ';
                            }
                        } ?>
                </div>
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
                <?php else: ?>
                        <p>Нет товаров в этой категории</p>
                <?php endif; ?>
                <?php wp_reset_query()?>
            </div>
 
        </div>      
    </div>   

    <div class="pagination">
    
        <?php 
                the_posts_pagination(array(
                    'prev_next'    => true, 
                    'prev_text'    => __('«'),
                    'next_text'    => __('»'),
                ));
        ?>
    </div> 
</div>

<?php get_footer();?>