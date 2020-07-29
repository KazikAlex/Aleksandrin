<?php

// добавление возможности использования метабоксов в записях

/*
 * Этап 1. Добавление
 */
function tr_meta_boxes() {
	add_meta_box('truediv','Параметры товара','tr_echo_box','post','normal','high');
}
add_action( 'admin_menu', 'tr_meta_boxes' );
 
/*
 * Этап 2. Заполнение
 */
function tr_echo_box($post) {
	wp_nonce_field( basename( __FILE__ ), 'seo_metabox_nonce' );
	$price = get_post_meta($post->ID, 'price',true);
	$old_price = get_post_meta($post->ID, 'old_price',true);
	$art = get_post_meta($post->ID, 'art',true);
	$countr = get_post_meta($post->ID, 'countr',true);
	$mater = get_post_meta($post->ID, 'mater',true);
	$col = get_post_meta($post->ID, 'col',true);
	$descr = get_post_meta($post->ID, 'descr',true);
	$spec = get_post_meta($post->ID, 'spec',true);
	// $noindex = get_post_meta($post->ID, '_seo_noindex',true); 
	?> 
	<label>Цена<br /> <input type="text" name="price" value="<?php echo $price ?>" /> </label><br>
	<label>Старая цена<br /> <input type="text" name="old_price" value="<?php echo $old_price ?>" /> </label><br>
	<label>Артикул<br /> <input type="text" name="art" value="<?php echo $art ?>" /> </label><br>
	<label>Страна производитель<br /> <input type="text" name="countr" value="<?php echo $countr ?>" /> </label><br>
	<label>Материал<br /> <input type="text" name="mater" value="<?php echo $mater ?>" /> </label><br>
	<label>Цвет<br /> <input type="text" name="col" value="<?php echo $col ?>" /> </label><br>
	<label>Описание<br /> <textarea style="width: 1000px;" type="text" name="descr" value="<?php echo $descr ?>" /> </textarea></label><br>
	<label>Характеристики<br /> <textarea style="width: 1000px;" type="text" name="spec" value="<?php echo $spec ?>" /> </textarea></label><br>
	
	<!-- <label> <input type="checkbox" name="noindex" checked="checked" /> /> Скрыть запись от поисковиков? </label> -->
<?php
}
 
/*
 * Этап 3. Сохранение
 */
function tr_save_box( $post_id ) {
	// проверяем, пришёл ли запрос со страницы с метабоксом
	if ( !isset( $_POST['seo_metabox_nonce'] )
	|| !wp_verify_nonce( $_POST['seo_metabox_nonce'], basename( __FILE__ ) ) )
        return $post_id;
	// проверяем, является ли запрос автосохранением
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	// проверяем, права пользователя, может ли он редактировать записи
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	// теперь также проверим тип записи	
	$post = get_post($post_id);
	if ($post->post_type == 'post') { // укажите собственный
		update_post_meta($post_id,'price',esc_attr($_POST['price']));   
		update_post_meta($post_id,'old_price',esc_attr($_POST['old_price']));  
		update_post_meta($post_id,'art',esc_attr($_POST['art']));   
		update_post_meta($post_id,'countr',esc_attr($_POST['countr']));  
		update_post_meta($post_id,'mater',esc_attr($_POST['mater']));
		update_post_meta($post_id,'col',esc_attr($_POST['col']));    
		update_post_meta($post_id,'descr',esc_attr($_POST['descr']));  
		update_post_meta($post_id,'spec',esc_attr($_POST['spec']));  
		// update_post_meta($post_id,'_seo_noindex', $_POST['noindex']);
	}
	return $post_id;
}
 
add_action('save_post','tr_save_box');


// добавление возможности использования метабоксов в КОНТАКТАХ

function contact_meta_boxes() {
	add_meta_box('contactMetabox','Контакты','contact_echo_box','contact','normal','high');
}
add_action( 'admin_menu', 'contact_meta_boxes' );
 
/*
 * Этап 2. Заполнение
 */
function contact_echo_box($post) {
	wp_nonce_field( basename( __FILE__ ), 'seo_metabox_nonce' );
	$adr = get_post_meta($post->ID, 'adr', true);
	$timew = get_post_meta($post->ID, 'timew', true);
	$times = get_post_meta($post->ID, 'times', true);
	$tel1 = get_post_meta($post->ID, 'tel1', true);
	$tel2 = get_post_meta($post->ID, 'tel2', true);
	$legaladr = get_post_meta($post->ID, 'legaladr', true);
	$usermail = get_post_meta($post->ID, 'usermail', true);
	$userunp = get_post_meta($post->ID, 'userunp', true);
	$shop = get_post_meta($post->ID, 'shop', true);
	$shopdescr = get_post_meta($post->ID, 'shopdescr', true);
	$shopmaps = get_post_meta($post->ID, 'shopmaps', true);
	// $noindex = get_post_meta($post->ID, '_seo_noindex',true); 
	?> 
	<label>Адрес<br /> <input style="width: 400px;" type="text" name="adr" value="<?php echo $adr ?>" /> </label><br>
	<label>Режим работы пн-пт<br /> <input style="width: 400px;" type="text" name="timew" value="<?php echo $timew ?>" /> </label><br>
	<label>Режим работы сб-вс<br /> <input style="width: 400px;" type="text" name="times" value="<?php echo $times ?>" /> </label><br>
	<label>Телефон1<br /> <input style="width: 400px;" type="text" name="tel1" value="<?php echo $tel1 ?>" /> </label><br>
	<label>Телефон2<br /> <input style="width: 400px;" type="text" name="tel2" value="<?php echo $tel2 ?>" /> </label><br>
	<label>Юр.адрес<br /> <input style="width: 400px;" type="text" name="legaladr" value="<?php echo $legaladr ?>" /> </label><br>
	<label>E-mail<br /> <input type="text" name="usermail" value="<?php echo $usermail ?>" /></label><br>
	<label>УНП<br /> <input type="text" name="userunp" value="<?php echo $userunp ?>" /> </label><br>
	<label>Адрес магазина<br /> <input style="width: 400px;" type="text" name="shop" value="<?php echo $shop ?>" /> </label><br>
	<label>Описание магазина<br /> <input style="width: 400px;" type="text" name="shopdescr" value="<?php echo $shopdescr ?>" /> </label><br>
	<label>Яндекс карта магазина<br /> <input style="width: 1000px;" type="text" name="shopmaps" value="<?php echo $shopmaps ?>" /> </label><br>
	
	<!-- <label> <input type="checkbox" name="noindex" checked="checked" /> /> Скрыть запись от поисковиков? </label> -->
<?php
}
 
/*
 * Этап 3. Сохранение
 */
function contact_save_box( $post_id ) {
	// проверяем, пришёл ли запрос со страницы с метабоксом
	if ( !isset( $_POST['seo_metabox_nonce'] )
	|| !wp_verify_nonce( $_POST['seo_metabox_nonce'], basename( __FILE__ ) ) )
        return $post_id;
	// проверяем, является ли запрос автосохранением
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	// проверяем, права пользователя, может ли он редактировать записи
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	// теперь также проверим тип записи	
	$post = get_post($post_id);
	if ($post->post_type == 'contact') { // укажите собственный
		update_post_meta($post_id,'adr',esc_attr($_POST['adr']));   
		update_post_meta($post_id,'timew',esc_attr($_POST['timew']));
		update_post_meta($post_id,'times',esc_attr($_POST['times']));   
		update_post_meta($post_id,'tel1',esc_attr($_POST['tel1']));
		update_post_meta($post_id,'tel2',esc_attr($_POST['tel2']));
		update_post_meta($post_id,'legaladr',esc_attr($_POST['legaladr']));    
		update_post_meta($post_id,'usermail',esc_attr($_POST['usermail']));  
		update_post_meta($post_id,'userunp',esc_attr($_POST['userunp']));  
		update_post_meta($post_id,'shop',esc_attr($_POST['shop']));
		update_post_meta($post_id,'shopdescr',esc_attr($_POST['shopdescr']));
		update_post_meta($post_id,'shopmaps',esc_attr($_POST['shopmaps'])); 
		// update_post_meta($post_id,'_seo_noindex', $_POST['noindex']);
	}
	return $post_id;
}
 
add_action('save_post','contact_save_box');






?>
