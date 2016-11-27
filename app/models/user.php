<?php
namespace Hotmembers3;
require_once __DIR__ . '/user-model.php';

class User {
  const TABLE_NAME_SUFIX = 'hm3_membership_users';

  public static function table_name() {
    global $wpdb;
    return $wpdb->prefix . self::TABLE_NAME_SUFIX;
  }

  public static function create_table() {
    $table_name = self::table_name();
    $sql = "CREATE TABLE $table_name (
      id INT NOT NULL AUTO_INCREMENT,
      email varchar(70) NOT NULL,
      transaction varchar(40) NOT NULL,
      start_date date DEFAULT NULL,
      PRIMARY KEY  (id)
    );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
  }

  public static function add($user) {
    global $wpdb;
    $table = self::table_name();
    $data = array(
      'email' => $user->get_email(),
      'transaction' => $user->get_transaction(),
      'start_date' => $user->get_start_date()
    );
    $format = array(
      '%s',
      '%s',
      '%s'
    );
    $wpdb->insert( $table, $data, $format );
  }

  public static function update($user) {
    global $wpdb;
    $table = self::table_name();
    $data = array(
      'email' => $user->get_email(),
      'transaction' => $user->get_transaction(),
      'start_date' => $user->get_start_date()
    );
    $where = array(
      'id' => $user->get_id()
    );
    $format = array(
      '%s',
      '%s',
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
      return new User_Model(
        $data->id,
        $data->email,
        $data->transaction,
        $data->start_date
      );
    }
  }

  public static function delete($user) {
    global $wpdb;
    $table = self::table_name();
    $where = array(
      'id' => $user->id
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
