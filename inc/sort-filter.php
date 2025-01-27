<?php
function get_events_string_url(){
    //Возвращает URL (постоянную ссылку) на страницу архива произвольного типа записи.
    $link = get_post_type_archive_link('blog');
    return $link;
}
//СОРТИРОВКА
function events_get_orderby()
{
   return [
       'date-asc' => __('По дате назад', 'oceanwp'),
       'date-desc' => __('По дате вперёд', 'oceanwp'),
       'last_30' => __('За последние 30 дней', 'oceanwp'),
       'title' => __('По названию', 'oceanwp'),
   ];
}
function events_get_orderby_html_list()
{
   $orderby = events_get_orderby();
   echo '<ul class="sorting-desc__list">';

   $link = get_events_string_url();


   foreach ($orderby as $order => $value) {
       $link = add_query_arg('orderby', $order, $link);

   ?>
       <li><a href="<?php echo $link; ?>"><?php echo $value; ?></a></li>
<?php }
   echo '</ul>';
}
//СОРТИРОВКА


//Позволяет изменить запрос WP_Query. Срабатывает перед запросом.
add_action('pre_get_posts', 'events_base_filter');

function events_base_filter($query){
   //СОРТИРОВКА
if (isset($_GET['orderby'])) {
   $orderby = $_GET['orderby'];
   switch ($orderby) {
       case 'date-asc':
           $query->set('orderby', ['date' => 'ASC']);
           break;

       case 'date-desc':
           $query->set('orderby', ['date' => 'DESC']);
           break;
           
       
       case 'last_30':
           $date_query = $query->get('date_query');
           $date_query = is_array($date_query) ? $date_query : [];

           $date_query = [
               [
                   'column' => 'post_date_gmt',
                   'after' => '30 days ago',
               ]

           ];
           $query->set('date_query', $date_query);
           break;

       case 'title':
           $query->set('orderby', ['title' => 'ASC']);
           break;
   }
}


}
