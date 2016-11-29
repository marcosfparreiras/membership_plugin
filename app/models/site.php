<?php
namespace Hotmembers3;
require_once __DIR__ . '/site-model.php';

class Site {
  const TABLE_NAME_SUFIX = 'hm3_sites';

  public static function table_name() {
    global $wpdb;
    return $wpdb->prefix . self::TABLE_NAME_SUFIX;
  }

  public static function create_table() {
    $table_name = self::table_name();
    $sql = "CREATE TABLE $table_name (
      id INT NOT NULL,
      serial varchar(20) NOT NULL,
      start_date date  DEFAULT NULL,
      duration_magnitude int  DEFAULT NULL,
      duration_type varchar(5) DEFAULT NULL,
      PRIMARY KEY  (id)
    );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
  }

  public static function add($site) {
    global $wpdb;
    $table = self::table_name();
    $data = array(
      'id' => $site->get_id(),
      'serial' => $site->get_serial(),
      'start_date' => $site->get_start_date(),
      'duration_magnitude' => $site->get_duration_magnitude(),
      'duration_type' => $site->get_duration_type()
    );
    $format = array(
      '%d',
      '%s',
      '%s',
      '%d',
      '%s'
    );
    $wpdb->insert( $table, $data, $format );
  }

  public static function update($site) {
    global $wpdb;
    $table = self::table_name();
    $data = array(
      'serial' => $site->get_serial(),
      'start_date' => $site->get_start_date(),
      'duration_magnitude' => $site->get_duration_magnitude(),
      'duration_type' => $site->get_duration_type()
    );
    $where = array(
      'id' => $site->get_id()
    );
    $format = array(
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
      return new Site_Model(
        $data->id,
        $data->serial,
        $data->start_date,
        $data->duration_magnitude,
        $data->duration_type
      );
    }
  }

  public static function delete($site) {
    global $wpdb;
    $table = self::table_name();
    $where = array(
      'id' => $site->id
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
}
