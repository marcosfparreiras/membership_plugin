<html>
<div class="wrap">
  <h2>
    Áreas de Membros Adicionar
    <a href="<?php echo get_site_url() . '/wp-admin/admin.php?page=hm3_membership_areas_add'?>" class="add-new-h2">Adicionar Nova</a>
  </h2>
</div>
</html>

<?php
Hotmembers3::include_models();
Hotmembers3::include_membership_areas_controller();

$a = Membership_Areas_Controller::index();
var_dump($a);

foreach($a as $am){
  echo "$am->id - $am->name - $am->prod - $am->offer<br>";
}

// $obj = [
//   'id' => 88,
//   'name' => 'myname',
//   'prod' => 'myprod',
//   'offer' => 'myoffer'
// ];
// $obj = (object) $obj;
// $a = Membership_Area_Model::with_object($obj);
// var_dump($a);

?>
