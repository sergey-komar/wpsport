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

//РЕЙТИНГ ОТКРЕПЛЯЕМ
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

//РЕЙТИНГ ХЛЕБНЫЕ КРОШКИ
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);

