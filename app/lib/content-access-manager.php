<?php
namespace Hotmembers3;
class Content_Access_Manager {

  public static function filter_content($content) {
    $post_id = $GLOBALS['post']->ID;
    if (self::user_can_access_content($post_id)) {
      return $content;
    }
    else {
      $content = '<b>Conteúdo Restrito</b><br>';
      $content .= 'Você não tem acesso a esse conteúdo.';
      return $content;
    }
  }

  public static function user_can_access_content($post_id) {
    if (!self::is_content_blocked($post_id)) {
      return true;
    }
    $user_roles = wp_get_current_user()->roles;
    $allowed_roles = self::post_roles_access($post_id);

    $user_allowed_roles = array_intersect($user_roles, $allowed_roles);
    if (current_user_can('administrator') || count($user_allowed_roles) > 0) {
      return true;
    }
    else {
      return false;
    }
  }

  private static function is_content_blocked($post_id) {
    $restricted_content = Restricted_Content::get_all();
    $ids = array_map(array(self::class, 'get_post_id'), $restricted_content);
    if(in_array($post_id, $ids)) {
      return true;
    }
    else {
      return false;
    }
  }

  private static function get_post_id($n) {
    return $n->post_id;
  }

  public static function post_roles_access($post_id) {
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
