<?php
class Membership_Area {
  const TABLE_NAME_SUFIX = 'membership_areas';

  public static function create_table() {
    $table_name = self::table_name();
    $sql = "CREATE TABLE $table_name (
      id INT NOT NULL AUTO_INCREMENT,
      name varchar(55) NOT NULL,
      prod INT NOT NULL,
      offer INT NOT NULL,
      PRIMARY KEY  (id)
    );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
  }

  public static function table_name() {
    global $wpdb;
    return $wpdb->prefix . self::TABLE_NAME_SUFIX;
  }

  public function find($id) {
    $table_name = self::table_name();
    $sql = "SELECT * FROM $table_name WHERE id = $id";
    return $wpdb->get_row($sql);
  }

  public static function test() {
    return 'kk';
  }
}


?>
