<?php
namespace Hotmembers3;
class Site_Model {
  var $id;
  var $serial;
  var $start_date;
  var $duration_magnitude;
  var $duration_type;

  function __construct($id, $serial, $start_date, $duration_magnitude,
                       $duration_type) {
    $this->id = $id;
    $this->serial = $serial;
    $this->start_date = $start_date;
    $this->duration_magnitude = $duration_magnitude;
    $this->duration_type = $duration_type;
  }

  public static function with_object($obj) {
    return new self(
      $obj->id,
      $obj->serial,
      $obj->start_date,
      $obj->duration_magnitude,
      $obj->duration_type
    );
  }

  public function get_id(){
    return $this->id;
  }

  public function get_serial(){
    return $this->serial;
  }

  public function get_start_date(){
    return $this->start_date;
  }

  public function get_duration_magnitude(){
    return $this->duration_magnitude;
  }

  public function get_duration_type(){
    return $this->duration_type;
  }

  public function set_id($id) {
    $this->id = $id;
  }

  public function set_serial($serial) {
    $this->serial = $serial;
  }

  public function set_start_date($start_date) {
    $this->start_date = $start_date;
  }

  public function set_duration_magnitude($duration_magnitude) {
    $this->duration_magnitude = $duration_magnitude;
  }

  public function set_duration_type($duration_type) {
    $this->duration_type = $duration_type;
  }
}
