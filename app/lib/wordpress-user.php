<?php
namespace Hotmembers3;
class Wordpress_User {

  public function __construct($user_email, $first_name, $last_name) {
    $this->user_email = $user_email;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
  }

  public function add($role_slug) {
    $user = self::get_or_create_user();
    $user->add_role($role_slug);
  }

  public function remove($role_slug) {
    $user = get_user_by('email', $this->user_email);
    if ($user) {
      $user->remove_role($role_slug);
    }
  }

  private function get_or_create_user() {
    $user = get_user_by('email', $this->user_email);
    if ($user) {
      return $user;
    }
    else {
      $user_id = self::create_wp_user();
      return new \WP_USER($user_id);
    }
  }

  private function create_wp_user() {
    $userdata = array(
      'user_login' => $this->user_email,
      'user_email' => $this->user_email,
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'user_pass' => wp_generate_password(8, false)
    );
    $user_id = wp_insert_user($userdata);
    return new WP_USER($user_id);
  }
}
