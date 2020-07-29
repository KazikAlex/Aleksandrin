<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>


<header class="header">
	<div class="container">

	<?php $contact = new WP_Query(array('post_type' => 'contact'));?>
            <?php if( $contact->have_posts() ) : ?> 
				<?php while ( $contact->have_posts() ) : $contact->the_post(); ?>

				<div class="header-top">
					<div class="free-call">Бесплатный звонок: <b> 
						<a href="tel:<?php $tel1 = get_post_meta( $post->ID, 'tel1', true); echo $tel1;?>"><?php $tel1 = get_post_meta( $post->ID, 'tel1', true); echo $tel1;?></a>  | 
						<a href="tel:<?php $tel2 = get_post_meta( $post->ID, 'tel2', true); echo $tel2;?>"><?php $tel2 = get_post_meta( $post->ID, 'tel2', true); echo $tel2;?></a>
						</b>
					</div>
					<div class="header-mail">Почта для связи: <a href="mailto:<?php $usermail = get_post_meta( $post->ID, 'usermail', true); echo $usermail;?>"><?php $usermail = get_post_meta( $post->ID, 'usermail', true); echo $usermail;?></a></div>
					<?php wp_nav_menu(array('theme_location' => 'page_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'page_menu', 'container_class' => 'page_menu_wrap', 'menu_id' => 'header_page-menu')); ?>  
					<!-- <?php if(!dynamic_sidebar( 'Sidebar-2' )): ?> 
					<?php endif; ?> -->
					
				</div>
				<div class="header-middle" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
					<div class="header-middle_wrap">
						<div class="hamburger-menu" id="hamb">
							<div class="hamburger">
								<div class="hamburger-top" id="top"></div>
								<div class="hamburger-middle" id="middle"></div>
								<div class="hamburger-bottom" id="bottom"></div>
							</div>
						</div>
						<div class="logo"><a href="<?php get_home_url()?>/index.php">АлександриН<br><span>ТОРГ</span></a></div>
						<div class="gaurantee"><img src="<?php bloginfo( 'template_url' )?>/img/guarantee.png" alt="гарантия лучшей цены"></div>
					</div>
					<form class="search-form">
						<input class="search-form_iput" type="text" placeholder="Поиск по товарам и коллекциям" value="<?php echo get_search_query() ?>" name="s" id="s">
						<button class="search-form_btn" type="submit" id="searchsubmit">Найти</button>
					</form>
				</div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p>Место под слайдер</p>
            <?php endif; ?> 
				<?php wp_reset_query()?>   

		<div class="header-bottom">
			<?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 0, 'container' => 'div', 'menu_class' => 'main_menu', 'container_class' => 'main_menu_wrap', 'menu_id' => 'header_category-menu')); ?>
		</div>		
	</div>
</header>

