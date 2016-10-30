<?php
namespace Hotmembers3;
class Success_Admin_Notice {
  public static function display($message) {
    Admin_Notice::display('notice-success', $message);
  }
}
