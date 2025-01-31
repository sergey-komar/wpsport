<?php
// КАРТОЧКА ТОВАРА НА СТРАНИЦЕ ТОВАРА

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<main class="main">
	<div class="breadcrumbs">
		<div class="container">
		<?php woocommerce_breadcrumb();?>
		</div>
	</div>

	<div class="product">
		<div class="container">
			
				<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>
			
		</div>
	</div>		
</main>
		

	
	

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
