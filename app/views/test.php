<?php
namespace Hotmembers3;

// $a = Import_Users_Controller::hm_roles();
// var_dump($a);

$u = new Role_Users_Importer('administrator', 'hm3_role_1480674588');
$a = $u->perform('administrator', 'hm3_role_1480674588');
var_dump($a);


?>

<html>
<div class="wrap">
  <h2>Testes</h2>
</div>
</html>
