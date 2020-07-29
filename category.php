<?php get_header(); ?>

<!-- <?php the_breadcrumb(); ?> -->

<div class="container">
    <div class="product">
        <div class="sidebar">
            <?php wp_nav_menu(array('theme_location' => 'cat_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'cat_menu', 'container_class' => 'cat_menu_wrap',)); ?>
            <?php if(!dynamic_sidebar( 'Sidebar' )): ?> <?php endif; ?>


        </div>
        <div class="product_wrap">       
            <?php if( have_posts() ) : while ( have_posts() ) : the_post();?>
                <div class="product_item">
                    <div class="product_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
                    <div class="product_title"><?php the_title(); ?></div>
                    <div class="product_price"><?php $price = get_post_meta( $post->ID, 'price', true); echo $price;?> &nbsp BYN</div> 
                    <?php                       
                        $old_price = get_post_meta( $post->ID, 'old_price', true);
                        if ($old_price) { 
                            echo '<div class="product_old-price">' .  $old_price . '&nbsp BYN</div>';
                        } 
                    ?>
                    
                    <div class="product_btn"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
                </div>                                               
                    <?php endwhile; ?>
                    <?php wp_reset_query()?>

            <?php else: ?>
                    <p>Нет товаров в этой категории</p>
            <?php endif; ?>
            
        </div>       
    </div>   

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

     
        <?php wp_reset_query()?>

</div>

<script>
    jQuery(function($){
	$('#filter').submit(function(){
		var filter = $(this);
		$.ajax({
			url:ajaxurl, // обработчик
			data:filter.serialize(), // данные
			type:filter.attr('method'), // тип запроса
			beforeSend:function(xhr){
				filter.find('button').text('Загружаю...'); // изменяем текст кнопки
			},
			success:function(data){
				filter.find('button').text('Применить фильтр'); // возвращаеи текст кнопки
				$('#response').html(data);
			}
		});
		return false;
	});
});
</script>

<?php get_footer();?>