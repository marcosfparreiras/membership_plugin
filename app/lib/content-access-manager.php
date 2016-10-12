<?php
class Content_Access_Manager {

  public static function test() {
    echo '<br><br>';

    if ( self::is_current_content_blocked() ) {
      echo 'Blck';
    }
    else {
      echo 'Free';
    }
    self::current_page_roles_access();
    echo '<br>';
    if (self::user_can_access_current_content())
      echo 'LIBERADO';
    else
      echo 'BLOQUEADO';
  }

  public static function perform() {

  }

  private static function is_current_content_blocked() {
    $restricted_content = Restricted_Content::get_all();
    $ids = array_map(array(self::class, 'get_post_id'), $restricted_content);
    $current_id = self::current_post_id();
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
    $user_roles = wp_get_current_user()->roles;
    $allowed_roles = self::current_page_roles_access();

    $user_allowed_roles = array_intersect($user_roles, $allowed_roles);
    if (current_user_can('administrator') || count($user_allowed_roles) > 0) {
      return true;
    }
    else {
      return false;
    }
  }

  public static function current_page_roles_access() {
    $post_id = self::current_post_id();
    $post_id_entries = Restricted_Content::find_by_post_id($post_id);
    $allowed_slugs = array_map(array(self::class, 'get_membership_slug'), $post_id_entries);
    return $allowed_slugs;
  }

  private static function get_membership_slug($restricted_content) {
    $membership_area_id = $restricted_content->membership_area_id;
    $membership_area = Membership_Area::find($membership_area_id);
    return $membership_area->slug;
  }
}
?>
