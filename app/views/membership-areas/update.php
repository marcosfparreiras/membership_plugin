<?php
$index_page = get_site_url() . '/wp-admin/admin.php?page=hm3_main_menu';
$membership_area = Membership_Areas_Controller::update($_GET);
?>

<html>
<div class="wrap">
  <h1>Editar Área de Membros</h1>
  </br>
  Edite os campos referentes à Área de Membros.
  </br></br>

  <form method='post' action="<?php echo $index_page ?>">
    <table>
      <tbody>
        <tr>
          <td>Nome</td>
          <td><input type="text" name="name" size="40" value="<?php echo $membership_area->name ?>"></td>
        </tr>
        <tr>
          <td>ID do Produto</td>
          <td><input type="text" name="prod" size="40" value="<?php echo $membership_area->prod ?>"></td>
        </tr>
      </tbody>
    </table>
    <br>
    <input type="hidden" name="method" value="update" />
    <input type="hidden" name="id" value="<?php echo $membership_area->id ?>" />
    <a class="button button-primary" href="<?php echo $index_page ?>" >Cancelar</a>
    <input type="submit" class="button button-primary" value="Salvar Alterações">
  </form>
</div>
</html>
