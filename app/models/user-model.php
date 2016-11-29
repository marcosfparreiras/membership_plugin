<?php
namespace Hotmembers3;
class User_Model {
  var $email;
  var $transaction;
  var $membership_area_id;
  var $start_date;

  function __construct($email, $transaction, $membership_area_id, $start_date) {
    $this->email = $email;
    $this->transaction = $transaction;
    $this->membership_area_id = $membership_area_id;
    $this->start_date = $start_date;
  }

  public static function with_object($obj) {
    return new self(
      $obj->name,
      $obj->transaction,
      $obj->membership_area_id,
      $obj->start_date
    );
  }

  public function get_email(){
    return $this->email;
  }

  public function get_transaction(){
    return $this->transaction;
  }

  public function get_membership_area_id(){
    return $this->membership_area_id;
  }

  public function get_start_date(){
    return $this->start_date;
  }

  public function set_email($email) {
    $this->email = $email;
  }

  public function set_transaction($transaction) {
    $this->transaction = $transaction;
  }

  public function set_membership_area_id($membership_area_id) {
    $this->membership_area_id = $membership_area_id;
  }

  public function set_start_date($start_date) {
    $this->start_date = $start_date;
  }
}
