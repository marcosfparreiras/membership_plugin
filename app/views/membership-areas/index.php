<?php
namespace Hotmembers3;
Membership_Areas_Controller::perform_on_post();
?>

<html>
<div class="wrap">
  <h2>
    Áreas de Membros Adicionar
    <a href="<?php echo get_site_url() . '/wp-admin/admin.php?page=hm3_membership_areas_add'?>" class="add-new-h2">Adicionar Nova</a>
  </h2>
  <table class="wp-list-table widefat fixed striped posts">
    <thead>
      <td>Nome</td>
      <td>Produto</td>
    </thead>
    <tbody>


<?php
$membership_areas = Membership_Areas_Controller::index();
$base_url = get_site_url() . '/wp-admin/admin.php?';
foreach($membership_areas as $membership){
  $id = $membership->id;
  $name = $membership->name;
  $prod = $membership->prod;

  $edit_url = $base_url . "page=hm3_membership_areas_update&id=$id";
  $delete_url = $base_url . "page=hm3_membership_areas_delete&id=$id";

  $edit_link = "<a href='$edit_url'>Editar</a>";
  $delete_link = "<a style='color: red;' href='$delete_url'>Excluir</a>";

  $actions_line = "$edit_link | $delete_link ";
  echo "<tr>";
  echo "<td>";
  echo "<spam class='row-title'>$name</spam><br>";
  echo $actions_line;
  echo "</td>";
  // echo "<td><a href='$url'>$name</a><br>Test</td>";
  echo "<td>$prod</td>";
  echo "</tr>";
}

?>
    </tbody>
  </table>
</div>
</html>
