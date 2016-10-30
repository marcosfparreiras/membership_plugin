<?php
namespace Hotmembers3;
class Warning_Admin_Notice {
  public static function display($message) {
    Admin_Notice::display('notice-warning', $message);
  }
}
