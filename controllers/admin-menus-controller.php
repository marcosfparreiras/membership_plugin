<?php

class Admin_Menus_Controller {

  public static function create_menus() {
    // add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', array(this, 'my_plugin_options') );
    $icon = 'http://orig03.deviantart.net/ac5a/f/2012/104/9/4/94c812fcbd992e914150123e21cb5d5a-d4w3rqa.png';
    add_menu_page( 'Hotmembers 3.0', 'Hotmembers 3.0', 'manage_options', 'hm3_main_menu', array('Admin_Menus_Controller', 'my_plugin_options'), $icon, 98 );
  }

  public static function my_plugin_options() {
    // echo '<h1>OLA</h1>';
    include plugin_dir_path( __FILE__ ) . '/../views/member-areas.php';
  }
}

?>
