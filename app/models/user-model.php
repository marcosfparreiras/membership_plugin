<?php
namespace Hotmembers3;
class User_Model {
  var $email;
  var $transaction;
  var $role;
  var $start_date;

  function __construct($email, $transaction, $role, $start_date) {
    $this->email = $email;
    $this->transaction = $transaction;
    $this->role = $role;
    $this->start_date = $start_date;
  }

  public static function with_object($obj) {
    return new self(
      $obj->name,
      $obj->transaction,
      $obj->role,
      $obj->start_date
    );
  }

  public function get_email(){
    return $this->email;
  }

  public function get_transaction(){
    return $this->transaction;
  }

  public function get_role(){
    return $this->role;
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

  public function set_role($role) {
    $this->role = $role;
  }

  public function set_start_date($start_date) {
    $this->start_date = $start_date;
  }
}
