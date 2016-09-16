<?php
class Hotmembers3 {
  const DIR_PATH = WP_PLUGIN_DIR . '/hotmembers3/app';
  const URL_PATH = WP_PLUGIN_URL . '/hotmembers3/app';
  const PLUGIN_FILE = WP_PLUGIN_DIR . '/hotmembers3/hotmembers3.php';

  function __construct($path) {
    $this->path = $path;
    $this->add_menus();
    self::create_tables();
  }

  public function add_menus() {
    include self::DIR_PATH . '/controllers/admin-menus-controller.php';
    add_action( 'admin_menu', array( 'Admin_Menus_Controller', 'create_menus') );
  }

  public static function create_tables() {
    include_once self::DIR_PATH . '/models/membership-area.php';
    Membership_Area.create_table();
    register_activation_hook( PLUGIN_FILE, array( 'Membership_Area', 'create_table' ) );
  }

  public function get_path() {
    return $this->path;
  }

}

?>
