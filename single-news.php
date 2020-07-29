<?php get_header(); ?>

<div class="container">
    <!-- <div class="blog"> -->
        <div class="single-blog_wrap">       
            <?php if( have_posts() ) : ?>                     
                <?php while ( have_posts() ) : the_post();?>  
                <div class="single-blog"> 
                    <div class="single-blog_item">
                        <div class="single-blog_item_img"><?php the_post_thumbnail('full'); ?></div>
                        <div class="single-blog_item_title"><?php the_title(); ?></div>
                        <div class="single-blog_item_date"><?php the_time('d.m.Y'); ?></div>
                        <div class="single-blog_item_descr"><?php the_content(); ?></div>   
                    </div>  
                </div>    
                <?php endwhile; ?> 
                <?php else: ?>
                    <p>Место под слайдер</p>
                <?php endif; ?> 
                    <?php wp_reset_query()?>   
        </div>
    <!-- </div> -->               
                
</div>

<div class="stock">	
    <div class="left_arrow"></div>
    <div class="stock_wrapper">
        <div class="container">
            <div class="stock_title">Товары по акции</div>
            <div class="stock_wrap">
                <?php $st = new WP_Query('cat=10');?>
                <?php if( $st->have_posts() ) : ?> 
                    <?php while ( $st->have_posts() ) : $st->the_post(); ?>
                        <div class="product_item">
                            <div class="product_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
                            <!-- <div class="product_descr"><?php the_content(); ?></div>  -->
                            <div class="product_title"><?php the_title(); ?></div>
                            <div class="product_new-price"><?php $price = get_post_meta( $post->ID, 'price', true); echo $price;?> &nbsp BYN</div>
                            <div class="product_old-price"><?php $old_price = get_post_meta( $post->ID, 'old_price', true); echo $old_price;?> &nbsp BYN</div> 
                            <div class="product_btn"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
                        </div>  
					<?php endwhile; ?>   
					<?php wp_reset_query()?>											
                <?php else: ?>
                    <p>Место под слайдер</p>
                <?php endif; ?> 
                    
            </div>
        </div>
    </div>
    <div class="right_arrow"></div>
</div>

<?php get_footer();?>