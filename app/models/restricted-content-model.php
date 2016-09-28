<?php
class Restricted_Content_Model {
  var $id;
  var $post_id;
  var $days_to_release;
  var $membership_area_id;

  function __construct($id, $post_id, $days_to_release, $membership_area_id) {
    $this->id = $id;
    $this->post_id = $post_id;
    $this->days_to_release = $days_to_release;
    $this->membership_area_id = $membership_area_id;
  }

  public static function with_object($obj) {
    return new self(
      $obj->id,
      $obj->post_id,
      $obj->days_to_release,
      $obj->membership_area_id
    );
  }

  public function get_id(){
    return $this->id;
  }

  public function get_post_id() {
    return $this->post_id;

  }

  public function get_days_to_release() {
    return $this->days_to_release;
  }

  public function get_membership_area_id() {
    return $this->membership_area_id;
  }

  public function set_id($id) {
    $this->id = $id;
  }

  public function set_post_id($post_id) {
    $this->post_id = $post_id;
  }

  public function set_days_to_release($days_to_release) {
    $this->days_to_release = $days_to_release;
  }

  public function set_membership_area_id($membership_area_id) {
    $this->membership_area_id = $membership_area_id;
  }
}

?>
