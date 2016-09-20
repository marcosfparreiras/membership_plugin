<?php
class Content_Retriever {

  public static function perform() {
    $post_types = self::get_post_types_names();
    $all_posts = [];
    foreach($post_types as $post_type) {
      echo '<br><br>';
      echo $post_type;
      echo '<br>';
      $post_type_data = self::get_posts_data($post_type);
      var_dump($post_type_data);

    }

  }

  public static function get_post_types_names() {
    $post_types = get_post_types();
    return $post_types;
    // return array_keys($post_types);
  }

  public static function get_posts_data($post_type) {
    $args=array(
      'post_type' => $post_type,
    );
    return get_posts( $args );
  }







  // public static function formatted_posts_data($full_posts_data) {
  //   $formatted_posts = [];
  //   foreach($full_posts_data as $full_post_data) {
  //     $formatted_post = [];
  //     $formatted_post['id'] = $full_post_data->ID;
  //     $formatted_post['post_title'] = $full_post_data->post_title;
  //     $formatted_post['url'] = $full_post_data->guid;
  //     $formatted_posts << $formatted_post;
  //   }
  //   return $formatted_posts;
  // }

}
?>
