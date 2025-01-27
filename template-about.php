<?php
/**
 * Template Name: О нас
 */
?>
<?php get_header();?>
<main class="main">
    <div class="breadcrumbs">
        <div class="container">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
        </div>
        
    </div>

    <section class="about">
      <div class="container">
        <div class="about__inner">
          <div class="about-block">
            <div class="about-block__content">
              <div class="about-block__content-title">
                <?php the_field('o_nas_pervyj_blok_zagolovok');?>
              </div>

              <?php if(have_rows('o_nas_pervyj_blok_tekst')) : while(have_rows('o_nas_pervyj_blok_tekst')) : the_row();?>
              <div class="about-block__content-text">
                <?php the_sub_field('o_nas_pervyj_blok_tekst_tekst');?>
              </div>
              <?php endwhile; endif;?>

            </div>
            <div class="about-block__img">
              <img src="<?php the_field('o_nas_pervyj_blok_kartinka');?>" alt="img">
            </div>
          </div>
  
          <div class="about-block">
            <div class="about-block__img">
              <img src="<?php the_field('o_nas_vtoroj_blok_kartinka');?>" alt="img">
            </div>
            <div class="about-block__content">
              <div class="about-block__content-title">
              <?php the_field('o_nas_vtoroj_blok_zagolovok');?>
              </div>

              <?php if(have_rows('o_nas_vtoroj_blok_tekst')) : while(have_rows('o_nas_vtoroj_blok_tekst')) : the_row();?>
              <div class="about-block__content-text">
              <?php the_sub_field('o_nas_vtoroj_blok_tekst_tekst');?>
              </div>
              <?php endwhile; endif;?>

            </div>
    
          </div>
          
          <div class="about-block">
           
            <div class="about-block__content">
              <div class="about-block__content-title">
              <?php the_field('o_nas_tretij_blok_zagolovok');?>
              </div>

              <?php if(have_rows('o_nas_tretij_blok_tekst')) : while(have_rows('o_nas_tretij_blok_tekst')) : the_row();?>
              <div class="about-block__content-text">
                <?php the_sub_field('o_nas_tretij_blok_tekst_tekst');?>
              </div>
              <?php endwhile; endif;?>

              <div class="about-block__info">
                <?php if(have_rows('o_nas_tretij_blok_spisok')) : while(have_rows('o_nas_tretij_blok_spisok')) : the_row();?>
                <div class="about-block__item">
                  <div class="about-block__item-img">
                    <img src="<?php the_sub_field('o_nas_tretij_blok_spisok_kartinka');?>" alt="img">
                  </div>
                  <div class="about-block__desc">
                    <div class="about-block__desc-title">
                    <?php the_sub_field('o_nas_tretij_blok_spisok_zagolovok');?>
                    </div>
                    <div class="about-block__desc-text">
                    <?php the_sub_field('o_nas_tretij_blok_spisok_tekst');?>
                    </div>
                  </div>
                </div>
                <?php endwhile; endif;?>
              </div>
            </div>
    
            <div class="about-block__img">
              <img src="<?php the_field('o_nas_tretij_blok_kartinka');?>" alt="img">
            </div>
          </div>
        </div>
       

        <div class="about__text">
          Наша команда состоит из профессионалов своего дела: специалисты в области нутрициологии и диетологии готовы проконсультировать вас на каждом этапе использования нашей продукции. Если у вас возникнут вопросы или понадобится поддержка, наши консультанты всегда на связи.
        </div>
        <div class="about__text">
          Мы уверены в эффективности наших продуктов и стремимся поддерживать ваше здоровье и благополучие. Присоединяйтесь к нам и ощутите разницу вместе с нами!
        </div>
      </div>
    </section>

  </main>
<?php get_footer();?>