<?php
echo HOTMEMBERS3_URL_PATH;
echo '<br>';
echo HOTMEMBERS3_ASSETS_URL . '/stylesheets/test.css';
echo '<br>';
echo HOTMEMBERS3_ASSETS_URL . '/javascripts/ex.js';

echo '<br><br>';
if( isset($_POST['cb'])) {
  var_dump($_POST['cb']);
}
?>

<html>
<div class="wrap">
  <h2>Testes</h2>
</div>
<form action="" method="post">
  <input name='cb[]' id="checkbox_id" type="checkbox" checked value="a">
  <input name='cb[]' id="checkbox_id" type="checkbox" checked="on" value="b">
  <input name='cb[]' id="checkbox_id" type="checkbox" checked="yes" value="c">
  <input name='cb[]' id="checkbox_id" type="checkbox" checked="checked" value="d">
  <input name='cb[]' id="checkbox_id" type="checkbox" checked="true" value="e">
  <input type="submit"></form>
</form>
<p>Paragrafo de teste</p>
</html>
