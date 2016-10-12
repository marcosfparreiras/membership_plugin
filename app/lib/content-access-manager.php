<?php
class Content_Access_Manager {

  public static function test() {
    echo '<br><br>';
    // echo self::current_post_id();

    if ( self::is_current_content_blocked() ) {
      echo 'Blck';
    }
    else {
      echo 'Free';
    }
  }

  public static function perform() {

  }



  public static function is_current_content_blocked() {
    $restricted_content = Restricted_Content::get_all();
    $ids = array_map(array(self::class, 'get_post_id'), $restricted_content);
    var_dump ($ids);
    echo '<br>';
    $current_id = self::current_post_id();
    echo $current_id;
    if(in_array($current_id, $ids)) {
      return true;
    }
    else {
      return false;
    }
  }

  private static function current_post_id() {
    if (is_singular()) {
      return get_post()->ID;
    }
    else {
      return -1;
    }
  }

  private static function get_post_id($n) {
    return $n->post_id;
  }

  public static function user_can_access_current_content() {

  }

  public static function logged_user_roles() {

  }

  public static function current_page_roles_access() {

  }
}
?>
