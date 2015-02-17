<?



require_once( get_template_directory() . '/libraries/inc/CPT.php' );

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( get_template_directory() .'/meta_box/init.php' );
    }
}

function be_sample_metaboxes( $meta_boxes ) {

	// WP_Query arguments
	$args = array (
		'post_type'              => 'product',
	);

	// The Query
	$query = new WP_Query( $args );

	$select = array();
	// The Loop
	if ( $query->have_posts() ) {
		
		while ( $query->have_posts() ) {
			$query->the_post();
			$select[get_the_ID()] = get_the_title();
			
		}
		
	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();

    $prefix = '_lux_'; // Prefix for all fields

    $meta_boxes['test_metabox'] = array(
        'id' => 'product-metabox',
        'title' => 'Product Metabox',
        'pages' => array('howto','manual'), // post type
        'context' => 'side',
        'priority' => 'low',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            
            array(
			    'name'    => 'Product Select',
			    'desc'    => 'Select an product',
			    'id'      => $prefix . 'product_select',
			    'type'    => 'select',
			    'options' => $select,
			    'default' => 'custom',
			)
        ),
    );

	$meta_boxes['field_group'] = array(
	'id'         => 'field_group',
	'title'      => __( 'Repeating Field Group', 'cmb' ),
	'pages'      => array( 'howto', 'product'),
	'fields'     => array(
		array(
			'id'          => $prefix . 'repeat_group',
			'type'        => 'group',
			'options'     => array(
				
				'add_button'    => __( 'Add Another Entry', 'cmb' ),
				'remove_button' => __( 'Remove Entry', 'cmb' ),
				'sortable'      => true, // beta
			),
			// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
			'fields'      => array(
					array(
						'name' => 'Entry Title',
						'id'   => 'title',
						'type' => 'text',
						// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
					array(
						'name' => 'Description',
						'description' => 'Write a short description for this entry',
						'id'   => 'description',
						'type' => 'textarea_small',
					),
					array(
						'name' => 'Entry Image',
						'id'   => 'image',
						'type' => 'file',

					)
				),
			),
		),
	);
    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes' );


/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_attached_posts_field_metaboxes_example( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_attached_cmb2_';

	$meta_boxes[] = array(
		'id'         => 'cmb2_attached_posts_field',
		'title'      => __( 'Attached Posts', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => false, // Show field names on the left
		'fields'     => array(
			array(
				'name'       => __( 'Posts', 'cmb2' ),
				'id'         => 'cmb_attached_posts',
				'type'       => 'product',
				'desc'       => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
			),
			array(
				'name'    => __( 'Posts', 'cmb2' ),
				'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
				'id'      => $prefix . 'howto',
				'type'    => 'howto',
				'options' => array(
					'query_args' => array( 'posts_per_page' => 10 ), // override the get_posts args
				),
			)
		),
	);

	/* End CMB for Pages */

	return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'cmb2_attached_posts_field_metaboxes_example' );

/* Install application form */

require_once( get_template_directory() . '/libraries/form/appform.php' );

/* Install application form */

require_once( get_template_directory() . '/libraries/product-catalog/product-catalog.php' );

