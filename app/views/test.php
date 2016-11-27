<?php
namespace Hotmembers3;

$wp_user = new Wordpress_User();
$wp_user->create_wp_user('email@mail.test', 'FN', 'LN', 'mypass');
// $date = \DateTime::createFromFormat('d/m/Y H:i', '25/10/2016 17:45');
// echo $date->format('Y-m-d');
?>

<html>
<div class="wrap">
  <h2>Testes</h2>
</div>
</html>
