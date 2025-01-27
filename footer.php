<section class="contact" id="contacts">
    <div class="container">
        <h3 class="contact__title title">Наши контакты</h3>
        <div class="contact-block">
        <div class="contact-block__text">
            Остались вопросы? Звоните или найдите нас в сообществе:
        </div>
        <a href="tel:<?php the_field('kontakty_telefon', 'options');?>" class="contact-block__phone">
            <?php the_field('kontakty_telefon', 'options');?>
        </a>
            <div class="contact-block__social">
        

                <?php if(have_rows('kontakty_ikonki','options')) : while(have_rows('kontakty_ikonki','options')) : the_row();?>

                <a href="<?php the_sub_field('kontakty_ikonki_ssylka');?>" class="contact-block__social-link contact-block__social-link--whatsap">
                    <img src="<?php the_sub_field('kontakty_ikonki_kartinka');?>" alt="img">
                </a>
            <?php endwhile; endif;?>

            
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container">
    <div class="footer-block">
        <div class="footer-block__left">
        <a href="<?php echo get_home_url();?>" class="footer-block__left-logo">
            <img src="<?php the_field('logotip_v_podvale', 'options');?>" alt="img">
        </a>
        </div>

        <div class="footer-block__center">
        <?php
            wp_nav_menu([
            'theme_location' => 'menu-footer',
            'menu_class' => 'footer-block__menu',
            'container' => ''
            ]);
        ?>
        </div>

        <div class="footer-block__right">
        <a href="tel:<?php the_field('telefon_v_podvale', 'options');?>" class="footer-block__right-phone">
            <?php the_field('telefon_v_podvale', 'options');?>
        </a>
        <button class="footer-block__right-btn btn-modal">Заказать звонок</button>
        
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-block__left-text">© 2024. Все права защищены.</div>
        <a href="<?php echo get_permalink(get_page_by_path('privacy-policy'))?>" class="footer-block__center-text">Политики конфиденциальности</a>
        <a href="mailto:<?php the_field('pochta_v_podvale', 'options');?>" class="footer-block__right-mail">
            <?php the_field('pochta_v_podvale', 'options');?>
        </a>
    </div>
    </div>
</footer>
    <div class="modal">
        <div class="modal__inner">
            <div class="modal__inner-block">
            
                <div  class="modal-form">
                    <div class="modal__inner-block-title">Оставить заявку</div>
                    <?php echo do_shortcode('[contact-form-7 id="c7b3db2" title="Модальное окно"]')?>
                    <div  class="modal__close">&times;</div>
                </div>
            </div>
        </div>
    </div>
<div class="btnUp">&uarr;</div> 


  <script src="https://unpkg.com/imask"></script>
  <?php wp_footer();?>
</body>

</html>