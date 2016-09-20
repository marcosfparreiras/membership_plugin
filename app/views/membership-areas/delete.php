<?php
$index_page = get_site_url() . '/wp-admin/admin.php?page=hm3_main_menu';
$membership_id = $_GET['id'];
$membership_area = Membership_Areas_Controller::delete($membership_id);
$name = $membership_area->name;
?>
<html>
<div class="wrap">
  <h2>Excluir Área de Membros</h2>
  Você está prestes a deletar a seguintes área de membros.
  <br><br>
  <form method='post' action="<?php echo $index_page ?>">
    <table>
      <tr>
        <td ><b>Nome</b></td>
        <td style="padding:0 15px 0 15px;"><?php echo $membership_area->name ?></td>
      </tr>
      <tr>
        <td><b>ID do Produto</b></td>
        <td style="padding:0 15px 0 15px;"><?php echo $membership_area->prod ?></td>
      </tr>
      <tr>
        <td><b>Token</b></td>
        <td style="padding:0 15px 0 15px;"></td>
      </tr>
    </table>
    <br>
    <input type="hidden" name="method" value="delete" />
    <input type="hidden" name="id" value="<?php echo $membership_id ?>" />
    <input type="hidden" name="name" value="<?php echo $name ?>" />
    <a class="button button-primary" href="<?php echo $index_page ?>" >Cancelar</a>
    <input type="submit" class="button button-primary" value="Excluir">
  </form>
</div>
</html>
