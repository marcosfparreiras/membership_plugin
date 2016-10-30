<?php
namespace Hotmembers3;
class Error_Admin_Notice {
  public static function display($message) {
    Admin_Notice::display('notice-error', $message);
  }
}
