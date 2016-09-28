<?php
require_once __DIR__ . '/restricted-content-model.php';

class Restricted_Content {
  const TABLE_NAME_SUFIX = 'hm3_resticted_content';

  public static function table_name() {
    global $wpdb;
    return $wpdb->prefix . self::TABLE_NAME_SUFIX;
  }

  public static function create_table() {
    $table_name = self::table_name();
    $membership_area_table = Membership_Area::table_name();
    $sql = "CREATE TABLE $table_name (
      id INT NOT NULL AUTO_INCREMENT,
      post_id INT NOT NULL,
      days_to_release INT NOT NULL,
      membership_area_id INT NOT NULL,
      PRIMARY KEY  (id),
      FOREIGN KEY (membership_area_id) REFERENCES $membership_area_table (id)
    );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
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
