<?php
// КАРТОЧКА ТОВАРА НА СТРАНИЦЕ ТОВАРА ПОДРОБНАЯ ИНФОРМАЦИЯ


defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product-one', $product ); ?>>
	<div class="product-one__inner">
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>
	</div>

	<div class="product__wrapper summary entry-summary">
		<div class="product-top">
			<div class="product-top__title">
				<?php woocommerce_template_single_title();?>
			</div>
			<?php if(!empty($product->stock_quantity)):?>
			<div class="product-top__stock">
				В наличии
				<?php echo $product->stock_quantity;?>
			</div>
			<?php else:?>
				<div class="product-top__nostock">Нет в наличии</div>
			<?php endif;?>

		</div>

		<div class="product-box">
			<div class="product-box__reviews">
				<?php woocommerce_template_single_rating();?>
			</div>

			<?php if(!empty($product->sku)) :?>
			<div class="product-box__article">
				<span>Артикул:</span>
				<?php echo $product->sku;?>
			</div>
			<?php endif;?>
		</div>

		<div class="product-price">
			<?php woocommerce_template_single_price();?>
		</div>

		<?php if(!empty(get_field('nazvanie_brenda'))):?>
		<div class="product__wrapper-brend">
			<div class="product__wrapper-brend-name">Бренд:</div>
			<img src="<?php the_field('nazvanie_brenda');?>" alt="img" class="product__wrapper-brend-img">
		</div>
		<?php endif;?>


		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>
</div>
<div class="product__tabs">
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<div class="product_related">
<?php echo do_shortcode('[related_products limit="3"]')?>
</div>



<?php do_action( 'woocommerce_after_single_product' ); ?>
