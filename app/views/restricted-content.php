<?php
// $posts = Restricted_Content_Controller::index();
// var_dump($posts);
//
// echo '<br>';
// echo '<br>';
// var_dump($post_types = get_post_types());

// echo '<br>';
// echo '<br>';
// $test = Content_Retriever::perform();
// echo '<br>';
// echo '<br>';
// var_dump(get_post(1));


$test = Content_Retriever::get_post_data(1);
var_dump($test);

?>

<html>
<div class="wrap">
  <h1>Conteúdo Restrito</h1>
  <br>
  Defina quais conteúdos você deseja que sejam restritos para cada uma das suas áreas de membros.
  <table class="wp-list-table widefat fixed striped posts">
    <thead>
      <td>Tipo</td>
      <td>Título</td>
      <td>Área 1</td>
      <td>Área 2</td>
      <td>Área 2</td>
      <td>Área 2</td>
    </thead>
    <tbody>
      <td>Tipo</td>
      <td>Título</td>
      <td>Área 1</td>
      <td>Área 2</td>
      <td>Área 2</td>
      <td>Área 2</td>
    </tbody>
  </table>
</div>
</html>


