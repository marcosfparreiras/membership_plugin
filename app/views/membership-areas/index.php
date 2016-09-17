<html>
<div class="wrap">
  <h2>
    Áreas de Membros Adicionar
    <a href="<?php echo get_site_url() . '/wp-admin/admin.php?page=hm3_membership_areas_add'?>" class="add-new-h2">Adicionar Nova</a>
  </h2>
</div>
</html>

<?php
include Hotmembers3::DIR_PATH . '/models/membership-area.php';
include Hotmembers3::DIR_PATH . '/controllers/membership-areas-controller.php';

$a = Membership_Areas_Controller::index();
var_dump($a);

foreach($a as $am){
  echo "$am->id - $am->name - $am->prod - $am->offer<br>";
}


?>
