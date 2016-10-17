<?php
namespace Hotmembers3;
include_once( 'helpers/hotmembers-connect-user-helper.php' );
class HotmembersConnectHotmart {
  /** Request Handler
  * This uses the $POST values to handle hotmart POST connection
  */
  public static function act($post) {
    $opts = array(
      // 'hottok' => $post['hottok'],
      // 'transaction' => $post['transaction'],
      'status' => $post['status'],
      'email' => $post['email'],
      'first_name' => $post['first_name'],
      'last_name' => $post['last_name'],
      'prod' => $post['prod']
    );

    $search_opts = array(
      'prod' => $opts['prod']
      // 'hottok' => $hottok
    );

    $memberships = Membership_Area::where($search_opts);
    if(count($memberships) == 0) {
      echo "<br>no membership area found for specification";
      return;
    }

    $opts = $post;
    foreach ($memberships as $membership) {
      $opts['role_slug'] = $membership->slug;
      echo "<br>Membership_Area name: $membership->name";
      if (self::is_status_to_add($opts['status'])) {
        $user_helper = new HotmembersConnectUserHelper($opts);
        $user_helper->add_wp_user();
      }
      elseif(self::is_status_to_remove($opts['status'])) {
        echo "<br>status is to remove";
        $user_helper = new HotmembersConnectUserHelper($opts);
        $user_helper->delete_wp_user();
      }
    }
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
