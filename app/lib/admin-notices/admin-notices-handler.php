<?php
namespace Hotmembers3;
require_once __DIR__ . '/admin-notice.php';
require_once __DIR__ . '/error-admin-notice.php';
require_once __DIR__ . '/warning-admin-notice.php';
require_once __DIR__ . '/success-admin-notice.php';
require_once __DIR__ . '/info-admin-notice.php';
class Admin_Notices_Handler {
  public $notices;
  function __construct($notices) {
    $this->notices = $notices;
  }

  public function display() {
    $this->display_success_messages();
    $this->display_error_messages();
    $this->display_warning_messages();
  }

  private function display_success_messages() {
    if(isset($this->notices['success'])) {
      foreach($this->notices['success'] as $message) {
        Success_Admin_Notice::display($message);
      }
    }
  }

  private function display_error_messages() {
    if(isset($this->notices['error'])) {
      foreach($this->notices['error'] as $message) {
        Error_Admin_Notice::display($message);
      }
    }
  }

  private function display_warning_messages() {
    if(isset($this->notices['warning'])) {
      foreach($this->notices['warning'] as $message) {
        Warning_Admin_Notice::display($message);
      }
    }
  }
}
