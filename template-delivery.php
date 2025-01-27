<?php
/**
 * Template Name: Доставка
 */
?>
<?php get_header();?>
<main class="main">
    <div class="breadcrumbs">
        <div class="container">
            <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
        </div>
        
    </div>

   <section class="delivery">
        <div class="container">
            <h3 class="delivery__title">
                <?php the_field('dostavka_pervyj_blok_zagolovok');?>
            </h3>
            <?php if(have_rows('dostavka_pervyj_blok_tekst')) : while(have_rows('dostavka_pervyj_blok_tekst')) : the_row();?>
            <div class="delivery__text">
                <?php the_sub_field('dostavka_pervyj_blok_tekst_tekst');?>
            </div>
            <?php endwhile; endif;?>

            <div class="delivery-block">
                <div class="delivery-block__content">
                    <div class="delivery__title">
                    <?php the_field('dostavka_vtoroj_blok_zagolovok');?>
                    </div>
                    <ul class="delivery-block__list">
                        <?php if(have_rows('dostavka_vtoroj_blok_spisok')) : while(have_rows('dostavka_vtoroj_blok_spisok')) : the_row();?>
                        <li class="delivery-block__list-item">
                            <?php the_sub_field('dostavka_vtoroj_blok_spisok_tekst');?>
                        </li>
                        <?php endwhile; endif;?>
                    </ul>
                </div>
                <div class="delivery-block__img">
                    <img src="<?php the_field('dostavka_vtoroj_blok_kartinka');?>" alt="img">
                </div>
            </div>
        </div>
   </section>

  </main>
<?php get_footer();?>