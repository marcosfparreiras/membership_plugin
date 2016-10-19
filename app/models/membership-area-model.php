<?php
namespace Hotmembers3;
class Membership_Area_Model {
  var $id;
  var $name;
  var $prod;
  var $offer;

  function __construct($id, $name, $slug, $prod, $token, $periodicity_value,
                       $periodicity_magnitude,  $offer = '') {
    $this->id = $id;
    $this->name = $name;
    $this->slug = $slug;
    $this->prod = $prod;
    $this->token = $token;
    $this->periodicity_value = $periodicity_value;
    $this->periodicity_magnitude = $periodicity_magnitude;
    $this->offer = $offer;
  }

  public static function with_object($obj) {
    return new self(
      $obj->id,
      $obj->name,
      $obj->slug,
      $obj->prod,
      $obj->token,
      $obj->periodicity_value,
      $obj->periodicity_magnitude,
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

  public function get_token() {
    return $this->token;
  }

  public function get_periodicity_value() {
    return $this->periodicity_value;
  }

  public function get_periodicity_magnitude() {
    return $this->periodicity_magnitude;
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

  public function set_token($token) {
    $this->token = $token;
  }

  public function set_periodicity_value($periodicity_value) {
    $this->periodicity_value = $periodicity_value;
  }

  public function set_periodicity_magnitude($periodicity_magnitude) {
    $this->periodicity_magnitude = $periodicity_magnitude;
  }
}
