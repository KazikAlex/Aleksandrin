<?php
/*
 * Template Name: Доставка
*/
?>

<?php get_header(); ?>

<div class="container">
    <div class="shiping">
        <?php wp_nav_menu(array('theme_location' => 'page_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'sidebar_menu', 'container_class' => 'sidebar_menu_wrap',)); ?>
        <div class="shiping_services">
            <div class="shiping_item">
                <div class="shiping_item_wrap">
                    <div class="shiping_item_img"><img src="<?php bloginfo( 'template_url' )?>/img/pickup.png" alt="Самовывоз"></div>
                    <div class="shiping_item_title">Самовывоз</div>
                </div>
                <div class="shiping_item_descr">Осуществляется после телефонного звонка  покупателю о  поступлении  мебели на склад.
                    Расчет производится наличными или банковской картой в момент получения
                </div>
            </div>
            <div class="shiping_item">
                <div class="shiping_item_wrap">
                    <div class="shiping_item_img"><img src="<?php bloginfo( 'template_url' )?>/img/free-shiping.png" alt="Бесплатная доставка"></div>
                    <div class="shiping_item_title">Бесплатная доставка</div>
                </div>
                <div class="shiping_item_descr">Осуществляется по г. Петрикову  до подъезда (или до дома)-без подъема на этаж.  Удобное для доставки 
                    время для Вас согласовывается с менеджером магазина. Доставка за пределы города оплачивается отдельно.
                </div>
            </div>
            <div class="shiping_item">
                <div class="shiping_item_wrap">
                    <div class="shiping_item_img"><img src="<?php bloginfo( 'template_url' )?>/img/paid-delivery.png" alt="Платная доставка"></div>
                    <div class="shiping_item_title">Платная доставка</div>
                </div>
                <div class="shiping_item_descr">Рассчитывается по тарифу 50 коп./км, 
                    за пределы г.Петриков.
                </div>
            </div>
        </div>
    </div>   
</div>

<?php get_footer();?>