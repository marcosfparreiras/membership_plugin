<?php
Restricted_Content_Controller::perform_on_post();

$index_page = get_site_url() . '/wp-admin/admin.php?page=hm3_restricted_content';

$posts = Restricted_Content_Controller::content_data();
$membership_areas = Restricted_Content_Controller::membership_areas();

$data_to_load = Restricted_Content_Controller::index();
$restricted_content_ids = array_keys($data_to_load);

function restricted_content_header($membership_areas) {
  echo '<td>Tipo</td>';
  echo '<td>Título</td>';
  echo '<td>Conteúdo Restrito</td>';
  foreach($membership_areas as $membership_area) {
    $id = $membership_area->id;
    $name = $membership_area->name;
    echo '<td>' . $name . '</td>';
  }
}

?>

<html>
<div class="wrap">
  <h1>Conteúdo Restrito</h1>
  <br>
  Defina quais conteúdos você deseja que sejam restritos para cada uma das suas áreas de membros.
  <br><br>
  <form action="" method="post">
    <table class="wp-list-table widefat fixed striped posts">
      <thead>
        <?php restricted_content_header($membership_areas) ?>
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
  $checked = '';
  if (in_array($post_id, $restricted_content_ids)) {
    $checked = 'checked';
  }
  echo '<td><input type="checkbox" name="restricted[]" value="' . $post_id . '" id="' . $post_id . '" ' . $checked . '></td>';

  foreach($membership_areas as $membership_area) {
    $membership_id = $membership_area->id;
    $membership_name = $membership_area->name;
    $name_tag = 'name="' . $post_id . '[]"';
    $value_tag = 'value="' . $membership_id . '"';
    echo '<td>';
    $membership_checked = '';

    if(isset($data_to_load[$post_id])) {
      if(in_array($membership_id, $data_to_load[$post_id])) {
        $membership_checked = 'checked';
      }
    }

    echo '<input type="checkbox" ' . $name_tag . ' ' . $value_tag . ' ' . $membership_checked . '>';
    // echo '<input type="text" class="content_dripping" />';
    echo '</td>';
  }
  echo '</tr>';
}
?>
      </tbody>
      <tfoot>
        <?php restricted_content_header($membership_areas) ?>
      </tfoot>
    </table>
    <br>
    <input type="hidden" name="method" value="add" />
    <a class="button button-primary" href="<?php echo $index_page ?>" >Cancelar</a>
    <input type="submit" class="button button-primary" value="Salvar Alterações">
  </form>
</div>
</html>
