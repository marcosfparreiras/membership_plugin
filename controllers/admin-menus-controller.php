<?php

class Admin_Menus_Controller {

  public static function create_menus() {
    $icon = 'http://orig03.deviantart.net/ac5a/f/2012/104/9/4/94c812fcbd992e914150123e21cb5d5a-d4w3rqa.png';
    add_menu_page( 'Hotmembers 3.0', 'Hotmembers 3.0', 'manage_options', 'hm3_main_menu', array('Admin_Menus_Controller', 'main_menu'), $icon, 98 );
    add_submenu_page( 'hm3_main_menu', 'Áreas de Membros', 'Áreas de Membros', 'manage_options', 'hm3_main_menu', array('Admin_Menus_Controller', 'members_areas') );
    add_submenu_page( 'hm3_main_menu', 'Configurações', 'Configurações', 'manage_options', 'hm3_settings', array('Admin_Menus_Controller', 'settings') );
    add_submenu_page( 'hm3_main_menu', 'Ajuda', 'Ajuda', 'manage_options', 'hm3_help', array('Admin_Menus_Controller', 'help') );
  }

  public static function main_menu() {
  }

  public static function members_areas() {
    $dir = dirname(dirname(__FILE__));
    include($dir  . "/views/member-areas.php");
  }

  public static function settings() {
    $dir = dirname(dirname(__FILE__));
    include($dir  . "/views/settings.php");
  }

  public static function help() {
    $dir = dirname(dirname(__FILE__));
    include($dir  . "/views/help.php");
  }
}

?>
