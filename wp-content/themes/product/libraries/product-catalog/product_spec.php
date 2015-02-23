<?php

class Product_spec {

	private $name;

   
    private $version;

   
    public function __construct() {

        $this->name = 'product-spec';
        $this->version = '1.0';

    }

    public function run() {
        add_action( 'wp_ajax_del_spec', array($this,'del_spec') );
    	add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
    	add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
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
    public function enqueue_scripts() {

        wp_enqueue_media();
        
       

        wp_enqueue_script(
            $this->name,
            plugin_dir_url( __FILE__ ) . 'js/product-spec.js',
            array( 'jquery' ),
            $this->version,
            'all'
        );
        
       
        
    }
    public function add_meta_box() {

        $screens = array( 'product');

        foreach ( $screens as $screen ) {

            add_meta_box(
                $this->name,
                'Product Spec',
                array( $this, 'display_product_spec' ),
                $screen
            );

        }

    }
    public function display_product_spec( $post ) {
        include_once( dirname( __FILE__ ) . '/product-spec-view.php' );
    }
    public function save_post( $post_id ) {
        
        if(isset($_REQUEST['field'])){

            delete_post_meta_by_key( 'spec' );
        
            foreach($_REQUEST['field'] as $key => $value){

                $val_spec['field'] = $_REQUEST['field'][$key];
                $val_spec['value'] = $_REQUEST['value'][$key];
                $data_spec = serialize($val_spec);
                add_post_meta($post_id, 'spec' , $data_spec);
                

            }
            
        }  
    }
}