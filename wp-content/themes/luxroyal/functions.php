<?php 
	require_once( get_template_directory() . '/libraries/init.php' );
	

	function lux_custom_post_type() {

		/************************register News & Event***************************/
		$news = new CPT(array(
					    'post_type_name' => 'event',
					    'singular' => 'event',
					    'plural' => 'events',
					    'slug' => 'events'
					), 
					array('supports' => array('title', 'editor', 'thumbnail','excerpt') ,'has_archive'   => true));

		$news->register_taxonomy('category');

		/************************register Article***************************/
		$article = new CPT('article',array('supports' => array('title', 'editor', 'thumbnail','excerpt')));

		$article->register_taxonomy('category');

		/************************register How To***************************/
		$howto = new CPT(array(
						    'post_type_name' => 'howto',
						    'singular' => 'How To',
						    'plural' => 'How To',
						    'slug' => 'howto'
						),
						array('supports' => array('title', 'editor', 'thumbnail','excerpt')));

		/************************register How To***************************/
		$faq = new CPT(array(
						    'post_type_name' => 'faq',
						    'singular' => 'F A Q',
						    'plural' => 'F A Q',
						    'slug' => 'faq'
						),
						array('supports' => array('title', 'editor')));

		/************************register manual***************************/
		$manual = new CPT('manual', array('supports' => array('title', 'editor', 'thumbnail','excerpt')));

	}
	add_action( 'init', 'lux_custom_post_type', 0 );
    


	function lux_scripts() {

		wp_enqueue_style(
				"main-style",
				get_template_directory_uri() . '/assets/css/main.css'
			);

		wp_enqueue_style(
				"font-awesome",
				get_template_directory_uri() . '/assets/js/font-awesome/font-awesome.min.css',
				"main-style"
			);

		wp_enqueue_script(
				"my-jquery",
				get_template_directory_uri() . '/assets/js/jquery/jquery.min.js'
			);
		wp_enqueue_script(
				"main-js",
				get_template_directory_uri() . '/assets/js/main.js',
				"my-jquery"
			);
		
	}

	add_action( 'wp_enqueue_scripts', 'lux_scripts' );

	/****************** front end menu *******************************/
	function register_head_menu() {
	  register_nav_menu('header-menu',__( 'Header Menu' ));
	}
	add_action( 'init', 'register_head_menu' );

	/****************** Theme support *******************************/
	add_theme_support( 'post-thumbnails' ); 

	/****************** remove default post *******************************/
	function remove_default_post(){
		remove_menu_page( 'edit.php' ); 
	}
	add_action( 'admin_menu', 'remove_default_post' );

	/****************** hr button *******************************/
	function enable_more_buttons($buttons) {
	  $buttons[] = 'hr';
	 
	  return $buttons;
	}
	add_filter("mce_buttons", "enable_more_buttons");
	
?>