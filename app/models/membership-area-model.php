<?php
namespace Hotmembers3;
class Membership_Area_Model {
  var $id;
  var $name;
  var $prod;
  var $offer;

  function __construct($id, $name, $slug, $prod, $offer = '') {
    $this->id = $id;
    $this->name = $name;
    $this->slug = $slug;
    $this->prod = $prod;
    $this->offer = $offer;
  }

  public static function with_object($obj) {
    return new self(
      $obj->id,
      $obj->name,
      $obj->slug,
      $obj->prod,
      $obj->offer
    );
  }

  public function get_id(){
    return $this->id;
  }

  public function get_name(){
    return $this->name;
  }

  public function get_slug(){
    return $this->slug;
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

  public function set_slug($slug) {
    $this->slug = $slug;
  }

  public function set_prod($prod) {
    $this->prod = $prod;
  }

  public function set_offer($offer) {
    $this->offer = $offer;
  }
}
?>
