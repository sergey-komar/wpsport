<?php
// ПРОВЕРЯЕМ ЕСТЬ ИЛИ НЕТ САЙДБАР ЕСЛИ НЕТ ТО НЕ ВЫВОДИМ
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>
 

<div class="aside">
    <div class="aside-box">
        <a href="#" class="aside-box__back">Вернуться назад</a>

        <div class="aside__inner">
            <div class="aside-price">
                <div class="aside-price__name">Цена, руб.</div>
                <div class="aside-price__filter">
                    <input type="text" class="aside-price__filter-input" placeholder="от 10">
                    <input type="text" class="aside-price__filter-input" placeholder="до 1000">
                </div>
            </div>

            <div class="aside-availability">
                <div class="aside-availability__block">
                    <div class="aside-availability__block-name">Наличие:</div>
                    <input type="checkbox" class="aside-availability__block-checkbox">
                </div>
            </div>

            <div class="aside-manufacturer">
                <div class="aside-manufacturer__name">Производитель:</div>
                <div class="aside-manufacturer__filter">
                    <label class="aside-manufacturer__label">
                        <input type="checkbox" class="aside-manufacturer__filter-input">
                        <span class="aside-manufacturer__filter-custom"></span>
                        <div class="aside-manufacturer__filter-name">Россия</div>
                    </label>
                    <label class="aside-manufacturer__label">
                        <input type="checkbox" class="aside-manufacturer__filter-input">
                        <span class="aside-manufacturer__filter-custom"></span>
                        <div class="aside-manufacturer__filter-name">Беларусь</div>
                    </label>
                    <label class="aside-manufacturer__label">
                        <input type="checkbox" class="aside-manufacturer__filter-input">
                        <span class="aside-manufacturer__filter-custom"></span>
                        <div class="aside-manufacturer__filter-name">Китай</div>
                    </label>
                    <label class="aside-manufacturer__label">
                        <input type="checkbox" class="aside-manufacturer__filter-input">
                        <span class="aside-manufacturer__filter-custom"></span>
                        <div class="aside-manufacturer__filter-name">Индия</div>
                    </label>
                </div>
            </div>

            <div class="aside-availability">
                <div class="aside-availability__block">
                    <div class="aside-availability__block-name">Наличие:</div>
                    <input type="checkbox" class="aside-availability__block-checkbox">
                </div>
            </div>

            <div class="aside-appointment">
                <div class="aside-appointment__name">Назначение</div>
                <div class="aside-appointment__filter">
                    <label class="aside-appointment__label">
                        <input type="checkbox" class="aside-appointment__filter-input">
                        <span class="aside-appointment__filter-custom"></span>
                        <div class="aside-appointment__filter-name">Для печени</div>
                    </label>
                    <label class="aside-appointment__label">
                        <input type="checkbox" class="aside-appointment__filter-input">
                        <span class="aside-appointment__filter-custom"></span>
                        <div class="aside-appointment__filter-name">Для волос</div>
                    </label>
                    <label class="aside-appointment__label">
                        <input type="checkbox" class="aside-appointment__filter-input">
                        <span class="aside-appointment__filter-custom"></span>
                        <div class="aside-appointment__filter-name">Для почек</div>
                    </label>
                    <label class="aside-appointment__label">
                        <input type="checkbox" class="aside-appointment__filter-input">
                        <span class="aside-appointment__filter-custom"></span>
                        <div class="aside-appointment__filter-name">Для сердца</div>
                    </label>
                </div>
            </div>
            <button class="aside__apply btn">Применить</button>
        </div>
        
    </div>
    
    <button class="aside__clear">Очистить фильтр</button>
</div>
