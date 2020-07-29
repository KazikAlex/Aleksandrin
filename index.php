<?php
/*
 * Template Name: Главная
*/

?>

<?php get_header(); ?>

<div class="news">
	<div class="container">
		<div class="news_wrap">
			<div class="news_carousel_wrap">
				<?php $news = new WP_Query(array('post_type' => 'news'));?>
				<?php if( $news->have_posts() ) : ?> 
					<div class="news_carousel">
						<?php while ( $news->have_posts() ) : $news->the_post(); ?>
							<div class="news_carousel_item">
								<div class="news_carousel_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>  							
							</div>                  
						<?php endwhile; ?>   											
					</div> 					  
				<?php else: ?>
					<p>Место под слайдер</p>
				<?php endif; ?> 
				<?php wp_reset_query()?>
					<div class="prev_btn"></div>
					<div class="next_btn"></div>
			</div>  
			<div class="news_fixed">
				<img src="<?php bloginfo( 'template_url' )?>/img/fixed1.jpg" alt="акции" class="news_fixed_img">				
				<img src="<?php bloginfo( 'template_url' )?>/img/fixed2.jpg" alt="акции" class="news_fixed_img">
			</div>
		</div>
	</div>
</div>

<div class="services">
	<div class="container">
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
			<form class="services_form" action="<?php bloginfo( 'template_url' )?>/mailer/smart1.php" method="post">
				<div class="services_form_title">Подписаться на новости</div>
				<div class="services_form_descr">Узнавайте первыми о новостях<br>и закрытых распродажах</div>
				<div class="services_form_wrap">
					<input class="services_form_input" placeholder="Введите электронную почту">
					<button class="services_form_btn" id="services_btn" type="submit"><img src="<?php bloginfo( 'template_url' )?>/img/mail.png" alt="письмо"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="brend">	
	<div class="brend_left-arrow"></div>
		<div class="brend_wrapper">
			<div class="container">
				<div class="brend_title">Бренды</div>
				<div class="brend_wrap">
					<?php $brend = new WP_Query(array('post_type' => 'brend'));?>
					<?php if( $brend->have_posts() ) : ?> 
						<?php while ( $brend->have_posts() ) : $brend->the_post(); ?>
							<div class="brend_item"><?php the_post_thumbnail('full'); ?></div>  
						<?php endwhile; ?>   											
					<?php else: ?>
						<p>Место под слайдер</p>
					<?php endif; ?> 
						<?php wp_reset_query()?>
				</div>
			</div>
		</div>
	<div class="brend_right-arrow"></div>
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

<div class="categories">
	<div class="container">
		<div class="categories_title">Категории</div>
		<div class="categories_wrap">			
		<?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 0, 'menu_class' => 'cat_index_menu')); ?>			
		</div>
	</div>
</div>


<div class="promo">
	<div class="container">
		<div class="promo_wrap">
			<div class="promo_left">
				<div class="promo_left_title">АлександриН-ТОРГ</div>
				<div class="promo_left_descr"><?php the_content(); ?></div>			
			</div>			
			<div class="promo_right">
				<div class="promo_right_title">Наш блог<a href="<?php bloginfo( 'template_url' ); ?>/blog.php">Смотреть все</a></div>
				<div class="promo_right_wrap">
					<?php $blog= new WP_Query(array('post_type' => 'blog', 'posts_per_page' => 2));?>
					<?php if( $blog->have_posts() ) : ?> 
						<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
							<div class="promo_right_item">
								<div class="promo_right_item_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
								<div class="promo_right_item_title"><?php the_title(); ?></div>
								<div class="promo_right_item_descr"><?php the_excerpt(); ?></div>
								<div class="promo_right_item_date"><?php the_time('d.m.Y'); ?></div>
							</div>  
						<?php endwhile; ?>   											
					<?php else: ?>
						<p>Место под слайдер</p>
					<?php endif; ?> 
					<?php wp_reset_query()?>					
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>