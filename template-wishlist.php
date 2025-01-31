<?php
/**
 * Template Name: Список желаний
 */
?>
<?php get_header();?>
<main class="main">
    <div class="container">
        <div class="breadcrumbs">
            <?php woocommerce_breadcrumb();?>
        </div>
        <div class="goods-block__wishlist">
            
          
            <?php echo do_shortcode('[yith_wcwl_wishlist]')?>
            
        </div>
        
    </div>
</main>
<?php get_footer();?>