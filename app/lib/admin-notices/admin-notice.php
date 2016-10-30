<?php
namespace Hotmembers3;
class Admin_Notice {
  public static function display($class, $message) {
    echo "<div class='notice $class is-dismissible'>";
    echo "<p>$message</p>";
    echo "</div>";
  }
}
