<?php
class Hotmembers3 {
  function __construct() {
    $this->add_menus();
    $this->add_assets();
  }

  // Add plugin menu pages
  public function add_menus() {
    add_action( 'admin_menu', array( 'Admin_Menus_Controller', 'create_menus') );
  }

  public function add_assets() {
    add_action( 'admin_enqueue_scripts', array('Assets_Manager', 'add_assets') );
  }

  // Method used on register_activation_hook
  public static function on_activate() {
    self::create_tables();
  }

  // Create tables on database
  public static function create_tables() {
    Membership_Area::create_table();
  }
}

?>
