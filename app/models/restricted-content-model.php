<?php
class Restricted_Content {
  var $id;
  var $post_id;
  var $membership_area_id;

  function __construct($id, $post_id, $membership_area_id) {
    $this->id = $id;
    $this->post_id = $post_id;
    $this->membership_area_id = $membership_area_id;
  }

  public static function with_object($obj) {
    return new self(
      $obj->id,
      $obj->post_id,
      $obj->membership_area_id
    );
  }

  public function get_id(){
    return $this->id;
  }

  public function get_id() {
    return $this->id;

  }
  public function get_post_id() {
    return $this->post_id;

  }
  public function get_membership_area_id() {
    return $this->membership_area_id;
  }

  public function set_id($id) {
    $this->id = $id
  }

  public function set_id($post_id) {
    $this->post_id = $post_id
  }

  public function set_id($membership_area_id) {
    $this->membership_area_id = $membership_area_id
  }
}

?>
