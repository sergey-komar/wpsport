<?php
// ОТКЛЮЧАЕМ ВСЕ СТИЛИ woocommerce
add_filter( 'woocommerce_enqueue_styles', '__return_false' );




//AJAX ДЛЯ КОРЗИНЫ иконки кол-во
add_filter( 'woocommerce_add_to_cart_fragments', function ( $fragments ) {
	$fragments['span.cart-badge'] = '<span class="badge cart-badge">' . count( WC()->cart->get_cart() ) . '</span>';
	return $fragments;
} );


// Меняем слово распродажа в карточке товара на акция
add_filter('woocommerce_sale_flash', 'my_custom_sale_flash', 10, 3);
function my_custom_sale_flash($text, $post, $_product) {
    return '<span class="onsale">Акция</span>';}



//МЕНЯЕМ РЕЙТИНГ ДЕЛАЕМ ТАК, ЧТОБЫ ЕСЛИ НЕТ ОЦЕНОК ПОКАЗЫВАЛ ПУСТЫЕ ЗВЁЗДЫ
add_filter( 'woocommerce_product_get_rating_html', function ( $html, $rating, $count ) {
	$html = '';
	/* translators: %s: rating */
	$label = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );
	$html  = '<div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div>';
	return $html;
}, 10, 3 );


//СКИДКА НА СТРАНИЦЫ КАРТОЧКИ ТОВАРА В % РЯДОМ С ЦЕНОЙ
add_filter( 'woocommerce_format_sale_price', 'truemisha_discount_percentage', 10, 3 );
 

	function truemisha_discount_percentage( $price, $regular_price, $sale_price ) {
 
		// вычисляем процент скидки
		$percentage = round( ( $regular_price - $sale_price ) / $regular_price * 100 ).'%';
	 
		// сообщение об экономии, можете стилизовать его при помощи CSS
		$percentage_message = '<span class="product__flash" style="color: #ff7070;">Скидка ' . $percentage . '!</span>';
	 
		
			// отображение цены в новом формате
			$price = '<del>' . wc_price( $regular_price ) . '</del> <ins>' . wc_price( $sale_price ) . $percentage_message . '</ins>';
					
			// возвращаем результат
			return $price;
		
}

// ДОБАВЛЕНИЕ ВКЛАДКИ В ТАБЫ НА СТРАНИЦЕ КАРТОЧКИ ТОВАРА

add_filter( 'woocommerce_product_tabs', 'truemisha_new_product_tab', 25 );
 
function truemisha_new_product_tab( $tabs ) {
 
	$tabs[ 'new_super_tab' ] = array(
		'title' 	=> 'Дополнительная информация',
		'priority' 	=> 25,
		'callback' 	=> 'truemisha_new_tab_content'
	);
 
	return $tabs;
 
}
function truemisha_new_tab_content() {
	
	the_field('informacziya');
 
}


//РЕЙТИНГ ОТКРЕПЛЯЕМ
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

//РЕЙТИНГ ХЛЕБНЫЕ КРОШКИ
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);


remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);


remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);



