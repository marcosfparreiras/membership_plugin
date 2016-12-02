<?php
namespace Hotmembers3;
class Roles_Handler {
  const ROLE_PREFIX = 'hm3_role_';

  public static function create_wp_role($role_name, $role_slug = '') {
    global $wp_roles;
    if( $role_slug == '') {
      $role_slug = self::new_role_slug();
    }
    $role = add_role(
      $role_slug,
      $role_name,
      array( 'read' => true, 'level_0' => true )
    );
    return $role;
  }

  public static function remove_wp_role( $role_slug ) {
    global $wp_roles;
    return remove_role( $role_slug );
  }

  public static function update_wp_role( $role_slug, $role_name ) {
    global $wp_roles;
    self::remove_wp_role( $role_slug );
    return self::create_wp_role($role_name, $role_slug);
  }

  public static function new_role_slug() {
    return self::ROLE_PREFIX . time();
  }

  public static function get_wp_roles() {
    $roles = get_editable_roles();
    $formatted_roles = [];
    foreach($roles as $slug => $role) {
      $formatted_roles[$slug] = $role['name'];
    }
    return $formatted_roles;
  }

  public static function get_hm_roles() {
    global $wp_roles;
    $roles = Membership_Area::get_all_roles();
    $formatted_roles = [];
    foreach($roles as $role) {
      $wp_role_name = $wp_roles->roles[$role]['name'];;
      $formatted_roles[$role] = $wp_role_name;
    }
    return $formatted_roles;
  }
}
