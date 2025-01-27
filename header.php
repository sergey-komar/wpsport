<!DOCTYPE html>
<html lang="<?php language_attributes()?>">

<head>
  <meta charset="<?php bloginfo('charset')?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head();?>
 
</head>

<body <?php body_class()?>>
    <?php wp_body_open()?>
    
  <header class="header">
    
      <div class="header-top">
        <div class="container">
          <nav class="menu">
              <?php
                  wp_nav_menu([
                    'theme_location' => 'menu-header',
                    'menu_class' => 'menu__list',
                    'container' => ''
                  ]);
                ?>
           
          </nav>

          <div class="box-mobile">
            <a href="<?php echo get_home_url(); ?>" class="logo">
              <img src="<?php the_field('logotip_v_shapke', 'options');?>" alt="img">
            </a>
            <div class="box-mobile__right">
              <a href="./cart-empty.html" class="header-bottom__info-basket">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/home/basket.svg" alt="img" class="header-bottom__info-img">
                <span class="cart-badge">3</span>
              </a>
              <div class="nav-icon">
                <div class="nav-icon__middle"></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>

      <div class="container">
        <div class="header-bottom">
          <a href="<?php echo get_home_url(); ?>" class="logo">
            <img src="<?php the_field('logotip_v_shapke', 'options');?>" alt="img">
          </a>
          <div class="header-bottom__info">
            <div class="header-bottom__cart">
              <div class="header-bottom__cart-text">Корзина</div>
              <a href="./cart.html" class="header-bottom__info-basket">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/home/basket.svg" alt="img" class="header-bottom__info-img">
                <span class="cart-badge">3</span>
              </a>
            </div>
           
            <a href="tel:<?php the_field('telefon_v_shapke', 'options');?>" class="header-bottom__info-phone">
            <?php the_field('telefon_v_shapke', 'options');?>
            </a>
            <div class="header-bottom__info-text btn-modal">Заказать звонок</div>
          </div>
        </div>
      </div>
  </header>