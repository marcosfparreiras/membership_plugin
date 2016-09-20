<?php
class Content_Retriever {

  public static function perform() {
    $post_types = self::get_post_types_names();
    $posts_data = self::get_posts_data($post_types);
    return $posts_data;
  }

  public static function get_post_types_names() {
    $post_types = get_post_types();
    return array_keys($post_types);
  }

  public static function get_posts_data($post_types) {
    $post_data = [];
    foreach($post_types as $post_type) {
      $full_posts_data = self::get_posts_data_by_type($post_type);
    }
  }

  public static function get_posts_data_by_type($post_type) {
    $args=array(
      'post_type' => $post_type,
    );
    return get_posts( $args );
  }

  public static function formatted_posts_data($full_posts_data) {
    $formatted_posts = [];
    foreach($full_posts_data as $full_post_data) {
      $formatted_post = [];
      $formatted_post['id'] = $full_post_data->ID;
      $formatted_post['post_title'] = $full_post_data->post_title;
      $formatted_post['post_title'] = $full_post_data->post_title;
      $formatted_post['url'] = $full_post_data->guid;
      $formatted_posts << $formatted_post;
    }
    return $formatted_posts;
  }

}
?>
