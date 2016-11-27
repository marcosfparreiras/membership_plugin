<?php
namespace Hotmembers3;

// $user = new User_Model('emailbla4@mail.com', 'transaction0001', '2016-01-01');
$user = User::find('emailbla3@mail.com');
$user->set_transaction('kkkk');
var_dump($user);
User::update($user);

?>

<html>
<div class="wrap">
  <h2>Testes</h2>
</div>
</html>
