<?php
class Content_Retriever {

  public static function perform() {
    $post_types = self::get_post_types_names();
    $all_posts = [];
    foreach($post_types as $post_type) {
      $posts_data = self::get_posts_data($post_type);
      foreach ($posts_data as $post_data) {
        $formatted_posts_data = self::format_posts_data($post_data);
        $all_posts[] = $formatted_posts_data;
      }
    }
    return $all_posts;
  }

  public static function get_post_types_names() {
    $post_types = get_post_types();
    return $post_types;
    // return array_keys($post_types);
  }

  public static function get_posts_data($post_type) {
    $args=array(
      'post_type' => $post_type,
      'posts_per_page'   => 999
    );
    return get_posts( $args );
  }

  public static function format_posts_data($post_data) {
    $formatted_post = [];
    $formatted_post['id'] = $post_data->ID;
    $formatted_post['post_title'] = $post_data->post_title;
    $formatted_post['post_type'] = $post_data->post_type;
    $formatted_post['url'] = $post_data->guid;
    return $formatted_post;
  }
}
?>
