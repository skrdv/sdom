<?php
/* Bones Custom Post Type Example
This page walks you through creating
a custom post type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a separate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function project_post_type() {
	// creating (registering) the custom type
	register_post_type( 'project', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Проекты', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Проект', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'Все проекты', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Добавить новый проект', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Редактировать', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Редактировать проект', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'Новый проект', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'Смотреть проект', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Поиск проект', 'bonestheme' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Ничего не найдено.', 'bonestheme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Ничего не найдено в Корзине.', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( '', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/project-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'project', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'projects-archive', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'project' );
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type( 'post_tag', 'project' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'project_post_type');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'project_cat',
		array('project'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Категории проектов', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Категория проектов', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Поиск категории проектов', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'Все категории проектов', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Родительская категория проектов', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Project Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Редактировать категорию проектов', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Обновить категорию проектов', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Добавить категорию проектов', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'Заголовок категории проектов', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'projects' ),
		)
	);


?>