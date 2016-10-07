<?php
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

}
?>