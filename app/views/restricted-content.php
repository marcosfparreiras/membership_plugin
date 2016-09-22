<?php
$posts = Restricted_Content_Controller::content_data();
$membership_areas = Restricted_Content_Controller::membership_areas();
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
      <td>Conteúdo Restrito</td>

<?php
foreach($membership_areas as $membership_area) {
  $id = $membership_area->id;
  $name = $membership_area->name;
  echo '<td>' . $name . '</td>';
}
?>

    </thead>
    <tbody>

<?php
foreach($posts as $post) {
  $type = $post['post_type'];
  $title = $post['post_title'];
  $id = $post['id'];
  $url = $post['url'];
  $post_id = $post['id'];

  $restricted_class = 'class="' . $id . '"';

  echo '<tr>';
  echo '<td>' . $type . '</td>';
  echo '<td><a href="' . $url . '">' . $title . '</a></td>';

  // echo '<td><input type="checkbox" class="' . $id . '"></td>';
  echo '<td><input type="checkbox" ' . $restricted_class . '"></td>';
  foreach($membership_areas as $membership_area) {
    $id = $membership_area->id;
    $name = $membership_area->name;
    $membership_class = 'class="' . $post_id . ' ma-' . $membership_area->id . '"';
    echo '<td><input type="checkbox" ' . $membership_class . '></td>';
  }
  echo '</tr>';
}
?>

    </tbody>
    <tfoot>
      <td>Tipo</td>
      <td>Título</td>
      <td>Conteúdo Restrito</td>

<?php
foreach($membership_areas as $membership_area) {
  $id = $membership_area->id;
  $name = $membership_area->name;
  echo '<td>' . $name . '</td>';
}

?>
    </tfoot>
  </table>
</div>
</html>


