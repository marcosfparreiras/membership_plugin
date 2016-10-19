<?php
namespace Hotmembers3;
class Membership_Area_Controller_Add {

  public static function perform($post) {
    if(self::params_ok($post)) {
      $role = Roles_Handler::create_wp_role($post['name']);
      $membership = new Membership_Area_Model(
        null,
        $post['name'],
        $role->name,
        $post['prod'],
        $post['token'],
        $post['periodicity_value']
      );
      Membership_Area::add($membership);
      var_dump(self::get_success_messages($post));
    }
    else {
      var_dump(self::get_error_messages($post));
    }
  }

  public static function params_ok($post) {
    if( isset($post['name']) &&
          isset($post['prod']) &&
          $post['name'] != null &&
          $post['prod'] != null &&
          $post['periodicity_value'] != NULL
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
    if($post['periodicity_value'] == null) {
      $messages[] = "O campo Periodicidade não pode ficar vazio.";
    };
    return $messages;
  }

  public static function get_success_messages($post) {
    $messages = [];
    $name = $post['name'];
    $messages[] = "A área de membros $name foi adicionada com sucesso";
    return $messages;
  }

}
?>
