<?php
class Restricted_Content_Controller {

  public static function index() {
    $args = array(
      'posts_per_page'   => 5,
      'offset'           => 0
    );
    $post_ids = get_posts(array(
      $args, //Your arguments
      'posts_per_page'=> -1,
      'fields'        => 'ids', // Only get post IDs
    ));
    return $post_ids;
  }

  public static function post_type_content() {
    $post_types = get_post_types();
  }


}
