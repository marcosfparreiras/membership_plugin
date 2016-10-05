<?php
$roles = get_editable_roles();
// var_dump(array_keys($roles));
var_dump($roles);

echo '<br>';
echo '<br>';
$role = 'administratord';
$r = get_role( $role );
var_dump($r);

echo '<br>';
echo time();

echo '<br>';
// $r = Roles_Handler::create_wp_role('Role Exemplo');
$r = get_role('hm3_role_1475634059');
var_dump($r);
echo '<Br>';
echo $r->name;
// $r = Roles_Handler::remove_wp_role('hm3_role_1475632772');
// var_dump($r);


?>

<html>
<div class="wrap">
  <h2>Testes</h2>
</div>
</html>
