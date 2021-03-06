<?php
namespace Hotmembers3;
require_once __DIR__ . '/user-model.php';

class User {
  const TABLE_NAME_SUFIX = 'hm3_users';

  public static function table_name() {
    global $wpdb;
    return $wpdb->prefix . self::TABLE_NAME_SUFIX;
  }

  public static function create_table() {
    $table_name = self::table_name();
    $membership_area_table = Membership_Area::table_name();
    $sql = "CREATE TABLE $table_name (
      email varchar(70) NOT NULL,
      membership_area_id int DEFAULT NULL,
      transaction varchar(40) NOT NULL,
      start_date date DEFAULT NULL,
      FOREIGN KEY (membership_area_id) REFERENCES $membership_area_table (id),
      PRIMARY KEY (email, membership_area_id)
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
      'membership_area_id' => $user->get_membership_area_id(),
      'start_date' => $user->get_start_date()
    );
    $format = array(
      '%s',
      '%s',
      '%d',
      '%s'
    );
    $wpdb->replace( $table, $data, $format );
  }

  public static function update($user) {
    global $wpdb;
    $table = self::table_name();
    $data = array(
      'email' => $user->get_email(),
      'transaction' => $user->get_transaction(),
      'membership_area_id' => $user->get_membership_area_id(),
      'start_date' => $user->get_start_date()
    );
    $where = array(
      'email' => $user->get_email()
    );
    $format = array(
      '%s',
      '%s',
      '%d',
      '%s'
    );
    $wpdb->update( $table, $data, $where, $format );
  }

  public static function find($email) {
    global $wpdb;
    $table_name = self::table_name();
    $sql = "SELECT * FROM $table_name WHERE email = '$email'";
    $data = $wpdb->get_row($sql);
    if($data == null) {
      return null;
    }
    else {
      return new User_Model(
        $data->email,
        $data->transaction,
        $data->membership_area_id,
        $data->start_date
      );
    }
  }

  public static function delete($user) {
    global $wpdb;
    $table = self::table_name();
    $where = array(
      'email' => $user->email
    );
    $format = array(
      '%s',
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

  public static function delete_by_fk($membership_area) {
    global $wpdb;
    $table = self::table_name();
    $where = array(
      'membership_area_id' => $membership_area->get_id()
    );
    $format = array(
      '%d',
    );
    $wpdb->delete( $table, $where, $format );
  }
}
