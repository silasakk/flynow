<?php

class Product_content {

	private $name;

   
    private $version;

   
    public function __construct() {

        $this->name = 'product-content';
        $this->version = '1.0';

    }

    public function run() {
        add_action( 'wp_ajax_del_hl', array($this,'del_hl') );
    	
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );

         add_action( 'save_post', array( $this, 'save_post' ) );
    }
    function del_spec() {
        
       
            //var_dump($_REQUEST);
            $val_spec['field'] = $_REQUEST['data']["key"];
            $val_spec['value'] = $_REQUEST['data']["value"];
            $data_spec = serialize($val_spec);

            delete_post_meta($_REQUEST['post_id'],"spec",$data_spec);
            die;

    }
    public function enqueue_styles() {

        wp_enqueue_style(
            $this->name,
            plugin_dir_url( __FILE__ ) . 'css/style.css',
            array()
        );

    }
    public function enqueue_scripts() {

        wp_enqueue_media();
        
       
        
        wp_enqueue_script(
            $this->name."DND",
            plugin_dir_url( __FILE__ ) . 'js/jquery.tablednd.min.js',
            array( 'jquery' ),
            $this->version,
            'all'
        );
        wp_enqueue_script(
            $this->name,
            plugin_dir_url( __FILE__ ) . 'js/product-content.js',
            array( 'jquery' ),
            $this->version,
            'all'
        );

        
       
        
    }
    public function add_meta_box() {

        $screens = array( 'product');

        foreach ( $screens as $screen ) {

            
            
            add_meta_box(
                $this->name."desc",
                'Product Short Description',
                array( $this, 'display_product_desc' ),
                $screen
            );

            add_meta_box(
                $this->name."content",
                'Product Description',
                array( $this, 'display_product_content' ),
                $screen,
                'normal',
                'low'
            );
        }
    }
 
    public function display_product_desc( $post ) {
        include_once( dirname( __FILE__ ) . '/product-short-title.php' );
    }
    public function display_product_content( $post ) {
        include_once( dirname( __FILE__ ) . '/product-content.php' );
    }
    
    public function save_post( $post_id ) {
        if(isset($_REQUEST["short_desc"]))
        if ( ! update_post_meta ($post_id, '_short_desc', $_REQUEST["short_desc"]) ) { 
            add_post_meta($post_id, '_short_desc', $_REQUEST["short_desc"], true ); 
        }

        if(isset($_REQUEST["desc"]))
        if ( ! update_post_meta ($post_id, '_desc', $_REQUEST["desc"]) ) { 
            add_post_meta($post_id, '_desc', $_REQUEST["desc"], true ); 
        }

        if(isset($_REQUEST["mycustomeditor"]))
        if ( ! update_post_meta ($post_id, '_detail', $_REQUEST["mycustomeditor"]) ) { 
            add_post_meta($post_id, '_detail', $_REQUEST["mycustomeditor"], true ); 
        }
        
            
  

    }
}