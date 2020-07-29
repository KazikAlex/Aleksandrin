<?php get_header(); ?>

<div class="container"> 
    <div class="blog">
        <div class="sidebar">
            <?php wp_nav_menu(array('theme_location' => 'cat_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'cat_menu', 'container_class' => 'cat_menu_wrap')); ?>        
            <?php if(!dynamic_sidebar( 'Sidebar' )): ?> 
                <?php endif; ?>
        </div>
        <?php if( have_posts() ) : ?>                     
            <?php while ( have_posts() ) : the_post();?>  
        <div class="single"> 
            <div class="single_item_title"><?php the_title(); ?></div>
            <div class="single_item">                  
                <div class="single_item_wrap">
                    <div class="single_item_element">Артикул: <b><?php $art = get_post_meta( $post->ID, 'art', true); echo $art;?></b></div>
                    
                    <div class="single_item_element">Производитель: <b><?php $posttags = get_the_tags(); if( $posttags ){foreach( $posttags as $tag ){ echo $tag->name . ' ';}} ?></b></div>
                    <div class="single_item_element">Страна производителя: <b><?php $countr = get_post_meta( $post->ID, 'countr', true); echo $countr;?></b></div>
                    <div class="single_item_element">Материал: <b><?php $mater = get_post_meta( $post->ID, 'mater', true); echo $mater;?></b></div>
                    <div class="single_item_element">Цвет: <b><?php $col = get_post_meta( $post->ID, 'col', true); echo $col;?></b></div>
                </div>                    
                <div class="single_item_img"><?php the_post_thumbnail('full'); ?></div>             
                <div class="single_item_carousel">
                    <div class="single_item_carousel_prev"></div>
                    <?php the_content(); ?>
                    <div class="single_item_carousel_next"></div>
                </div> 
            </div>  

            <div class="single_item_price" id="item_price"><?php $price = get_post_meta( $post->ID, 'price', true); echo $price;?> &nbsp BYN</div>
            <?php 
                        
                $old_price = get_post_meta( $post->ID, 'old_price', true);
                    if ($old_price) { ?>
                        <script> var itemprice = document.getElementById('item_price');
                            itemprice.style.color = 'red';
                        </script>
                    <?php  
                    echo '<div class="product_old-price">' .  $old_price . '&nbsp BYN</div>';
                } 
            ?>

            <div class="single_description">
                <div class="single_description_btn">
                    <div class="single_description_btn_descr" id="descr_btn">Описание</div>
                    <div class="single_description_btn_specific" id="spec_btn">Характеристики</div>
                </div>
                <div class="single_description_text_descr" id="descr_text"><?php $descr = get_post_meta( $post->ID, 'descr', true); echo $descr;?></div>
                <div class="single_description_text_specific" id="spec_text"><?php $spec = get_post_meta( $post->ID, 'spec', true); echo $spec;?></div>
            </div>

        </div> 
            
        <?php endwhile; ?> 
        <?php wp_reset_query()?>
        <?php else: ?>
        <?php endif; ?>
    </div>  
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