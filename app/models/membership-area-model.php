<?php
class Membership_Area_Model {
  var $id;
  var $name;
  var $prod;
  var $offer;

  function __construct($id, $name, $prod, $offer) {
    $this->id = $id;
    $this->name = $name;
    $this->prod = $prod;
    $this->offer = $offer;
  }

  public function get_id(){
    return $this->id;
  }

  public function get_name(){
    return $this->name;
  }

  public function get_prod(){
    return $this->prod;
  }

  public function get_offer(){
    return $this->offer;
  }

  public function set_id($id) {
    $this->id = $id;
  }

  public function set_name($name) {
    $this->name = $name;
  }

  public function set_prod($prod) {
    $this->prod = $prod;
  }

  public function set_offer($offer) {
    $this->offer = $offer;
  }
}

?>
