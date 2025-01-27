<?php

// Регистрируем новый тип записей 
add_action('init', 'my_custom_init',0);
function my_custom_init(){
	register_post_type('blog', array(
		'labels'             => array(
			'name'               => __('Блог'), // Основное название типа записи
			'singular_name'      => __('Блог'), // отдельное название записи типа Book
			'add_new'            => __('Добавить Блог'),
			'add_new_item'       => __('Добавить новые Блог'),
			'edit_item'          => __('Редактировать Блог'),
			'new_item'           => __('Новые Блог'),
			'view_item'          => __('Посмотреть Блог'),
			'search_items'       => __('Найти Блог'),
			'not_found'          => __('О школе не Блог'),
			'not_found_in_trash' => __('О школе не Блог'),
			'parent_item_colon'  => __(''),
			'menu_name'          => __('Блог')

		  ),
		'public'             => true,
        'has_archive'        => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		
		'menu_icon'			 => 'dashicons-businessman',
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array('title','editor','thumbnail','excerpt')
	) );


	register_post_type('material', array(
		'labels'             => array(
			'name'               => __('Полезные материалы'), // Основное название типа записи
			'singular_name'      => __('Полезные материалы'), // отдельное название записи типа Book
			'add_new'            => __('Добавить Полезные материалы'),
			'add_new_item'       => __('Добавить новые Полезные материалы'),
			'edit_item'          => __('Редактировать Полезные материалы'),
			'new_item'           => __('Новые Полезные материалы'),
			'view_item'          => __('Посмотреть Полезные материалы'),
			'search_items'       => __('Найти Полезные материалы'),
			'not_found'          => __('О школе не Полезные материалы'),
			'not_found_in_trash' => __('О школе не Полезные материалы'),
			'parent_item_colon'  => __(''),
			'menu_name'          => __('Полезные материалы')

		  ),
		'public'             => true,
        'has_archive'        => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		
		'menu_icon'			 => 'dashicons-businessman',
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array('title','editor','thumbnail','excerpt')
	) );


}