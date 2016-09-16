<?php
class Hotmembers3 {
  const DIR_PATH = WP_PLUGIN_DIR . '/hotmembers3/app';
  const URL_PATH = WP_PLUGIN_URL . '/hotmembers3/app';
  const PLUGIN_FILE = WP_PLUGIN_DIR . '/hotmembers3/hotmembers3.php';

  function __construct() {
    $this->add_menus();
  }

  // Add plugin menu pages
  public function add_menus() {
    include self::DIR_PATH . '/controllers/admin-menus-controller.php';
    add_action( 'admin_menu', array( 'Admin_Menus_Controller', 'create_menus') );
  }

  // Method used on register_activation_hook
  public static function on_activate() {
    self::create_tables();
  }

  // Create tables on database
  public static function create_tables() {
    self::include_models();
    Membership_Area::create_table();
  }

  public static function include_models() {
    include self::DIR_PATH . '/models/membership-area.php';

  }
}

?>
