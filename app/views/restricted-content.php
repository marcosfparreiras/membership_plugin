<?php
$posts = Content_Retriever::perform();
foreach ($posts as $post) {
  echo '<br><br>';
  var_dump($post);
}

?>

<html>
<div class="wrap">
  <h1>Conteúdo Restrito</h1>
  <br>
  Defina quais conteúdos você deseja que sejam restritos para cada uma das suas áreas de membros.
  <table class="wp-list-table widefat fixed striped posts">
    <thead>
      <td width="40px">Tipo</td>
      <td>Título</td>
      <td>Conteúdo Restrito</td>
      <td>Área 1</td>
    </thead>
    <tbody>
<?php
foreach($posts as $post) {
  $type = $post['post_type'];
  $title = $post['post_title'];
  $id = $post['id'];
  $url = $post['url'];

  echo '<tr>';
  echo '<td width="40px">' . $type . '</td>';
  echo '<td><a href="' . $url . '">' . $title . '</a></td>';
  echo '</tr>';
}
?>
    </tbody>
  </table>
</div>
</html>


