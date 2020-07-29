<?php
/*
 * Template Name: Лицензии
*/
?>
<?php get_header(); ?>

<div class="container">
    <div class="license">
        <?php wp_nav_menu(array('theme_location' => 'page_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'sidebar_menu', 'container_class' => 'sidebar_menu_wrap',)); ?>
        <div class="license_wrap">
			<div class="license_title">Лицензии</div>
			<div class="license_descr">Сертификат соответствия – документ, подтверждающий соответствие продукции 
				требованиям качества и безопасности, установленными для нее действующими стандартами и правилами.
			</div>
            <?php $license = new WP_Query(array('post_type' => 'license'));?>
            <?php if( $license->have_posts() ) : ?> 
                <?php while ( $license->have_posts() ) : $license->the_post(); ?>
                <div class="license_item">
					<div class="license_item_img"><?php the_post_thumbnail('full'); ?></div>
					<div class="license_item_wrap">
						<div class="license_item_title"><?php the_title(); ?></div> 
						<div class="license_item_descr"><?php the_content(); ?></div> 
					</div>
                </div>              
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p>Место под слайдер</p>
            <?php endif; ?> 
                <?php wp_reset_query()?>                   
            <div class="awards_title">Награды</div>
            <div class="awards_descr">Мы являемся лауреатами и победителями множества профессиональных 
                конкурсов как регионального, так и федерального значения. И гордимся этим!
            </div>
            <?php $awards = new WP_Query(array('post_type' => 'awards'));?>
            <?php if( $awards->have_posts() ) : ?> 
                <?php while ( $awards->have_posts() ) : $awards->the_post(); ?>
                <div class="awards_item">
                    <div class="awards_item_img"><?php the_post_thumbnail('full'); ?></div>
                    <div class="awards_item_wrap">
                        <div class="awards_item_title"><?php the_title(); ?></div> 
                        <div class="awards_item_descr"><?php the_content(); ?></div> 
                    </div>
                </div>              
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p>Место под слайдер</p>
            <?php endif; ?> 
                <?php wp_reset_query()?>
        </div>
        
    </div>    
</div>

<?php get_footer();?>








