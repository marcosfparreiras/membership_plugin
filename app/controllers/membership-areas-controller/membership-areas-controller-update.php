<?php
class Membership_Area_Controller_Update {

  public static function perform($post) {
    if(self::params_ok($post)) {
      $membership = Membership_Area::find($post['id']);
      $membership->set_name($post['name']);
      $membership->set_prod($post['prod']);
      Membership_Area::update($membership);
      var_dump(self::get_success_messages($post));
    }
    else {
      var_dump(self::get_error_messages($post));
    }
  }

  public static function params_ok($post) {
    if( isset($post['name']) &&
          isset($post['prod']) &&
          isset($post['id']) &&
          $post['name'] != null &&
          $post['prod'] != null &&
          $post['id'] != null
    ) {
      return true;
    }
    else {
      return false;
    }
  }

  public static function get_error_messages($post) {
    $messages = [];
    if($post['name'] == null) {
      $messages[] = "O campo Nome não pode ficar vazio.";
    };
    if($post['prod'] == null) {
      $messages[] = "O campo Produto não pode ficar vazio.";
    };
    return $messages;
  }

  public static function get_success_messages($post) {
    $messages = [];
    $name = $post['name'];
    $messages[] = "A área de membros $name foi alterada com sucesso";
    return $messages;
  }

}
?>
