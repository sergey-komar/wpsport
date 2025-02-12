<?php
/**
 * Template Name: Главная
 */
?>
<?php get_header();?>
 
     <main class="main">
      <section class="heading">
        <div class="container">
          <div class="heading-block">
            <div class="heading-block__info">
              <h1 class="heading-block__info-title">
                <?php the_field('glavnaya_pervyj_blok_zagolovok');?>
              </h1>
              <div class="heading-block__info-text">
              <?php the_field('glavnaya_pervyj_blok_tekst');?>
              </div>
              <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>" class="heading-block__info-link btn">Перейти к покупкам</a>
              <button class="heading-block__info-btn">
              <?php the_field('glavnaya_pervyj_blok_skidka');?>
              </button>
            </div>

            <div class="heading-block__img">
              <img src=" <?php the_field('glavnaya_pervyj_blok_kartinka');?>" alt="img">
            </div>
          </div>
        </div>
      </section>

      <section class="health">
        <div class="container">
          <h3 class="health__title title">Все для вашего здоровья</h3>
          <div class="health-block">
            <div class="health-block__item">
              <div class="health-block__item-img">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/home/health-1.svg" alt="img">
              </div>
              <div class="health-block__item-title">
                100% натуральный состав
              </div>
              <div class="health-block__item-text">
                В основе всех средств только природные вещества без каких-либо искусственных примесей.
              </div>
            </div>
            <div class="health-block__item">
              <div class="health-block__item-img">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/home/health-2.svg" alt="img">
              </div>
              <div class="health-block__item-title">
                Бесплатный подбор средств
              </div>
              <div class="health-block__item-text">
                Наши эксперты дают подробные консультации по выбору препаратов, профилактике и лечению болезней.
              </div>
            </div>
            <div class="health-block__item">
              <div class="health-block__item-img">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/home/health-3.svg" alt="img">
              </div>
              <div class="health-block__item-title">
                Бесплатная доставка по всей РФ
              </div>
              <div class="health-block__item-text">
                Вы получите продукцию в любом уголке страны, и вам не придется дополнительно оплачивать доставку.
              </div>
            </div>
            <div class="health-block__item">
              <div class="health-block__item-img">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/home/health-4.svg" alt="img">
              </div>
              <div class="health-block__item-title">
                Возврат денег, если не будет эффекта
              </div>
              <div class="health-block__item-text">
                Это наш гарант эффективности предлагаемой продукции.
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="offer">
        <div class="container">
          <div class="offer__subtitle">Специальное</div>
          <h3 class="offer__title">Специальное предложение</h3>
          <div class="offer-block">

              <?php
                $special = new WP_Query([
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'tax_query' => array(
                      array(
                          'taxonomy' => 'product_visibility',
                          'field'    => 'name',
                          'terms'    => 'featured',
                      ),
                  ),
                ])
                ?>
             
            
            <?php if($special->have_posts()) : while($special->have_posts()) : $special->the_post();?>
            <?php //debug($product)?>
            <div class="offer-block__item">
              <div class="offer-block__item-title">Предложение дня</div>
              <div class="offer-block__item-text">
                <span>Скидка <?php the_field('skidka');?></span>
                на «Название продукта» до конца месяца!
              </div>
              <div class="offer-block__item-img">
                <img src="<?php the_post_thumbnail_url();?>" alt="img">
              </div>

              <?php if(!empty(get_field('tajmer'))):?>
                  <div class="tajmer__box">
                    <?php if(get_field('tajmer'))
                      echo do_shortcode(''.get_field('tajmer').'');?>
                  </div>
              <?php endif;?>

              <div class="offer-block__price">
                <div class="offer-block__price-new">
                  <?php echo $product->regular_price;?> ₽
                </div>
                <div class="offer-block__price-old">
                <?php echo $product->sale_price;?> ₽
                </div>
              </div>
            
              <a href="<?php the_permalink()?>" class="offer-block__item-btn btn">Купить</a>
            
            </div>
           
            <?php endwhile; endif;?>
            <?php wp_reset_postdata();?>
          </div>
        </div>
      </section>

      <section class="goods">
        <div class="container">
          <h3 class="goods__title title">Товары для вас</h3>
          <?php
              global $product;
              $catalog__terms = get_terms([
                  'taxonomy' => 'product_tag',
                  'orderby'     => 'id', // здесь по какому полю сортировать
                  'hide_empty'  => false, // скрывать категории без товаров или нет

                                          ]);
            ?>
          <div class="goods__category">
          <?php foreach($catalog__terms as $catalog__term): ?>
            <a href="<?php echo get_term_link($catalog__term->term_id);?>" class="goods__category-link">
            <?php echo $catalog__term->name;?>
            </a>
          <?php endforeach;?>
          </div>
          
          <div class="search-home">
            <div class="search-home__box">
              <?php aws_get_search_form( true ); ?>
            </div>
           
          </div>
          

          <div class="goods-block">

              <?php
                $goods = new WP_Query([
                    'post_type' => 'product',
                    'posts_per_page' => 6,
                ])
                ?>
              <?php if($goods->have_posts()) : while($goods->have_posts()) : $goods->the_post();?>
            <div class="goods-block__item">
              <div class="goods-block__item-img">
                <img src="<?php the_post_thumbnail_url();?>" alt="img">
              </div>
              <div class="goods-block__wrapper">
                <a href="<?php the_permalink();?>" class="goods-block__item-title">
                  <?php the_title();?>
                </a>
                <div class="goods-block__item-text">
                  <?php the_excerpt();?>
                </div>
                <div class="goods-block__center">
                  <div class="goods-block__center-price">
                    <div class="goods-block__center-price--new">
                    <?php echo $product->regular_price;?> ₽
                    </div>
                    <?php if(!empty($product->sale_price)) :?>
                      <div class="goods-block__center-price--old">
                      <?php echo $product->sale_price;?> ₽
                      </div>
                    <?php endif;?>
                  </div>
                  <div class="goods-block__center-reviews">
                    <?php $rating_cnt = $product->get_rating_count();?>
                    <?php echo $rating_cnt;?>
                  </div>
                
                </div>
               
                <div class="goods-block__bottom">
                  <?php woocommerce_template_loop_add_to_cart()?>
                  <button class="goods-block__bottom-buy">Купить</button>
                </div>
              </div>
            </div>
            <?php endwhile; endif;?>
           
           <?php wp_reset_postdata();?>
            
          </div>

          <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>" class="goods__btn btn">Смотреть все товары</a>
        </div>
      </section>
 
      <section class="hit">
        <div class="container">
          <div class="hit__subtitle">Хит продаж</div>
          <h3 class="hit__title">Хит продаж 2018 года!</h3>
         
          <div class="hit-block">
            <div class="hit-block__left">
              <div class="hit-block__item">
                <div class="hit-block__item-wrapper">
                  <div class="hit-block__item-img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/home/hits-1.svg" alt="img">
                  </div>
                </div>
                
                <div class="hit-block__item-title">
                  Укрепляют иммунитет
                </div>
                <div class="hit-block__item-text">
                  Вы перестанете болеть простудными инфекционными заболеваниями, а организм будет работать без сбоев.
                </div>
              </div>
              <div class="hit-block__item">
                <div class="hit-block__item-wrapper">
                  <div class="hit-block__item-img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/home/hits-2.svg" alt="img">
                  </div>
                </div>
                <div class="hit-block__item-title">Не имеют противопоказаний</div>
                <div class="hit-block__item-text">
                  Добавки не являются лекарствами. Это оздоравливающее средство, которое можно безопасно применять всем.
                </div>
              </div>
            </div>

            <div class="hit-block__center">
              <div class="hit-block__center-img">
                <img src="<?php the_field('hit_prodazh_kartinka');?>" alt="img">
              </div>
              <div class="hit-block__price">
                <div class="hit-block__price-old">
                  Полная цена:
                  <span><?php the_field('hit_prodazh_polnaya_czena');?></span>
                </div>
                <div class="hit-block__price-new">
                  Цена со скидкой:
                  <span><?php the_field('hit_prodazh_czena_so_skidkoj');?></span>
                </div>
              </div>
              <div class="hit-block__form">
                <?php echo do_shortcode('[contact-form-7 id="fa41944" title="Форма на главной"]');?>
              </div>
            </div>

            <div class="hit-block__right">
              <div class="hit-block__item">
                <div class="hit-block__item-wrapper">
                  <div class="hit-block__item-img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/home/hits-3.svg" alt="img">
                  </div>
                </div>
                <div class="hit-block__item-title">
                  Выводят паразитов на всех стадиях развития.
                </div>
                <div class="hit-block__item-text">
                  Препараты уничтожают не только взрослых особей, но и яйца. Полностью останавливают жизненный цикл.
                </div>
              </div>
              <div class="hit-block__item">
                <div class="hit-block__item-wrapper">
                  <div class="hit-block__item-img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/home/hits-4.svg" alt="img">
                  </div>
                </div>
                <div class="hit-block__item-title">
                  Уничтожают вредные микроорганизмы
                </div>
                <div class="hit-block__item-text">
                  Фитодобавки мягко, но эффективно выводят не только паразитов, но и бактерии, грибки, токсины.
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="reviews">
        <div class="container">
          <h3 class="reviews__title title">Отзывы постоянных клиентов</h3>
          <div class="reviews-block">
            <div class="reviews-block__img">
              <img src="<?php echo get_template_directory_uri()?>/assets/images/home/reviews-img.png" alt="img">
            </div>

            <div class="reviews-slider">
              <div class="reviews-slider__inner">
              <?php if(have_rows('otzyvy_kartochka')) : while(have_rows('otzyvy_kartochka')) : the_row();?>
                <div class="reviews-slider__item">
                  <div class="reviews-slider__wrapper">
                    <div class="reviews-slider__top">
                      <div class="reviews-slider__top-name">
                      <?php the_sub_field('otzyvy_kartochka_imya');?>
                      </div>
                      <div class="reviews-slider__top-text">
                      <?php the_sub_field('otzyvy_kartochka_dannye');?>
                      </div>
                    </div>
                    <div class="reviews-slider__wrapper-text">
                    <?php the_sub_field('otzyvy_kartochka_tekst_1');?>
                    </div>
                    <div class="reviews-slider__wrapper-text">
                    <?php the_sub_field('otzyvy_kartochka_tekst_2');?>
                    </div>
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/home/reviews-kovichki.png" alt="img" class="reviews-slider__wrapper-img">
                  </div>
                </div>
              <?php endwhile; endif;?>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="materials">
        <div class="container">
          <h3 class="materials__title title">Полезные материалы</h3>
          <div class="materials-block">
              <?php
                $material = new WP_Query([
                    'post_type' => 'material',
                    'posts_per_page' => 4,
                   
                ])
                ?>
              <?php if($material->have_posts()) : while($material->have_posts()) : $material->the_post();?>
              <div class="materials-block__item">
                <div class="materials-block__item-img">
                  <img src="<?php the_post_thumbnail_url();?>" alt="img">
                </div>
                <div class="materials-block__content">
                  <div class="materials-block__item-title">
                  <?php the_title();?>
                  </div>
                  <div class="materials-block__item-date">
                  <?php echo get_the_date('d-m-Y');?>
                  </div>
                  <div class="materials-block__item-text">
                    <?php the_excerpt()?>
                  </div>
                  <a href="<?php the_permalink()?>" class="materials-block__item-btn">Читать больше</a>
                </div>
              </div>
              <?php endwhile; endif;?>
              <?php wp_reset_postdata();?>
             
          </div>

          <a href="<?php echo get_post_type_archive_link('material')?>" class="materials__btn btn">Смотреть все статьи</a>
        </div>
      </section>

      <section class="questions">
        <div class="container">
            <h4 class="questions-top__title title">Популярные вопросы</h4>
            
          <div class="questions-box">
            <div class="questions-accardion">
            <?php if(have_rows('voprosy')) : while(have_rows('voprosy')) : the_row();?>
              <div class="questions__wrapper">
                <div class="questions-accardion__btn">
                  <span class="questions-accardion__title">
                  <?php the_sub_field('voprosy_zagolovok');?>
                  </span>
                  <div class="questions-accardion__circle"></div>
                </div>
                <div class="questions-accardion__content">
                  <div class="questions-accardion__text">
                    <p>
                    <?php the_sub_field('voprosy_tekst');?>
                    </p>
                  </div>
                </div>
              </div>
              <?php endwhile; endif;?>
            </div>

            <div class="questions-top__img">
              <img src="<?php echo get_template_directory_uri()?>/assets/images/home/questions-img.jpg" alt="img">
            </div>
          </div>
         
        </div>
      </section>  

      
    </main>
    
<?php get_footer();?>
   