<?php
// КАРТОЧКА ТОВАРА НА СТРАНИЦЕ МАГАЗИНА


defined( 'ABSPATH' ) || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( 'catalog-product__item', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>

	<div class="catalog-product__item-img">
	<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
	?>

	<?php if(!empty(get_field('novinka'))) :?>
	<div class="catalog-product__item-new"><?php the_field('novinka');?></div>
	<?php endif;?>

	</div>

	<div class="catalog-product__wrapper">
		
		<?php

		// РЕЙТИНГ ВЫВОДИМ
		echo '<div class="catalog-product__item-reviews">';
		woocommerce_template_loop_rating();

		// КОЛЛИЧЕСТВО РАЙТИНГА
		$rating_cnt = $product->get_rating_count();
		echo '<div class="catalog-product__item-reviews-count"> <small>(' . $rating_cnt . ')</small> </div>';
		echo '</div>';
		?>
		<?php
		/**
		 * Hook: woocommerce_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );
		?>
		<div class="catalog-product__box">
			<div class="catalog-product__box-stock">
				В наличии
				<?php echo $product->stock_quantity;?>
			</div>
			<?php if(!empty($product->sku)) :?>
			<div class="catalog-product__box-article">
				Артикул
				<?php echo $product->sku;?>
			</div>
			<?php endif;?>
		</div>


		<div class="catalog-product__price">
		<?php
		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
		</div>

		<?php
		/**
		 * Hook: woocommerce_after_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item' );
		?>
	</div>
</div>
