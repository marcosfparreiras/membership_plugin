<?php
require_once __DIR__ . '/restricted-content-model.php';

class Membership_Area {
  const TABLE_NAME_SUFIX = 'resticted_content';

  public static function table_name() {
    global $wpdb;
    return $wpdb->prefix . self::TABLE_NAME_SUFIX;
  }

  public static function create_table() {
  }

  public static function add($restricted_content) {
  }

  public static function update($restricted_content) {
  }

  public static function find($id) {
  }

  public static function delete($restricted_content) {
  }


}

?>
