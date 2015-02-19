<?php


// rewrite urls
function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'names');
    foreach ($post_types as $post_type) {
	foreach ($taxonomies as $taxonomy) {
	    if ($taxonomy->object_type[0] == $post_type) {
		$categories = get_categories(array('type' => $post_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));
		foreach ($categories as $category) {
		    $rules[$post_type . '/' . $category->slug . '/?$'] = 'index.php?' . $category->taxonomy . '=' . $category->slug;
		}
	    }
	}
    }
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter( 'generate_rewrite_rules', 'taxonomy_slug_rewrite' );


// register Custom Post Types
function create_post_types() {

    register_post_type('projects', array(
        'labels' => array(
	    'name' => 'Projects',
	    'all_items' => 'All Projects'
	),
        'public' => true,
        'has_archive' => true,
	'rewrite' => array('slug' => 'projects'),
	'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
	'exclude_from_search' => false
    ));

}
add_action('init', 'create_post_types');


// register Taxonomies
function create_taxonomies() {

    register_taxonomy('project-categories', array('projects'), array(
	'labels' => array(
	    'name' => 'Project Categories'
	),
        'show_ui' => true,
	'show_tagcloud' => false,
	'hierarchical' => true,
	'rewrite' => array(
	    'slug' => 'projects'
	)
    ));

}
add_action('init', 'create_taxonomies');
