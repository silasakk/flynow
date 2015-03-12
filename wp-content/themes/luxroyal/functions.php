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

		/************************register faq***************************/
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

		/************************register Contact Us***************************/
		$contact = new CPT(array(
						    'post_type_name' => 'contact',
						    'singular' => 'Contact Us',
						    'plural' => 'Contact Us',
						    'slug' => 'contactus'
						),
						array('supports' => array('title', 'excerpt'),'has_archive'   => true));

		// $article->register_taxonomy('blog_category');
		$contact->register_taxonomy(array(
						    'taxonomy_name' => 'contact_category',
						    'singular' => 'Contact Category',
						    'plural' => 'Contact Categories',
						    'slug' => 'contact_category'
						));

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
				"my-angular",
				get_template_directory_uri() . '/assets/js/angular/angular.min.js'
			);
		wp_enqueue_script(
				"imgcentering",
				get_template_directory_uri() . '/assets/js/imgcentering.min.js',
				"my-jquery"
			);
		wp_enqueue_script(
				"main-js",
				get_template_directory_uri() . '/assets/js/main.js',
				"my-jquery"
			);
		wp_enqueue_script(
				"usocial",
				get_template_directory_uri() . '/assets/js/usocial.js',
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
	//add_filter('wp_handle_upload_prefilter','tc_handle_upload_prefilter');

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
	    $meta_boxes['tel'] = array(
	        'id' => 'tel',
	        'title' => 'Tel',
	        'pages' => array('contact'), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	        'show_names' => true, // Show field names on the left
	        'fields' => array(
	            array(
				    'name' => 'Tel',
				    'desc' => '',
				    'id' => $prefix . 'tel',
				    'type' => 'text',
				    'options' => array(),
				),
	        ),
	    );
	    $meta_boxes['fax'] = array(
	        'id' => 'fax',
	        'title' => 'Fax',
	        'pages' => array('contact'), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	        'show_names' => true, // Show field names on the left
	        'fields' => array(
	            array(
				    'name' => 'Fax',
				    'desc' => '',
				    'id' => $prefix . 'fax',
				    'type' => 'text',
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

	function the_titlesmall($before = '', $after = '', $echo = true, $length = false) { $title = get_the_title();

		if ( $length && is_numeric($length) ) {
			$title = iconv_substr( $title, 0, $length );
		}

		if ( strlen($title)> 0 ) {
			$title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
			if ( $echo )
				echo $title;
			else
				return $title;
		}
	}

	/********************************************************* manage footer*******************************************************/
	function tutsplus_widgets_init() {
 
	    // First footer widget area, located in the footer. Empty by default.
	    register_sidebar( array(
	        'name' => __( 'First Footer Widget Area', 'tutsplus' ),
	        'id' => 'first-footer-widget-area',
	        'description' => __( 'The first footer widget area', 'tutsplus' ),
	        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h3 class="widget-title">',
	        'after_title' => '</h3>',
	    ) );
	 
	    // Second Footer Widget Area, located in the footer. Empty by default.
	    register_sidebar( array(
	        'name' => __( 'Second Footer Widget Area', 'tutsplus' ),
	        'id' => 'second-footer-widget-area',
	        'description' => __( 'The second footer widget area', 'tutsplus' ),
	        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h3 class="widget-title">',
	        'after_title' => '</h3>',
	    ) );
	 
	    // Third Footer Widget Area, located in the footer. Empty by default.
	    register_sidebar( array(
	        'name' => __( 'Third Footer Widget Area', 'tutsplus' ),
	        'id' => 'third-footer-widget-area',
	        'description' => __( 'The third footer widget area', 'tutsplus' ),
	        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h3 class="widget-title">',
	        'after_title' => '</h3>',
	    ) );
	 
	    // Fourth Footer Widget Area, located in the footer. Empty by default.
	    register_sidebar( array(
	        'name' => __( 'Fourth Footer Widget Area', 'tutsplus' ),
	        'id' => 'fourth-footer-widget-area',
	        'description' => __( 'The fourth footer widget area', 'tutsplus' ),
	        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h3 class="widget-title">',
	        'after_title' => '</h3>',
	    ) );

	    // Five Footer Widget Area, located in the footer. Empty by default.
	    register_sidebar( array(
	        'name' => __( 'Five Footer Widget Area', 'tutsplus' ),
	        'id' => 'five-footer-widget-area',
	        'description' => __( 'The five footer widget area', 'tutsplus' ),
	        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h3 class="widget-title">',
	        'after_title' => '</h3>',
	    ) );

	    // Six Footer Widget Area, located in the footer. Empty by default.
	    register_sidebar( array(
	        'name' => __( 'Six Footer Widget Area', 'tutsplus' ),
	        'id' => 'six-footer-widget-area',
	        'description' => __( 'The six footer widget area', 'tutsplus' ),
	        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h3 class="widget-title">',
	        'after_title' => '</h3>',
	    ) );
	         
	}
	 
	// Register sidebars by running tutsplus_widgets_init() on the widgets_init hook.
	add_action( 'widgets_init', 'tutsplus_widgets_init' );


	/********************************************************* Creating the widget blog*******************************************************/
	class wpb_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			// Base ID of your widget
			'wpb_widget', 

			// Widget name will appear in UI
			__('Widget Blog', 'wpb_widget_domain'), 

			// Widget description
			array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		$args = array(
				"post_type" 		=> 'blog',
				'post_status'		=> array( 'publish' ),
				"posts_per_page" 	=> '5',
				"orderby"			=> 'date',
				"order"				=> 'desc',
				);
			// var_dump($args);
		// The Query
		$the_query = new WP_Query( $args );

    		if($the_query->have_posts()){
				$i = 1;
				echo '<div><ul>';
				while($the_query->have_posts()){
					$the_query->the_post();
					echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
				}
				echo '</ul></div>';
			}	
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
		}
		else {
		$title = __( 'New title', 'wpb_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
		}
	} // Class wpb_widget ends here

	// Register and load the widget
	function wpb_load_widget() {
		register_widget( 'wpb_widget' );
	}
	add_action( 'widgets_init', 'wpb_load_widget' );


	/********************************************************* Creating the widget product*******************************************************/
	class MyNewWidget extends WP_Widget {

		function MyNewWidget() {
			// Instantiate the parent object
			parent::__construct( false, 'Widget Products' );
		}

		public function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
			// before and after widget arguments are defined by themes
			echo $args['before_widget'];
			if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

			// This is where you run the code and display the output
			$args = array(
					"post_type" 		=> 'product',
					'post_status'		=> array( 'publish' ),
					"posts_per_page" 	=> '5',
					"orderby"			=> 'date',
					"order"				=> 'desc',
					);
				// var_dump($args);
			// The Query
			$the_query = new WP_Query( $args );

	    		if($the_query->have_posts()){
					$i = 1;
					echo '<div><ul>';
					while($the_query->have_posts()){
						$the_query->the_post();
						echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
					}
					echo '</ul></div>';
				}	
			echo $args['after_widget'];
		}

		function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			return $instance;
		}

		function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
			}
			else {
			$title = __( 'New title', 'wpb_widget_domain' );
			}
			// Widget admin form
			?>
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php 
		}
	}

	function myplugin_register_widgets() {
		register_widget( 'MyNewWidget' );
	}

	add_action( 'widgets_init', 'myplugin_register_widgets' );

	function template_chooser($template)   
	{    
	  global $wp_query;   
	  $post_type = get_query_var('post_type');   
	  if( $wp_query->is_search)   
	  {
	    return locate_template('archive-search.php');  //  redirect to archive-search.php
	  }   
	  return $template;   
	}
	add_filter('template_include', 'template_chooser');  

	// search
	add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
	function title_like_posts_where( $where, &$wp_query ) {
	    global $wpdb;
	    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
	        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
	    }
	    return $where;
	}
?>