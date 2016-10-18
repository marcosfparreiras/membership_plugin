<?php
namespace Hotmembers3;
class HotmembersConnectHotmart {
  /** Request Handler
  * This uses the $POST values to handle hotmart POST connection
  */
  public static function act($post) {
    $opts = self::get_opts_from_post($post);
    $memberships = self::get_memberships($opts);
    if(count($memberships) == 0) {
      return "No membership area found for specification";
    }

    foreach ($memberships as $membership) {
      self::handle_opts_for_membership($opts, $membership);
    }
  }

  private static function handle_opts_for_membership($opts, $membership) {
    $opts['role_slug'] = $membership->slug;
    $user_helper = new HotmembersConnectUserHelper($opts);
    if (self::is_status_to_add($opts['status'])) {
      $user_helper->add_wp_user();
      return 'User added';
    }
    elseif(self::is_status_to_remove($opts['status'])) {
      $user_helper->delete_wp_user();
      return 'User deleted';
    }
  }

  private static function get_opts_from_post($post) {
    $opts = array(
      // 'transaction' => $post['transaction'],
      'hottok' => $post['hottok'],
      'status' => $post['status'],
      'email' => $post['email'],
      'first_name' => $post['first_name'],
      'last_name' => $post['last_name'],
      'prod' => $post['prod']
    );
    return $opts;
  }

  private static function get_memberships($opts) {
    $search_opts = array(
      'prod' => $opts['prod']
      // 'hottok' => $opts['hottok']
    );
    return Membership_Area::where($search_opts);
  }

  private static function is_status_to_add($status) {
    $status_to_add = ['approved', 'completed'];
    return in_array($status, $status_to_add);
  }

  private static function is_status_to_remove($status) {
    $status_to_remove = ['blocked', 'refunded', 'canceled'];
    return in_array($status, $status_to_remove);
  }
}
