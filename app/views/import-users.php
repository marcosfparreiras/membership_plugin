<?php
namespace Hotmembers3;
Import_Users_Controller::perform_on_post();
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
  </form>

</div>
</html>
