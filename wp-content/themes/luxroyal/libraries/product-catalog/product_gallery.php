<?php

class Product_gallery {

   
    private $name;

   
    private $version;

   
    public function __construct() {

        $this->name = 'product-catalog';
        $this->version = '1.0';

    }

    /**
     * Defines the hooks that will register and enqueue the JavaScriot
     * and the meta box that will render the option.
     *
     * @since 0.1.0
     */
    

    public function run() {
        
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'wp_ajax_example_ajax_request', array($this,'example_ajax_request') );
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post', array( $this, 'save_post' ) );
        
        
    }

    function example_ajax_request() {
        
        foreach($_REQUEST['data']["key"] as $key => $value){
            echo $_REQUEST['post_id'];
            echo $_REQUEST['data']["key"][$key];
            echo $_REQUEST['data']["value"][$key] ;
        
            delete_post_meta($_REQUEST['post_id'], "product_gallery_".$_REQUEST['data']["key"][$key],$_REQUEST['data']["value"][$key] );
        }

    }

    

    // If you wanted to also use the function for non-logged in users (in a theme for example)
    // add_action( 'wp_ajax_nopriv_example_ajax_request', 'example_ajax_request' );

    public function add_meta_box() {

        $screens = array( 'product');

        foreach ( $screens as $screen ) {

            add_meta_box(
                $this->name,
                'Product Gallery',
                array( $this, 'display_product_gallery' ),
                $screen,
                'side'
            );

        }

    }
    public function enqueue_styles() {

        wp_enqueue_style(
            $this->name,
            plugin_dir_url( __FILE__ ) . 'css/product-gallery-image.css',
            array()
        );

    }
   
    public function enqueue_scripts() {

        wp_enqueue_media();
        
        wp_enqueue_script(
            'blImageCenter',
            plugin_dir_url( __FILE__ ) . 'js/jquery.blImageCenter.js',
            array( 'jquery' ),
            '1',$this->version,
            'all'
        );

        wp_enqueue_script(
            $this->name,
            plugin_dir_url( __FILE__ ) . 'js/product-gallery-image.js',
            array( 'jquery' ),
            $this->version,
            'all'
        );
        
       
        
    }
   
    

   
    public function display_product_gallery( $post ) {
        include_once( dirname( __FILE__ ) . '/product-gallery-image.php' );
    }
    
    public function save_post( $post_id ) {
        //var_dump($_REQUEST);
        if(isset($_REQUEST['product_gallery_src'])){
        
            foreach($_REQUEST['product_gallery_src'] as $key => $value){

                add_post_meta($post_id, 'product_gallery_src', $_REQUEST['product_gallery_src'][$key]);
                add_post_meta($post_id, 'product_gallery_alt', $_REQUEST['product_gallery_alt'][$key]);
                add_post_meta($post_id, 'product_gallery_title', $_REQUEST['product_gallery_title'][$key]);
            }
            
        }    
        
        

    }

}