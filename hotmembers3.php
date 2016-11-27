<?php
namespace Hotmembers3;

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
include( HOTMEMBERS3_MODELS_PATH . '/restricted-content.php');
include( HOTMEMBERS3_MODELS_PATH . '/user.php');

# include controllers
include( HOTMEMBERS3_CONTROLLERS_PATH . '/membership-areas-controller.php');
include( HOTMEMBERS3_CONTROLLERS_PATH . '/membership-areas-controller/membership-areas-controller-add.php');
include( HOTMEMBERS3_CONTROLLERS_PATH . '/membership-areas-controller/membership-areas-controller-delete.php');
include( HOTMEMBERS3_CONTROLLERS_PATH . '/membership-areas-controller/membership-areas-controller-update.php');
include( HOTMEMBERS3_CONTROLLERS_PATH . '/restricted-content-controller.php');
include( HOTMEMBERS3_CONTROLLERS_PATH . '/import-users-controller.php');

# include libs
include( HOTMEMBERS3_LIB_PATH . '/admin-pages-creator.php');
include( HOTMEMBERS3_LIB_PATH . '/assets-manager.php');
include( HOTMEMBERS3_LIB_PATH . '/content-retriever.php');
include( HOTMEMBERS3_LIB_PATH . '/roles-handler.php');
include( HOTMEMBERS3_LIB_PATH . '/content-access-manager.php');
include( HOTMEMBERS3_LIB_PATH . '/handlers/hotmembers-connect.php');
include( HOTMEMBERS3_LIB_PATH . '/admin-notices/admin-notices-handler.php');
include( HOTMEMBERS3_LIB_PATH . '/csv-users-importer.php');
include( HOTMEMBERS3_LIB_PATH . '/wordpress-user.php');

# include plugin class
include_once HOTMEMBERS3_DIR_PATH . '/app/class-hotmembers3.php';
new Hotmembers3();
new HotmembersConnect();
register_activation_hook( __FILE__, array( 'Hotmembers3\HotmembersConnect', 'flush_new_endpoint' ) );
register_activation_hook( __FILE__, array( 'Hotmembers3\Hotmembers3', 'on_activate' ) );
