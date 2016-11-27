<?php
namespace Hotmembers3;
class Wordpress_User {

  public function create_wp_user($user_email, $first_name, $last_name, $user_pass) {
    $userdata = array(
      'user_login' => $user_email,
      'user_email' => $user_email,
      'first_name' => $first_name,
      'last_name' => $last_name,
      'user_pass' => $user_pass
    );
    wp_insert_user( $userdata ) ;
  }


  // public function add_wp_user() {
  //   echo "<br>status is to add";
  //   $user = get_user_by('email', $this->email);
  //   if ($user) {
  //     echo "<br>user exists on create";
  //     self::add_role_to_existing_user();
  //   }
  //   else {
  //     echo "<br>user does not exist";
  //     self::add_role_to_new_user();
  //   }

  // }

  // public function delete_wp_user() {
  //   $user = get_user_by('email', $this->email);
  //   if ($user) {
  //     $this->user->remove_role($this->role_slug);
  //   }
  // }

  // private function add_role_to_existing_user() {
  //   $user = $this->user;
  //   $user->add_role($this->role_slug);
  // }

  // private function add_role_to_new_user() {
  //   $pass = wp_generate_password(8, false);
  //   $userdata = array(
  //     'user_pass' =>  $pass,
  //     'user_login' => $this->email,
  //     'user_email' => $this->email,
  //     'first_name' => $this->first_name,
  //     'last_name'  => $this->last_name,
  //     'role' => $this->role_slug
  //   );
  //   wp_insert_user($userdata);
  // }
}
