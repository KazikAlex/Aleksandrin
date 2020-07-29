<?php
/*
 * Template Name: Магазины
*/
?>

<?php get_header(); ?>

<div class="container">	
	<div class="shops">
		<?php wp_nav_menu(array('theme_location' => 'page_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'sidebar_menu', 'container_class' => 'sidebar_menu_wrap',)); ?>
		<div class="shops_wrap">
			<div class="shops_title">Частное торговое унитарное предприятие "АлександриН-торг"</div>
			<?php $contact = new WP_Query(array('post_type' => 'contact'));?>
				<?php if( $contact->have_posts() ) : ?> 
					<?php while ( $contact->have_posts() ) : $contact->the_post(); ?>
						<div class="shops_unp">УНП <?php $userunp = get_post_meta( $post->ID, 'userunp', true); echo $userunp;?></div>
							<div class="shops_item">
								<div class="shops_item_title"><?php $shop = get_post_meta( $post->ID, 'shop', true); echo $shop;?></div>
								<div class="shops_item_descr"><?php $shopdescr = get_post_meta( $post->ID, 'shopdescr', true); echo $shopdescr;?></div>
								<div class="shops_item_map">
									<iframe src="<?php $shopmaps = get_post_meta( $post->ID, 'shopmaps', true); echo $shopmaps;?>" width="100%" height="315" frameborder="0"></iframe>
									<!-- https://yandex.ru/map-widget/v1/?um=constructor%3A676e0cb9e81b32f7c3f9f1ef925d203179dc42943ab79ade83556b83e39eb4d0&source=constructor -->
								</div>
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