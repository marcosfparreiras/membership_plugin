<?php
class Hotmembers3 {
  const DIR_PATH = WP_PLUGIN_DIR . '/hotmembers3/app';
  const URL_PATH = WP_PLUGIN_URL . '/hotmembers3/app';
  const PLUGIN_FILE = WP_PLUGIN_DIR . '/hotmembers3/hotmembers3.php';

  function __construct() {
    $this->add_menus();
  }

  public function add_menus() {
    include self::DIR_PATH . '/controllers/admin-menus-controller.php';
    add_action( 'admin_menu', array( 'Admin_Menus_Controller', 'create_menus') );
  }

  public static function on_activate() {
    self::create_tables();
  }

  public static function create_tables() {
    include self::DIR_PATH . '/models/membership-area.php';
    Membership_Area::create_table();
  }
}

?>
