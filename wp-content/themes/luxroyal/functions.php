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

		// $news->register_taxonomy('category');
		register_taxonomy('category', array('events','blog'), array(
	        'labels' => array(
	            'name' => 'Recipes Categories'
	        ),
	        'show_ui' => true,
	        'show_tagcloud' => false,
	        'rewrite' => array('slug' => 'events-category')
	    ));


		/************************register Article***************************/
		$article = new CPT(array(
						    'post_type_name' => 'blog',
						    'singular' => 'blog',
						    'plural' => 'blogs',
						    'slug' => 'blogs'
						),
						array('supports' => array('title', 'editor', 'thumbnail','excerpt'),'has_archive'   => true));

		$article->register_taxonomy('category');
		// register_taxonomy(
		// 	'category',
		// 	'blog',
		// 	array(
		// 		'label' => __( 'Cat' ),
		// 		'rewrite' => array( 'slug' => 'blog_category' ),
		// 		'hierarchical' => true,
		// 		'with_front'	=> false,
		// 	)
		// );

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

	/*
 * Replace Taxonomy slug with Post Type slug in url
 * Version: 1.1
 */
function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    // get all custom taxonomies
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    // get all custom post types
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');
     
    foreach ($post_types as $post_type) {
        foreach ($taxonomies as $taxonomy) {
         
            // go through all post types which this taxonomy is assigned to
            foreach ($taxonomy->object_type as $object_type) {
                 
                // check if taxonomy is registered for this custom type
                if ($object_type == $post_type->rewrite['slug']) {
             
                    // get category objects
                    $terms = get_categories(array('type' => $object_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));
             
                    // make rules
                    foreach ($terms as $term) {
                        $rules[$object_type . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    }
                }
            }
        }
    }
    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'taxonomy_slug_rewrite');
	
?>