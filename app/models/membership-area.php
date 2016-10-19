<?php
namespace Hotmembers3;
require_once __DIR__ . '/membership-area-model.php';

class Membership_Area {
  const TABLE_NAME_SUFIX = 'hm3_membership_areas';

  public static function table_name() {
    global $wpdb;
    return $wpdb->prefix . self::TABLE_NAME_SUFIX;
  }

  public static function create_table() {
    $table_name = self::table_name();
    $sql = "CREATE TABLE $table_name (
      id INT NOT NULL AUTO_INCREMENT,
      name varchar(55) NOT NULL,
      prod varchar(15) NOT NULL,
      offer varchar(30) DEFAULT NULL,
      slug varchar(30) DEFAULT NULL,
      token varchar(50),
      periodicity_value INT DEFAULT 0,
      periodicity_magnitude varchar(10) DEFAULT NULL,
      PRIMARY KEY  (id)
    );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
  }

  public static function add($membership_area) {
    global $wpdb;
    $table = self::table_name();
    $data = array(
      'name' => $membership_area->get_name(),
      'prod' => $membership_area->get_prod(),
      'offer' => $membership_area->get_offer(),
      'slug' => $membership_area->get_slug(),
      'token' => $membership_area->get_token(),
      'periodicity_value' => $membership_area->get_periodicity_value(),
      'periodicity_magnitude' => $membership_area->get_periodicity_magnitude()
    );
    $format = array(
      '%s',
      '%s',
      '%s',
      '%s',
      '%s',
      '%d',
      '%s'
    );
    $wpdb->insert( $table, $data, $format );
  }

  public static function update($membership_area) {
    global $wpdb;
    $table = self::table_name();
    $data = array(
      'name' => $membership_area->get_name(),
      'prod' => $membership_area->get_prod(),
      'offer' => $membership_area->get_offer(),
      'slug' => $membership_area->get_slug(),
      'token' => $membership_area->get_token(),
      'periodicity_value' => $membership_area->get_periodicity_value(),
      'periodicity_magnitude' => $membership_area->get_periodicity_magnitude()
    );
    $where = array(
      'id' => $membership_area->get_id()
    );
    $format = array(
      '%s',
      '%s',
      '%s',
      '%s',
      '%s',
      '%d',
      '%s'
    );
    $wpdb->update( $table, $data, $where, $format );
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
        $data->slug,
        $data->prod,
        $data->token,
        $data->periodicity_value,
        $data->periodicity_magnitude,
        $data->offer
      );
    }
  }

  public static function delete($membership_area) {
    global $wpdb;
    $table = self::table_name();
    $where = array(
      'id' => $membership_area->id
    );
    $format = array(
      '%d',
    );
    $wpdb->delete( $table, $where, $format );
  }

  public static function where($opts) {
    global $wpdb;
    $table_name = self::table_name();
    $fields = "1";
    foreach($opts as $key => $value) {
      $fields .= " AND $key = $value";
    }
    $sql = "SELECT * from $table_name WHERE $fields;";
    return $wpdb->get_results($sql);
  }

  public static function find_by_prod($prod_id) {
    $opts = array(
      'prod' => 111
    );
    return self::where($opts);
  }
}
