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
    <table>
      <tbody>
        <tr>
          <td>Nome</td>
          <td><input type="text" name="name" size="40"></td>
        </tr>
        <tr>
          <td>ID do Produto</td>
          <td><input type="text" name="prod" size="40"></td>
        </tr>
        <!-- <tr>
          <td>Token</td>
          <td><input type="text" size="40"></td>
        </tr> -->
      </tbody>
    </table>
    <br>
    <input type="hidden" name="method" value="add" />
    <a class="button button-primary" href="<?php echo $index_page ?>" >Cancelar</a>
    <input type="submit" class="button button-primary" value="Adicionar">
  </form>
</div>
</html>
