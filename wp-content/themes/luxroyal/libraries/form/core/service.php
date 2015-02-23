<?php
class Service {
    
 
    public function run() {

        add_action( 'wp_ajax_get_product', array($this,'get_product') );
        add_action( 'wp_ajax_get_series', array($this,'get_series') );
        add_action( 'wp_ajax_get_cat', array($this,'get_cat') );
        add_action( 'wp_ajax_get_province', array($this,'get_province') );
        add_action( 'wp_ajax_get_district', array($this,'get_district') );
        add_action( 'wp_ajax_get_place', array($this,'get_place') );

    }
    
    /*
    get province
    */
    public function get_province(){
        
        global $wpdb;
        
        $sql = "select * from provinces order by PROVINCE_NAME";
        
        $result = $wpdb->get_results($sql);
        
        foreach($result as $value){
            
            $json[] = array("id" => $value->PROVINCE_ID , "name" => $value->PROVINCE_NAME);
            
        }
        
        echo json_encode($json);die;  
        
    }
    
    /*
    get district
    */
    public function get_district(){
        
        global $wpdb;
        
        $sql = "select *
                from amphures
                where PROVINCE_ID = '".$_REQUEST['province']."'
                order by AMPHUR_NAME";
        
        $result = $wpdb->get_results($sql);
        
        foreach($result as $value){
            
            $json[] = array("id" => $value->AMPHUR_ID , "name" => $value->AMPHUR_NAME);
            
        }
        echo json_encode($json);die;    
        
    }
    
    /*
    get place
    */
    public function get_place(){
        
        global $wpdb;
        
        $sql = "select 
                    districts.*,
                    zipcodes.zipcode
                from districts
                left join zipcodes on districts.DISTRICT_CODE = zipcodes.district_code
                where 
                    PROVINCE_ID = '".$_REQUEST['province']."' 
                    and AMPHUR_ID = '".$_REQUEST['district']."'
                order by DISTRICT_NAME";
        
    
        $result = $wpdb->get_results($sql);
        
        foreach($result as $value){
            
            $json[] = array(
                "id" => $value->DISTRICT_ID ,
                "name" => $value->DISTRICT_NAME ,
                "post_code" => $value->zipcode
            );
        }
        
        echo json_encode($json);die;    
        
    }
    
    /*
    get product
    */
    public function get_product(){

        $categories = get_categories( 'taxonomy=product_category&hide_empty=0&parent='.$_REQUEST['category_id']);

        echo json_encode($categories);die;
        
    }

    /*
    get cat
    */
    function get_cat(){

        $categories = get_categories('taxonomy=product_category&hide_empty=0&parent=0');

        echo json_encode($categories);die;
        
    }

    /*
    get series
    */
    public function get_series()
    {

        $args = array(
            "post_type" => "product",
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_category',
                    'field'    => 'term_id',
                    'terms'    => $_REQUEST['product_id'],
                ),
            ),
        );

        $the_query = new WP_Query( $args );

        while ( $the_query->have_posts() ) : $the_query->the_post();
        
        $json[] = array("term_id" => get_the_ID() , "name" => get_the_title());

        endwhile;

        echo json_encode($json);die;
        
    }

}