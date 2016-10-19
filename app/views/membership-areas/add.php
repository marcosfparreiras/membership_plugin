<?php
namespace Hotmembers3;
$index_page = get_site_url() . '/wp-admin/admin.php?page=hm3_main_menu';

?>
<html>
<div class="wrap">
  <h1>Adicionar Nova Área de Membros</h1>
  </br>
  Crie uma nova Área de Membros novinha em folha e a adicione a este site.
  </br></br>


  <form method='post' action="<?php echo $index_page ?>">
     <?php include ('template-add-update.php'); ?>
    <input type="hidden" name="method" value="add" />
    <a class="button button-primary" href="<?php echo $index_page ?>" >Cancelar</a>
    <input type="submit" class="button button-primary" value="Adicionar">
  </form>
</div>
</html>
