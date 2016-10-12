<?php
class Hotmembers3 {
  function __construct() {
    $this->add_menus();
    $this->add_assets();
    $this->add_header();
    $this->filter_content();
  }

  // Add plugin menu pages
  public function add_menus() {
    add_action( 'admin_menu', array( 'Admin_Pages_Creator', 'create_pages') );
  }

  public function add_assets() {
    add_action( 'admin_enqueue_scripts', array('Assets_Manager', 'add_assets') );
  }

  public function add_header() {
    // add_action('wp_head', array('Content_Access_Manager', 'test') );
  }

  public function filter_content() {
    add_filter( 'the_content', array('Content_Access_Manager', 'filter_content') );
  }

  // Method used on register_activation_hook
  public static function on_activate() {
    self::create_tables();
  }

  // Create tables on database
  public static function create_tables() {
    Membership_Area::create_table();
    Restricted_Content::create_table();
  }
}

?>
