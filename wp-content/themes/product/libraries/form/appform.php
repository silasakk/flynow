<?
function enqueue_styles() {

    wp_enqueue_style(
        "admin-form",
        get_template_directory() . '/libraries/form/css/admin-form.css',
        array()
    );

}

function enqueue_scripts() {

    wp_enqueue_media();
    
    wp_enqueue_script(
        'angular',
        get_template_directory() . '/libraries/form/js/angular.min.js',
        array(),
        '1',
        'all'
    );

    wp_enqueue_script(
        'admin-form',
        get_template_directory() . '/libraries/form/js/admin-form.js',
        array( 'jquery' )
    );
    

}

add_action( 'admin_enqueue_scripts', 'enqueue_styles' );
add_action( 'admin_enqueue_scripts', 'enqueue_scripts' );


//====================SERVICE=============================================//

require_once( get_template_directory() . '/libraries/form/core/service.php' );

function run_service() {

    $plugin = new Service();
    
    $plugin->run();

}

run_service();

//====================Request Demo=============================================//



require_once(get_template_directory() . '/libraries/form/request_demo/request_demo.php' );

function run_request_demo() {

    $plugin = new Request_demo();
    
    $plugin->run();
    
    register_activation_hook(__FILE__, array($plugin,'install'));
    
    register_activation_hook(__FILE__, array($plugin,'install_data'));

}

run_request_demo();

//====================Request Service=============================================//



require_once( get_template_directory(). '/libraries/form/request_service/request_service.php' );

function run_request_service() {

    $plugin = new Request_service();

    $plugin->run();

    register_activation_hook(__FILE__, array($plugin,'install'));

    register_activation_hook(__FILE__, array($plugin,'install_data'));

}

run_request_service();






