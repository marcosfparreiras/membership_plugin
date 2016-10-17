<?php
namespace Hotmembers3;
class HotmembersConnectUserHelper {

  public function __construct($opts) {
    // $this->hottok = $post['hottok'];
    $this->status = $opts['status'];
    $this->email = $opts['email'];
    $this->first_name = $opts['first_name'];
    $this->last_name = $opts['last_name'];
    $this->prod = $opts['prod'];
    $this->role_slug = $opts['role_slug'];
    $this->user = get_user_by('email', $this->email );
  }

  public function add_wp_user() {
    echo "<br>status is to add";
    $user = get_user_by('email', $this->email);
    if ($user) {
      echo "<br>user exists on create";
      self::add_role_to_existing_user();
    }
    else {
      echo "<br>user does not exist";
      self::add_role_to_new_user();
    }

  }

  public function delete_wp_user() {
    $this->user->remove_role($this->role_slug);
  }

  private function add_role_to_existing_user() {
    $user = $this->user;
    $user->add_role($this->role_slug);
  }

  private function add_role_to_new_user() {
    $pass = wp_generate_password(8, false);
    $userdata = array(
      'user_pass' =>  $pass,
      'user_login' => $this->email,
      'user_email' => $this->email,
      'first_name' => $this->first_name,
      'last_name'  => $this->last_name,
      'role' => $this->role_slug
    );
    wp_insert_user($userdata);
  }
}
?>
