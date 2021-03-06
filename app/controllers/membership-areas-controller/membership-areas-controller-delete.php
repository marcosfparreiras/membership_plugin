<?php
namespace Hotmembers3;
class Membership_Area_Controller_Delete {

  public static function perform($post) {
    if(self::params_ok($post)) {
      $membership = Membership_Area::find($post['id']);
      Restricted_Content::delete_by_fk($membership);
      User::delete_by_fk($membership);
      Membership_Area::delete($membership);
      $slug = $membership->get_slug();
      Roles_Handler::remove_wp_role($slug);
      return array( 'success' => self::get_success_messages($post) );
    }
    else {
      return array( 'error' => self::get_error_messages($post) );
    }
  }

  public static function params_ok($post) {
    if( isset($post['id']) &&
        isset($post['name']) &&
          $post['id'] != null
    ) {
      return true;
    }
    else {
      return false;
    }
  }

  public static function get_success_messages($post) {
    $messages = [];
    $name = $post['name'];
    $messages[] = "A área de membros $name foi deletada com sucesso";
    return $messages;
  }

  public static function get_error_messages($post) {
    $messages = [];
    $id = $post['id'];
    $messages[] = "A área de membros de id $id não existe";
    return $messages;
  }
}
?>
