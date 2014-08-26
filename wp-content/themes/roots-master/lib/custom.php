<?php
// add_custom_background();
// ADD CUSTOM POST TYPE: SHOWS
add_action( 'init', 'create_static_block' );

function create_static_block() {
		if (function_exists('register_post_type')) {
			register_post_type('static_block',
				array(
					//'singular_label'      => __('Static Block', THEME_NAME),
					//'label'               => __('Static Content', THEME_NAME),
					'labels'              => array(
							'name' =>				__('Home Content Blocks', 'post type general name'),
							'singular_name' =>		__('Home Block', 'post type singular name'),
							'add_new' =>			__('Add New', 'block'),
							'add_new_item' =>		__('Add New Block'),
							'edit_item' =>			__('Edit Block'),
							'new_item' =>			__('New Block'),
							'all_items' =>			__('Home Content'),
							'view_item' =>			__('View Block'),
							'search_items' =>		__('Search'),
							'not_found' =>			__('No blocks found'),
							'not_found_in_trash' =>	__('No blocks found in Trash'), 
							'parent_item_colon' => '',
							'menu_name' => 'Home Content'
						),
					'exclude_from_search' => true,
					'publicly_queryable'  => true,
					'public'              => true,
					'show_ui'             => true,
					'query_var'           => 'static_block',
					'rewrite'             => array('slug' => 'static_block'),
					'supports'            => array(
						'title',
						'editor',
						'revisions',
					),
				)
			);
		}
	}

// ADD CUSTOM POST TYPE: SHOWS
add_action( 'init', 'create_static_block_about' );

function create_static_block_about() {
		if (function_exists('register_post_type')) {
			register_post_type('static_block_about',
				array(
					//'singular_label'      => __('Static Block', THEME_NAME),
					//'label'               => __('Static Content', THEME_NAME),
					'labels'              => array(
							'name' =>				__('About Content Blocks', 'post type general name'),
							'singular_name' =>		__('About Block', 'post type singular name'),
							'add_new' =>			__('Add New', 'block'),
							'add_new_item' =>		__('Add New Block'),
							'edit_item' =>			__('Edit Block'),
							'new_item' =>			__('New Block'),
							'all_items' =>			__('About Content'),
							'view_item' =>			__('View Block'),
							'search_items' =>		__('Search'),
							'not_found' =>			__('No blocks found'),
							'not_found_in_trash' =>	__('No blocks found in Trash'), 
							'parent_item_colon' => '',
							'menu_name' => 'About Content'
						),
					'exclude_from_search' => true,
					'publicly_queryable'  => true,
					'public'              => true,
					'show_ui'             => true,
					'query_var'           => 'static_block_about',
					'rewrite'             => array('slug' => 'static_block_about'),
					'supports'            => array(
						'title',
						'editor',
						'revisions',
					),
				)
			);
		}
	}
add_action( 'init', 'create_static_block_work' );

function create_static_block_work() {
		if (function_exists('register_post_type')) {
			register_post_type('static_block_work',
				array(
					//'singular_label'      => __('Static Block', THEME_NAME),
					//'label'               => __('Static Content', THEME_NAME),
					'labels'              => array(
							'name' =>				__('Work Content Blocks', 'post type general name'),
							'singular_name' =>		__('Work Block', 'post type singular name'),
							'add_new' =>			__('Add New', 'block'),
							'add_new_item' =>		__('Add New Block'),
							'edit_item' =>			__('Edit Block'),
							'new_item' =>			__('New Block'),
							'all_items' =>			__('Work Content'),
							'view_item' =>			__('View Block'),
							'search_items' =>		__('Search'),
							'not_found' =>			__('No blocks found'),
							'not_found_in_trash' =>	__('No blocks found in Trash'), 
							'parent_item_colon' => '',
							'menu_name' => 'Work Content'
						),
					'exclude_from_search' => true,
					'publicly_queryable'  => true,
					'public'              => true,
					'show_ui'             => true,
					'query_var'           => 'static_block_work',
					'rewrite'             => array('slug' => 'static_block_work'),
					'supports'            => array(
						'title',
						'editor',
						'revisions',
					),
				)
			);
		}
	}
add_action( 'init', 'create_static_block_service' );

function create_static_block_service() {
		if (function_exists('register_post_type')) {
			register_post_type('static_block_service',
				array(
					//'singular_label'      => __('Static Block', THEME_NAME),
					//'label'               => __('Static Content', THEME_NAME),
					'labels'              => array(
							'name' =>				__('Service Content Blocks', 'post type general name'),
							'singular_name' =>		__('Service Block', 'post type singular name'),
							'add_new' =>			__('Add New', 'block'),
							'add_new_item' =>		__('Add New Block'),
							'edit_item' =>			__('Edit Block'),
							'new_item' =>			__('New Block'),
							'all_items' =>			__('Service Content'),
							'view_item' =>			__('View Block'),
							'search_items' =>		__('Search'),
							'not_found' =>			__('No blocks found'),
							'not_found_in_trash' =>	__('No blocks found in Trash'), 
							'parent_item_colon' => '',
							'menu_name' => 'Service Content'
						),
					'exclude_from_search' => true,
					'publicly_queryable'  => true,
					'public'              => true,
					'show_ui'             => true,
					'query_var'           => 'static_block_service',
					'rewrite'             => array('slug' => 'static_block_service'),
					'supports'            => array(
						'title',
						'editor',
						'revisions',
					),
				)
			);
		}
	}
add_action( 'init', 'create_static_block_thinking' );

function create_static_block_thinking() {
		if (function_exists('register_post_type')) {
			register_post_type('static_block_thinking',
				array(
					//'singular_label'      => __('Static Block', THEME_NAME),
					//'label'               => __('Static Content', THEME_NAME),
					'labels'              => array(
							'name' =>				__('Thingking Content Blocks', 'post type general name'),
							'singular_name' =>		__('Thingking Block', 'post type singular name'),
							'add_new' =>			__('Add New', 'block'),
							'add_new_item' =>		__('Add New Block'),
							'edit_item' =>			__('Edit Block'),
							'new_item' =>			__('New Block'),
							'all_items' =>			__('Thingking Content'),
							'view_item' =>			__('View Block'),
							'search_items' =>		__('Search'),
							'not_found' =>			__('No blocks found'),
							'not_found_in_trash' =>	__('No blocks found in Trash'), 
							'parent_item_colon' => '',
							'menu_name' => 'Thingking Content'
						),
					'exclude_from_search' => true,
					'publicly_queryable'  => true,
					'public'              => true,
					'show_ui'             => true,
					'query_var'           => 'static_block_thinking',
					'rewrite'             => array('slug' => 'static_block_thinking'),
					'supports'            => array(
						'title',
						'editor',
						'revisions',
					),
				)
			);
		}
	}