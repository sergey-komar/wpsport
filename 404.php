<?php get_header();?>
    <main class="main">
    <div class="breadcrumbs">
        <div class="container">
            <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
        </div>
    </div>
        <div class="container">
            <div class="error">
                <div class="error__img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/404.png" alt="img">
                </div>
                <div class="error__content">
                    <h1 class="error__content-num">404</h1>
                    <div class="error__content-text">Извините такой страницы не существует</div>
                    <a href="<?php echo get_home_url(); ?>" class="error__content-link">Вернитесь на главную страницу</a>
                </div>
            </div>
        </div>
    </main>
<?php get_footer();?>