<?php get_header();?>
<main class="main">
    <div class="breadcrumbs">
        <div class="container">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
        </div>
        
    </div>

   <section class="news-page">
        <div class="container">
            <div class="news-page__img">
                <img src="<?php the_post_thumbnail_url();?>" alt="img">
            </div>
            <h1 class="news-page__title">
               <?php the_title();?>
            </h1>
            <div class="news-page__date">
                <img src="<?php the_field('stranicza_bloga_avtor_izobrazhenie');?>" alt="img" class="news-page__date-img">
                <div class="news-page__date-content">
                    <div class="news-page__date-content--title">
                        <?php the_field('stranicza_bloga_avtor_imya');?>
                    </div>
                    <div class="news-page__date-content--time"> <?php echo get_the_date('d-m-Y');?></div>
                </div>
            </div>

            <div class="news-page__box">
                <?php the_content();?>
            </div>

            <div class="news-page__picture">
            <?php if(have_rows('blog_kartinki')) : while(have_rows('blog_kartinki')) : the_row();?>
              <div class="news-page__picture-img">
                <img src="<?php the_sub_field('blog_kartinka');?>" alt="img">
              </div>
            <?php endwhile; endif;?>
            </div>

            <div class="news-page__text">
                <?php the_excerpt( );?>
            </div>
            
        </div>
   </section>

  </main>
<?php get_footer();?>