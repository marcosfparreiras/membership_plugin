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
  $post_id = $post['id'];
  $url = $post['url'];

  echo '<tr>';
  echo '<td>' . $type . '</td>';
  echo '<td><a href="' . $url . '">' . $title . '</a></td>';
  echo '<td><input type="checkbox" id="' . $post_id . '"></td>';
  foreach($membership_areas as $membership_area) {
    $membership_id = $membership_area->id;
    $membership_name = $membership_area->name;
    $name_tag = 'name="' . $post_id . '[]"';
    $value_tag = 'value="' . $membership_id . '"';
    echo '<td><input type="checkbox" ' . $name_tag . ' ' . $value_tag . '"></td>';
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





Notas importantes:
Buscar todos itens com id:
$('input[id]')

Desabilitar com base no nome:
$("input[name='20[]']").prop('disabled', false);

Buscar inputs com id que estão marcados:
$('input[id]:checked');

Desabilitar checkboxes (estrutura muito parecida com a que será usada)
$(function() {
    $('#10').click(function() {
        if ($(this).is(':checked')) {
            $("input[name='10[]']").prop('disabled', false);
        } else {
            $("input[name='10[]']").prop('disabled', true);
        }
    });
});


Buscar pelo nome e pegar elemento
$(function() {
  $('input[type=checkbox]').click(function() {
    var id = $(this).attr('id');
    console.log(id);
  });
});
