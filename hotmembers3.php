<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
Plugin Name: Hotmembers 3.0
URI: http://hotmembers.com.br/
Description: [HOTMEMBERS 3.0] Crie sua área de membros de uma forma prática, eficiente e 100% integrada com o Hotmart
Author: Marcos Parreiras
Author URI: http://hotmembers.com.br/
Version: 0.0.0
*/

define( 'HOTMEMBERS3_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'HOTMEMBERS3_URL_PATH', plugins_url('', __FILE__) );

define( 'HOTMEMBERS3_ASSETS_URL', HOTMEMBERS3_URL_PATH . '/app/assets' );

define( 'HOTMEMBERS3_MODELS_PATH', HOTMEMBERS3_DIR_PATH . 'app/models' );
define( 'HOTMEMBERS3_VIEWS_PATH', HOTMEMBERS3_DIR_PATH . 'app/views' );
define( 'HOTMEMBERS3_CONTROLLERS_PATH', HOTMEMBERS3_DIR_PATH . 'app/controllers' );
define( 'HOTMEMBERS3_LIB_PATH', HOTMEMBERS3_DIR_PATH . 'app/lib' );
define( 'HOTMEMBERS3_ASSETS_PATH', HOTMEMBERS3_DIR_PATH . 'app/assets' );

# include models
include( HOTMEMBERS3_MODELS_PATH . '/membership-area.php');
# include controllers
include( HOTMEMBERS3_CONTROLLERS_PATH . '/admin-menus-controller.php');
include( HOTMEMBERS3_CONTROLLERS_PATH . '/membership-areas-controller.php');
include( HOTMEMBERS3_CONTROLLERS_PATH . '/restricted-content-controller.php');
# include libs
include( HOTMEMBERS3_LIB_PATH . '/membership-areas-controller-add.php');
include( HOTMEMBERS3_LIB_PATH . '/membership-areas-controller-delete.php');
include( HOTMEMBERS3_LIB_PATH . '/membership-areas-controller-update.php');
include( HOTMEMBERS3_LIB_PATH . '/content-retriever.php');

include_once HOTMEMBERS3_DIR_PATH . '/app/class-hotmembers3.php';
new Hotmembers3();

register_activation_hook( __FILE__, array( 'Hotmembers3', 'on_activate' ) );

// function test_adding_scripts() {
//   wp_register_script('ex_script', HOTMEMBERS3_ASSETS_URL . '/javascripts/ex.js', array('jquery'),'1.1', true);
//   wp_enqueue_script('ex_script');

//   wp_register_style('test_css', HOTMEMBERS3_ASSETS_URL . '/stylesheets/test.css');
//   wp_enqueue_style('test_css');
// }
// add_action( 'wp_enqueue_scripts', 'test_adding_scripts' );


add_action( 'admin_enqueue_scripts', 'hm3_enqueue_scripts' );
function hm3_enqueue_scripts(){
  wp_enqueue_script(
    'hm2-licence-script-script',
    HOTMEMBERS3_ASSETS_URL . '/javascripts/ex.js'
    // array('jquery')
  );

  // wp_enqueue_script( 'hm2-jq', HM2_URL . '/includes/js/hm2-jquery.js' );
  // wp_enqueue_script( 'hm2-licence-script-script', HM2_URL . '/includes/js/hm2-licence-script.js', array( 'hm2-jq' ) );
  }



?>
