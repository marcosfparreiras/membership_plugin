<?php
class Membership_Area_Controller_Delete {

  public static function perform($post) {
    if(self::params_ok($post)) {
      $membership = Membership_Area::find($post['id']);
      Membership_Area::delete($membership);
      var_dump(self::get_success_messages($post));
    }
    else {
      var_dump(self::get_error_messages($post));
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
    $messages[] = "A área de membros de id $id não foi existe";
    return $messages;
  }
}
?>
