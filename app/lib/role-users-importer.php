<?php
namespace Hotmembers3;
class Role_Users_Importer {

  function __construct($from_role, $to_role) {
    $this->from_role = $from_role;
    $this->to_role = $to_role;
  }

  public function perform() {
    // Add user to wp role
    // Add user to hm role
    $users = get_users( array('role' => $this->from_role) );
    foreach($users as $user) {
      $email = $user->user_email;
      $name = $user->display_name;
    }

    return $users;
  }
}
