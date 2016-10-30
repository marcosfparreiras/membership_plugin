<?php
namespace Hotmembers3;
class Admin_Pages_Creator {

  public static function create_pages() {
    $icon = 'http://orig03.deviantart.net/ac5a/f/2012/104/9/4/94c812fcbd992e914150123e21cb5d5a-d4w3rqa.png';

    // Define plugin sidebar menu
    add_menu_page( 'Hotmembers 3.0', 'Hotmembers 3.0', 'manage_options', 'hm3_main_menu', array(self::class, 'main_menu'), $icon, 98 );
    add_submenu_page( 'hm3_main_menu', 'Áreas de Membros', 'Áreas de Membros', 'manage_options', 'hm3_main_menu', array(self::class, 'membership_areas_index') );
    add_submenu_page( 'hm3_main_menu', 'Conteúdo Restrito', 'Conteúdo Restrito', 'manage_options', 'hm3_restricted_content', array(self::class, 'restricted_content') );
    add_submenu_page( 'hm3_main_menu', 'Importar Usuários', 'Importar Usuários', 'manage_options', 'hm3_import_users', array(self::class, 'import_users') );
    add_submenu_page( 'hm3_main_menu', 'Configurações', 'Configurações', 'manage_options', 'hm3_settings', array(self::class, 'settings') );
    add_submenu_page( 'hm3_main_menu', 'Ajuda', 'Ajuda', 'manage_options', 'hm3_help', array(self::class, 'help') );

    add_submenu_page( 'hm3_main_menu', 'Testes', 'Testes', 'manage_options', 'hm3_tets', array(self::class, 'test') );

    // Define plugin pages withou menus
    add_submenu_page( '', 'Adicionar Área de Membros', 'Adicionar Área de Membros', 'manage_options', 'hm3_membership_areas_add', array(self::class, 'membership_areas_add') );
    add_submenu_page( '', 'Editar Área de Membros', 'Editar Área de Membros', 'manage_options', 'hm3_membership_areas_update', array(self::class, 'membership_areas_update') );
    add_submenu_page( '', 'Excluir Área de Membros', 'Excluir Área de Membros', 'manage_options', 'hm3_membership_areas_delete', array(self::class, 'membership_areas_delete') );
  }

  public static function test() {
    include(HOTMEMBERS3_VIEWS_PATH  . "/test.php");
  }

  public static function main_menu() {
  }

  public static function membership_areas_index() {
    include(HOTMEMBERS3_VIEWS_PATH  . "/membership-areas/index.php");
  }

  public static function settings() {
    include(HOTMEMBERS3_VIEWS_PATH  . "/settings.php");
  }

  public static function restricted_content() {
    include(HOTMEMBERS3_VIEWS_PATH  . "/restricted-content.php");
  }

  public static function import_users() {
    include(HOTMEMBERS3_VIEWS_PATH  . "/import-users.php");
  }

  public static function help() {
    include(HOTMEMBERS3_VIEWS_PATH  . "/help.php");
  }

  public static function membership_areas_add() {
    include(HOTMEMBERS3_VIEWS_PATH  . "/membership-areas/add.php");
  }

  public static function membership_areas_update() {
    include(HOTMEMBERS3_VIEWS_PATH  . "/membership-areas/update.php");
  }

  public static function membership_areas_delete() {
    include(HOTMEMBERS3_VIEWS_PATH  . "/membership-areas/delete.php");
  }
}
