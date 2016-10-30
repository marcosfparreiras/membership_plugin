<?php
namespace Hotmembers3;
require_once __DIR__ . '/admin-notice.php';
require_once __DIR__ . '/error-admin-notice.php';
require_once __DIR__ . '/warning-admin-notice.php';
require_once __DIR__ . '/success-admin-notice.php';
require_once __DIR__ . '/info-admin-notice.php';
class Admin_Notices_Handler {

  public static function display() {
    Warning_Admin_Notice::display('Warning Message');
    Error_Admin_Notice::display('Error Message');
    Success_Admin_Notice::display('Success Message');
    Info_Admin_Notice::display('Info Message');
  }

  private static function display_error_messages() {

  }

  private static function display_warning_messages() {

  }

  private static function display_success_messages() {

  }
}
