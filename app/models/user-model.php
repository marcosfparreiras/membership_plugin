<?php
namespace Hotmembers3;
class User_Model {
  var $id;
  var $email;
  var $transaction;
  var $start_date;

  function __construct($id, $email, $transaction, $start_date) {
    $this->id = $id;
    $this->email = $email;
    $this->transaction = $transaction;
    $this->start_date = $start_date;
  }

  public static function with_object($obj) {
    return new self(
      $obj->id,
      $obj->name,
      $obj->transaction,
      $obj->start_date
    );
  }

  public function get_id(){
    return $this->id;
  }

  public function get_email(){
    return $this->email;
  }

  public function get_transaction(){
    return $this->transaction;
  }

  public function get_start_date(){
    return $this->start_date;
  }

  public function set_email($email) {
    $this->email = $email;
  }

  public function set_name($name) {
    $this->name = $name;
  }

  public function set_transaction($transaction) {
    $this->transaction = $transaction;
  }

  public function set_start_date($start_date) {
    $this->start_date = $start_date;
  }
}
