<?php
class Hotmembers3 {
  const PATH = ABSPATH . 'wp-content/plugins/hotmembers3';

  function __construct($path) {
    $this->path = $path;
    $this->add_menus();
  }

  public function add_menus() {
    include $this->path . '/controllers/admin-menus-controller.php';
    add_action( 'admin_menu', array( 'Admin_Menus_Controller', 'create_menus') );
  }

  public function get_path() {
    return $this->path;
  }

}

?>
