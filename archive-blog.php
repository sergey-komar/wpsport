<?php
/**
 * TemplateName: Новости
 */
?>
<?php get_header();?>
<main class="main">
    <div class="breadcrumbs">
        <div class="container">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
        </div>
        
    </div>

        <div class="blog-posts-filter">
            <div class="container">
                    <div class="sorting-desc__title">
                        <span>Сортировать по:</span>
                        <?php events_get_orderby_html_list(); ?>
                    </div>
            </div>
            <!-- СОРТИРОВКА -->
          
        </div>


    <section class="news">
        <div class="container">
            <div class="news-block">
                <?php
                $blog = new WP_Query([
                    'post_type' => 'blog',
                    'posts_per_page' => 6,
                    'paged' => $paged,
                ])
                ?>
                <?php if($blog->have_posts()) : while($blog->have_posts()) : $blog->the_post();?>
                <div class="news-block__item">
                    <div class="news-block__item-img">
                        <img src="<?php the_post_thumbnail_url();?>" alt="img">
                        <div class="news-block__item-date">
                           <?php echo get_the_date('d-m-Y');?>
                        </div>
                    </div>
                    <div class="news-block__wrapper">
                    
                        <div class="news-block__item-title">
                            <?php the_title();?>
                        </div>
                        <a href="<?php the_permalink()?>" class="news-block__item-link">Читать больше</a>
                    </div>
                   
                </div>
                <?php endwhile; endif;?>
                <?php wp_reset_postdata();?>
            </div>

            <div class="pagination-news">
                <?php
                    $big = 999999999; // need an unlikely integer

                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $blog->max_num_pages,
                        'prev_text'    => __('« Назад'),
                        'next_text'    => __('Вперёд »'),
                    ) );
                ?>
            </div>
        </div>
    </section>

  </main>
<?php get_footer();?>