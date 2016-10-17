<?php
$status = 'approved';
// $status = 'refunded';
// $hottok '';
$email = 'marcosfparreiras@gmail.com.brkk';
$first_name = 'Teste';
$last_name = 'Sobre';
$prod = '111';

$post = array(
  'status' => $status,
  'email' => $email,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'prod' => $prod
);

Hotmembers3\HotmembersConnectHotmart::act($post);

?>

<html>
<div class="wrap">
  <h2>Testes</h2>
</div>
</html>
