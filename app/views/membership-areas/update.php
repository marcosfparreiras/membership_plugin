<?php
namespace Hotmembers3;
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
    <?php include ('template-add-update.php'); ?>
    <input type="hidden" name="method" value="update" />
    <input type="hidden" name="id" value="<?php echo $membership_area->id ?>" />
    <a class="button button-primary" href="<?php echo $index_page ?>" >Cancelar</a>
    <input type="submit" class="button button-primary" value="Salvar Alterações">
  </form>
</div>
</html>
