<?php
class Restricted_Content_Controller {

  public static function perform_on_post() {
    if (isset($_POST['method'])) {
      if ($_POST['method'] == 'add') {
        self::populate($_POST);
      }
    }
  }

  public static function populate($post) {
    Restricted_Content::clear_table();
    self::add($post);
  }

  public static function content_data() {
    return Content_Retriever::perform();
  }

  public static function membership_areas() {
    return Membership_Areas_Controller::index();
  }

  public static function index() {
    return Restricted_Content::formated_data();
  }

  public static function add($post) {
    var_dump($post);
    if(isset($post['restricted'])) {
      $restricted_posts = $post['restricted'];
      foreach ($restricted_posts as $post_id) {
        if(isset($post["$post_id"])) {
          foreach ($post["$post_id"] as $membership_area_id) {
            $obj = (object) array(
              'post_id' => $post_id,
              'days_to_release' => 0,
              'membership_area_id' => $membership_area_id
            );
            $restricted_content = new Restricted_Content_Model(
              0,
              $post_id,
              0,
              $membership_area_id
            );
            Restricted_Content::add($restricted_content);
            echo $membership_area_id;
          }
        }
      }
    }
  }

}
