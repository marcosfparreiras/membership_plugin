<?php
class Content_Retriever {

  public static function perform() {
    $post_types = get_post_types();
    return self::post_types_ids($post_types);
  }

  public static function get_posts_data($post_types) {
    $types = [];
    foreach($post_types as $type) {
      $types[$type] = self::get_post_ids_by_type($type);
    }
    return $types;
  }

  public static function get_post_data($post_id) {
    $post = get_post($post_id);
    $post_data = [];
    $post_data['id'] = $post->ID;
    $post_data['post_title'] = $post->post_title;
    $post_data['url'] = $post->guid;
    return $post_data;
  }

  public static function get_post_ids_by_type($type) {
    $args = array(
      'post_type'       => $type,
      'posts_per_page'  => 999,
      'offset'          => 0
    );
    $post_ids = get_posts(array(
      $args,
      'fields' => 'ids', // Only get post IDs
    ));
    return $post_ids;
  }


}

?>
