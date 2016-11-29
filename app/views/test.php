<?php
namespace Hotmembers3;

$u = get_user_by('email', 'andre@rdweb.com.br');
wp_delete_user($u->ID);

$u = get_user_by('email', 'cardroomadwords@gmail.com');
wp_delete_user($u->ID);

$u = get_user_by('email', 'contato@signatreinamentos.com.br');
wp_delete_user($u->ID);





// $user = new User_Model('emailbla4@mail.com', 'transaction0001', '2016-01-01');
// $user = User::find('emailbla3@mail.com');
// $user->set_transaction('kkkk');
// var_dump($user);
// User::update($user);
// var_dump(Membership_Area::find_by_prod(29605));
// var_dump(Membership_Area::find(1));


?>

<html>
<div class="wrap">
  <h2>Testes</h2>
</div>
</html>
