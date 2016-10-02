<?php
// $id = 1;
// $prod_id = 1;
// $days_to_release = 1;
// $memership_area_id = 1;
// $content = new Restricted_Content_Model($id, $prod_id, $days_to_release, $memership_area_id);
// var_dump($content);
// Restricted_Content::add($content);

$d = Restricted_Content::get();
var_dump($d);
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
