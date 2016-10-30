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
      return array( 'success' => self::get_success_messages($post) );
    }
    else {
      return array( 'error' => self::get_error_messages($post) );
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
    }
    if($post['prod'] == null) {
      $messages[] = "O campo Produto não pode ficar vazio.";
    }
    if($post['token'] == null) {
      $messages[] = "O campo Token não pode ficar vazio.";
    }
    if($post['periodicity_value'] == null) {
      $messages[] = "O campo Periodicidade não pode ficar vazio.";
    }
    else {
      if(!is_numeric($post['periodicity_value'])) {
        $messages[] = "O campo Periodicidade deve ser um número.";
      }
      elseif($post['periodicity_value'] < 0) {
        $messages[] = "O campo Periodicidade deve ser positivo.";
      }
    }
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
