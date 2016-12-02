<?php
namespace Hotmembers3;
Import_Users_Controller::perform_on_post();

$wp_roles = Import_Users_Controller::wp_roles();
$select_wp_roles = '<select name="from-role">';
foreach($wp_roles as $slug => $name) {
  $select_wp_roles .= "<option value='$slug'>$name</option>";
}
$select_wp_roles .= '</select>';

$hm_roles = Import_Users_Controller::hm_roles();
$select_hm_roles = '<select name="to-role">';
foreach($hm_roles as $slug => $name) {
  $select_hm_roles .= "<option value='$slug'>$name</option>";
}
$select_hm_roles .= '</select>';
?>

<html>
<div class="wrap">
  <h2>Importar Usuários</h2>

  <h3>Importar Usuários via Arquivo CSV</h3>
  Escolha um arquivo CSV a partir do qual você pretende importar seus usuários.
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="csv-file-name" accept=".csv">
    <br>
    <input type="submit" class="button button-primary" value="Importar">
    <input type="hidden" name="method" value="csv">
  </form>

  <br><br><hr>
  <h3>Importar Usuários por Função</h3>
  <form action="" method="post" enctype="multipart/form-data">
    Importar usuários com função
    <?php echo $select_wp_roles ?>
    para a Área de Membros
    <?php echo $select_hm_roles ?>
    <br>
    <input type="submit" class="button button-primary" value="Importar">
    <input type="hidden" name="method" value="role">
  </form>

</div>
</html>
