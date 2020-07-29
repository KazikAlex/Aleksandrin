<?php
/*
 * Template Name: Контакты
*/
?>

<?php get_header(); ?>

<div class="container">	
	<div class="contact">
		<?php wp_nav_menu(array('theme_location' => 'page_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'sidebar_menu', 'container_class' => 'sidebar_menu_wrap',)); ?>
		<div class="contact_wrap">
			<?php $contact = new WP_Query(array('post_type' => 'contact'));?>
            <?php if( $contact->have_posts() ) : ?> 
				<?php while ( $contact->have_posts() ) : $contact->the_post(); ?>
				
				<div class="contact_item">
					<table cellspacing="35">
						<tr><td>Адрес</td><td><?php $adr = get_post_meta( $post->ID, 'adr', true); echo $adr;?></td></tr>
						<tr><td>Режим работы</td><td><?php $timew = get_post_meta( $post->ID, 'timew', true); echo $timew;?><br><?php $times = get_post_meta( $post->ID, 'times', true); echo $times;?></td></tr>
						<tr><td>Телефон</td><td><?php $tel1 = get_post_meta( $post->ID, 'tel1', true); echo $tel1;?> <br> <?php $tel2 = get_post_meta( $post->ID, 'tel2', true); echo $tel2;?></td></tr>
						<tr><td>Юр. адрес</td><td><?php $legaladr = get_post_meta( $post->ID, 'legaladr', true); echo $legaladr;?></td></tr>
						<tr><td>E-mail</td><td><?php $usermail = get_post_meta( $post->ID, 'usermail', true); echo $usermail;?></td></tr>
						<tr><td>УНП</td><td><?php $userunp = get_post_meta( $post->ID, 'userunp', true); echo $userunp;?></td></tr>
					</table>
				</div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p>Место под слайдер</p>
            <?php endif; ?> 
				<?php wp_reset_query()?>   
				
				<form class="contact_form" action="<?php bloginfo( 'template_url' )?>/mailer/smart.php" method="post">
					<div class="contact_form_title">Отправить сообщение</div>
					<input type="text" class="contact_form_input" placeholder="Ф.И.О. *" name="name">
					<input type="tel" class="contact_form_input" placeholder="Телефон *" name="phone">
					<input type="email" class="contact_form_input" placeholder="E-mail" name="mail">
					<textarea class="contact_form_descr" placeholder="Комментарий к заказу" name="descr"></textarea>
					<button class="contact_form_btn" id="form_btn" type="submit">Отправить</button>
				</form>

		</div>
	</div>
</div>

<?php get_footer();?>
