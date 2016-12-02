<?php
namespace Hotmembers3;
class Import_Users_Controller {

  public static function perform_on_post() {
    $notices = [];
    if( isset($_POST['method'])) {
      switch ($_POST['method']) {
        case 'csv':
          echo 'CSV';
          $notices = Import_Users_Controller_CSV::perform($_POST);
          break;

        case 'role':
          $notices = Import_Users_Controller_Role::perform($_POST);
          break;

        default:
          break;
      }
    }
    $admin_notices_handler = new Admin_Notices_Handler($notices);
    $admin_notices_handler->display();
  }

  public static function wp_roles() {
    return Roles_Handler::get_wp_roles();
  }

  public static function hm_roles() {
    return Roles_Handler::get_hm_roles();
  }
}
