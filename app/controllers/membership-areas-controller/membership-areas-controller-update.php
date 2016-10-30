<?php
namespace Hotmembers3;
class Membership_Area_Controller_Update {

  public static function perform($post) {
    if(self::params_ok($post)) {
      $membership = Membership_Area::find($post['id']);
      $membership->set_name($post['name']);
      $membership->set_prod($post['prod']);
      $membership->set_token($post['token']);
      $membership->set_periodicity_value($post['periodicity_value']);
      Membership_Area::update($membership);
      Roles_Handler::update_wp_role($membership->slug, $post['name']);
      return array( 'success' => self::get_success_messages($post) );
    }
    else {
      return array( 'error' => self::get_error_messages($post) );
    }
  }

  public static function params_ok($post) {
    if( isset($post['name']) &&
          isset($post['prod']) &&
          isset($post['id']) &&
          isset($post['token']) &&
          isset($post['periodicity_value']) &&
          $post['name'] != null &&
          $post['prod'] != null &&
          $post['id'] != null &&
          $post['token'] != null &&
          is_numeric($post['periodicity_value'])
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
    $messages[] = "A área de membros $name foi alterada com sucesso";
    return $messages;
  }

}
?>
