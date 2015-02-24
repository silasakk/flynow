<?php 
	require_once( get_template_directory() . '/libraries/init.php' );
	

	function lux_custom_post_type() {

		/************************register News & Event***************************/
		$news = new CPT(array(
					    'post_type_name' => 'event',
					    'singular' => 'event',
					    'plural' => 'events',
					    'slug' => 'events',
					    // 'rewrite' => array('slug' => 'events2')
					), 
					array('supports' => array('title', 'editor', 'thumbnail','excerpt') ,'has_archive'   => true));

	
		$news->register_taxonomy(array(
						    'taxonomy_name' => 'event_category',
						    'singular' => 'Event Category',
						    'plural' => 'Event Categories',
						    'slug' => 'event_category'
						));


		/************************register Article***************************/
		$article = new CPT(array(
						    'post_type_name' => 'blog',
						    'singular' => 'blog',
						    'plural' => 'blogs',
						    'slug' => 'blogs'
						),
						array('supports' => array('title', 'editor', 'thumbnail','excerpt'),'has_archive'   => true));

		// $article->register_taxonomy('blog_category');
		$article->register_taxonomy(array(
						    'taxonomy_name' => 'blog_category',
						    'singular' => 'Blog Category',
						    'plural' => 'Blog Categories',
						    'slug' => 'blog_category'
						));
		

		function blog_feature_metabox( $meta_boxes ) {

		    $prefix = '_cmb_'; // Prefix for all fields
		    $meta_boxes['feature'] = array(
		        'id' => 'feature',
		        'title' => 'Feature',
		        'pages' => array('blog'), // post type
		        'context' => 'side',
		        'priority' => 'low',
		        'show_names' => true, // Show field names on the left
		        'fields' => array(
		            array(
					    'name' => 'Feature',
					    'desc' => 'this is feature',
					    'id' => $prefix . 'feature',
					    'type' => 'checkbox'
					),
		        ),
		    );

		    return $meta_boxes;
		}
		add_filter( 'cmb_meta_boxes', 'blog_feature_metabox' );

		/************************register How To***************************/
		$howto = new CPT(array(
						    'post_type_name' => 'howto',
						    'singular' => 'How To',
						    'plural' => 'How To',
						    'slug' => 'howtos'
						),
						array('supports' => array('title', 'editor', 'thumbnail','excerpt') ,'has_archive'   => true));

		/************************register How To***************************/
		$faq = new CPT(array(
						    'post_type_name' => 'faq',
						    'singular' => 'F A Q',
						    'plural' => 'F A Q',
						    'slug' => 'faqs'
						),
						array('supports' => array('title', 'editor') ,'has_archive'   => true));

		/************************register manual***************************/
		$manual = new CPT(array(
						    'post_type_name' => 'manual',
						    'singular' => 'Manual',
						    'plural' => 'Manuals',
						    'slug' => 'manuals'
						),
						array('supports' => array('title', 'editor','excerpt') ,'has_archive'   => true));
		// $manual = new CPT('manual', array('supports' => array('title', 'editor', 'thumbnail','excerpt')));


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

	function tc_handle_upload_prefilter($file)
	{

		if(get_post_type($_REQUEST['post_id']) == 'event'){
		    $img=getimagesize($file['tmp_name']);
		    $minimum = array('width' => '600', 'height' => '600');
		    $width= $img[0];
		    $height =$img[1];

		    if ($width < $minimum['width'] )
		        return array("error"=>"Image dimensions are too small. Minimum width is {$minimum['width']}px. Uploaded image width is $width px");

		    elseif ($height <  $minimum['height'])
		        return array("error"=>"Image dimensions are too small. Minimum height is {$minimum['height']}px. Uploaded image height is $height px");
		    else
		        return $file; 
		}
    	return $file;
	}
	add_filter('wp_handle_upload_prefilter','tc_handle_upload_prefilter');

	/* custom field about us */
	function be_sample_metaboxes2( $meta_boxes ) {
	    $prefix = '_cmb_'; // Prefix for all fields
	    $meta_boxes['history'] = array(
	        'id' => 'history',
	        'title' => 'History',
	        'pages' => array('page'), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	        'show_names' => true, // Show field names on the left
	        'fields' => array(
	            array(
				    'name' => 'History',
				    'desc' => '',
				    'id' => $prefix . 'history',
				    'type' => 'wysiwyg',
				    'options' => array(),
				),
	        ),
	    );
	    $meta_boxes['vision'] = array(
	        'id' => 'vision',
	        'title' => 'Vision',
	        'pages' => array('page'), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	        'show_names' => true, // Show field names on the left
	        'fields' => array(
	            array(
				    'name' => 'Vision',
				    'desc' => '',
				    'id' => $prefix . 'vision',
				    'type' => 'wysiwyg',
				    'options' => array(),
				),
	        ),
	    );
	    $meta_boxes['mission'] = array(
	        'id' => 'mission',
	        'title' => 'Mission',
	        'pages' => array('page'), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	        'show_names' => true, // Show field names on the left
	        'fields' => array(
	            array(
				    'name' => 'Mission',
				    'desc' => '',
				    'id' => $prefix . 'mission',
				    'type' => 'wysiwyg',
				    'options' => array(),
				),
	        ),
	    );
	    $meta_boxes['file'] = array(
	        'id' => 'file',
	        'title' => 'File',
	        'pages' => array('manual','howto'), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	        'show_names' => true, // Show field names on the left
	        'fields' => array(
	            array(
				    'name' => 'file',
				    'desc' => 'Upload an image or enter an URL.',
				    'id' => $prefix . 'file',
				    'type' => 'file',
				    'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
				),
	        ),
	    );

	    return $meta_boxes;
	}
	add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes2' );

?>