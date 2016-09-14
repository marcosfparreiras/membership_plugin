<?php
class Member_Area {
  const TABLE_NAME = 'members_areas';

  public static function create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . self::TABLE_NAME;

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
    return self::TABLE_NAME;
  }


}


?>
