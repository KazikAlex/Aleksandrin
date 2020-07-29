
<footer class="footer">
	<div class="container">
		<div class="footer_wrap">
			<div class="footer_left">
				<div class="logo"><a href="<?php get_home_url()?>/index.php">АлександриН<br><span>ТОРГ</span></a></div>
				<div class="footer_descr">
					«Александрин-торг» - это мебельный салон,<br>
					который осуществляет продажу  корпусной и<br>
					мягкой мебели, а также мебель по<br>
					индивидуальным размерам в Петрикове и <br>
					Петриковском районе. Осуществляем доставку<br>
					в данном регионе.<br><br>
					2019 Все права защищены
				</div>
			</div>
			<div class="footer_middle">
				<div class="footer_menu_title">Каталог</div>
				<?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'footer_menu', 'container_class' => 'footer_menu_wrap',)); ?>
			</div>
			<div class="footer_right">
				<div class="footer_menu_title">Магазин</div>
				<?php wp_nav_menu(array('theme_location' => 'page_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'footer_page', 'container_class' => 'footer_page_wrap',)); ?>


				<?php $contact = new WP_Query(array('post_type' => 'contact'));?>
            <?php if( $contact->have_posts() ) : ?> 
				<?php while ( $contact->have_posts() ) : $contact->the_post(); ?>

				<div class="free-call">Бесплатный звонок: <b> 
						<div><a href="tel:<?php $tel1 = get_post_meta( $post->ID, 'tel1', true); echo $tel1;?>"><?php $tel1 = get_post_meta( $post->ID, 'tel1', true); echo $tel1;?></a></div>
						<a href="tel:<?php $tel2 = get_post_meta( $post->ID, 'tel2', true); echo $tel2;?>"><?php $tel2 = get_post_meta( $post->ID, 'tel2', true); echo $tel2;?></a>
						</b>
					</div>
				<div class="header-mail footer-mail">Почта для связи: <a href="mailto:<?php $usermail = get_post_meta( $post->ID, 'usermail', true); echo $usermail;?>"><?php $usermail = get_post_meta( $post->ID, 'usermail', true); echo $usermail;?></a></div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p>Место под слайдер</p>
            <?php endif; ?> 
				<?php wp_reset_query()?>   



				
			</div>
			
		</div>
	</div>
</footer>


<script src="<?php bloginfo('template_url')?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php bloginfo('template_url')?>/js/jquery-migrate-1.4.1.min.js"></script>
<script src="<?php bloginfo('template_url')?>/js/slick.js"></script>
<script src="<?php bloginfo('template_url')?>/js/js.js"></script>

</body>
</html>