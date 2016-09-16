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

  public static function find($id) {
    global $wpdb;
    $table_name = self::table_name();
    $sql = "SELECT * FROM $table_name WHERE id = $id";
    $data = $wpdb->get_row($sql);
    if($data == null) {
      return null;
    }
    else {
      return new Membership_Area_Model(
        $data->id,
        $data->name,
        $data->prod,
        $data->offer
      );
    }
  }

  public static function add($membership_area) {
    global $wpdb;
    $table = self::table_name();
    $data = array(
      'name' => $membership_area->get_name(),
      'prod' => $membership_area->get_prod(),
      'offer' => $membership_area->get_offer()
    );
    $format = array(
      '%s',
      '%d',
      '%s',
    );
    $wpdb->insert( $table, $data, $format );
  }

  public static function test() {
    return 'kk';
  }
}


?>
