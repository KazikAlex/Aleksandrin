<?php
/*
 * Template Name: О нас
*/
?>

<?php get_header(); ?>

<div class="container">
    <div class="about">
        <?php wp_nav_menu(array('theme_location' => 'page_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'sidebar_menu', 'container_class' => 'sidebar_menu_wrap',)); ?>
        <div class="about_wrap">
            <?php if( have_posts() ) : while ( have_posts() ) : the_post();?>
                <div class="about_img"><?php the_post_thumbnail('full'); ?></div>
                <div class="about_descr"><?php the_content(); ?></div>                                               
            <?php endwhile; ?>
            <?php else: ?>
            <?php endif; ?>    
            <div class="about_services">
                <div class="services_wrap">
                    <div class="services_item">
                        <div class="services_item_img"><img src="<?php bloginfo( 'template_url' )?>/img/delivery.png" alt="доставка"></div>
                        <div class="services_item_title">СОБСТВЕННАЯ ДОСТАВКА</div>
                        <div class="services_item_descr">Бесплатная доставка осуществляется по г. Петрикову</div>
                    </div>
                    <div class="services_item">
                        <div class="services_item_img"><img src="<?php bloginfo( 'template_url' )?>/img/installment.png" alt="рассрочка"></div>
                        <div class="services_item_title">РАССРОЧКА</div>
                        <div class="services_item_descr">Внутренняя расрочкан а 3 месяца или рассрочка на 12 месяцев через банк</div>
                    </div>
                    <div class="services_item">
                        <div class="services_item_img"><img src="<?php bloginfo( 'template_url' )?>/img/consultation.png" alt="бесплатная консультация"></div>
                        <div class="services_item_title">БЕСПЛАТНАЯ КОНСУЛЬТАЦИЯ </div>
                        <div class="services_item_descr">Позвоните нам и мы поможем вам в выборе необходимой мебели</div>
                    </div>
                    <div class="services_item">
                        <div class="services_item_img"><img src="<?php bloginfo( 'template_url' )?>/img/madeinbelarus.png" alt="лучшие белорусские производители"></div>
                        <div class="services_item_title">Лечшие белорусские производители</div>
                        <div class="services_item_descr">Наша продукция напрямую от производителей,вы можете  быть 100% уверены в ее качестве</div>
                    </div>
                </div>      
            </div>

        </div>         
    </div>   
</div>



<?php get_footer();?>