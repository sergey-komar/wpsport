<?php
// ПРОВЕРЯЕМ ЕСТЬ ИЛИ НЕТ САЙДБАР ЕСЛИ НЕТ ТО НЕ ВЫВОДИМ
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>
 

<div class="aside">
    <div class="aside-box">
        <button class="aside-box__back" onclick="history.back()">Вернуться назад</button>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
       
    </div>
    

</div>
