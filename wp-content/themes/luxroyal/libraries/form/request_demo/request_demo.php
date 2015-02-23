<?php


class request_demo{
    
    private $version;
    
    private $name;

    public function __construct() {

        $this->name = 'request_demo';
        
        $this->version = '1.0';
        
    }
    
    public function run(){
        
        
        add_action('admin_menu', array($this,'add_admin_menu'));
        
    
    }
    
    //====================Admin Menu=============================================//
    function add_admin_menu()
    {
        add_menu_page(
            __("Request Demo", $this->name), 
            __("Request Demo", $this->name), 
            'activate_plugins', 
            'request_demos', 
            array($this,'add_page'),
            "dashicons-media-document",
            7
        );
        add_submenu_page(
            'request_demos', 
            __("All Request Demo", $this->name), 
            __("All Request Demo", $this->name), 
            'activate_plugins',
            'request_demos', 
            array($this,'add_page')
        );
        add_submenu_page(
            'request_demos', 
            __('Add new', $this->name), 
            __('Add new', $this->name), 
            'activate_plugins', 
            'add_form_request_demo', 
            array($this,'add_form_request_demo')
        );
    }

    
    
    public function install(){
        
        global $wpdb;
        
        $table_name = $wpdb->prefix . $this->name;

        $sql = "CREATE TABLE " . $table_name . " (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  fullname tinytext NOT NULL,
                  email VARCHAR(100) NOT NULL,
                  phone VARCHAR(100) NOT NULL,
                  address text NOT NULL,
                  province text NOT NULL,
                  district text NOT NULL,
                  place text NOT NULL,
                  post_code text NOT NULL,
                  category_id int(11) NOT NULL,
                  product_id int(11) NOT NULL,
                  series_id int(11) NOT NULL,
                  created_at DATETIME NOT NULL,
                  PRIMARY KEY  (id)
                );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        
        dbDelta($sql);

        add_option($this->name.'_version', $this->version);

        $installed_ver = get_option('request_demo_version');
        
        if ($installed_ver != $this->version) {

            $sql = "CREATE TABLE " . $this->name . " (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  fullname tinytext NOT NULL,
                  email VARCHAR(100) NOT NULL,
                  phone VARCHAR(100) NOT NULL,
                  address text NOT NULL,
                  province text NOT NULL,
                  district text NOT NULL,
                  place text NOT NULL,
                  post_code text NOT NULL,
                  category_id int(11) NOT NULL,
                  product_id int(11) NOT NULL,
                  series_id int(11) NOT NULL,
                  created_at DATETIME NOT NULL,
                  PRIMARY KEY  (id)
                );";
            
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            
            dbDelta($sql);

            // notice that we are updating option, rather than adding it
            update_option('request_demo_version', $this->version);
        }

    }
    
    public function install_data()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . $this->name;

        $wpdb->insert($table_name, array(
            'fullname' => 'sample data',
            'email' => 'example@example.com',
            'phone' => '0826343698',
            'address' => 'is address'
        ));

    }
    
    
    

    function add_page()
    {
        require_once( dirname( __FILE__ ) . '/../core/custom_table.php' );
        global $wpdb;

        $config = array(
            "post_type" =>  $this->name,
            "column" =>  array(
                'fullname' => __('Name',  $this->name),
                'phone' => __('Phone',  $this->name),
                'email' => __('E-Mail',  $this->name),
                'created_at' => __('Created at',  $this->name),
            )
        );

        $table = new Custom_table($config);

        $table->prepare_items();

        $message = '';
        if ('delete' === $table->current_action()) {
            $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items deleted: %d', $this->name), count($_REQUEST['id'])) . '</p></div>';
        }
        return include_once( dirname( __FILE__ ) . '/index_page.php' );
    }

    function add_form_request_demo()
    {
        global $wpdb;
        $table_name = $wpdb->prefix .  $this->name; // do not forget about tables prefix

        $message = '';
        $notice = '';


        $default = array(
            'id' => 0,
            'fullname' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'province' => '',
            'district' => '',
            'place' => '',
            'post_code' => '',
            'category_id' => null,
            'product_id' => null,
            'series_id' => null,
            'created_at' => date("Y-m-d H:i:s")
        );
        //echo $_REQUEST['nonce'];
        //var_dump(wp_verify_nonce(@$_REQUEST['nonce'], basename(__FILE__)));
        if (isset($_REQUEST['nonce']) && wp_verify_nonce($_REQUEST['nonce'],  $this->name)) {

            $item = shortcode_atts($default, $_REQUEST);


            $item_valid = $this->validate($item);
            if ($item_valid === true) {
                if ($item['id'] == 0) {
                    $result = $wpdb->insert($table_name, $item);
                    $item['id'] = $wpdb->insert_id;
                    if (!$result) {
                        $notice = __('There was an error while saving item',  $this->name);
                    } else {
                        $message = __('Item was successfully saved', $this->name);
                    }
                } else {
                    $result = $wpdb->update($table_name, $item, array('id' => $item['id']));
                    if ($result === FALSE ) {
                        $notice = __('There was an error while updating item', $this->name);
                    } else {
                        $message = __('Item was successfully updated',  $this->name);

                    }
                }
            } else {

                $notice = $item_valid;
            }
        }
        else {

            $item = $default;
            if (isset($_REQUEST['id'])) {
                $item = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $_REQUEST['id']), ARRAY_A);
                if (!$item) {
                    $item = $default;
                    $notice = __('Item not found',  $this->name);
                }
            }
        }

        // here we adding our custom meta box
        add_meta_box('form_meta_box', 'Form data', array($this,'form_meta_box'), 'add_form', 'normal', 'default');

        return include_once( dirname( __FILE__ ) . '/form_page.php' );

    }
    function form_meta_box($item)
    {
        return include_once( dirname( __FILE__ ) . '/form_meta.php' );

    }

    function validate($item){
        $messages = array();


        if (empty($item['fullname'])) 
            $messages[] = __('Name is required', 'request_demo');

        if (empty($item['phone'])) 
            $messages[] = __('Phone is required', 'request_demo');

        /*if (!empty($item['category'])) 
        $messages[] = __('Category is required', 'request_demo');

    if (!empty($item['product'])) 
        $messages[] = __('Product is required', 'request_demo');

    if (!empty($item['series'])) 
        $messages[] = __('Series is required', 'request_demo');*/


        if (empty($messages)) return true;
        return implode('<br />', $messages);
    }
}

