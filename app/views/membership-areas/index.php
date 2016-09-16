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

// $m = new Membership_Area_Model('name',123,'oiu', 9898);
$m = new Membership_Area_Model(3,'name3',1223,'o34iu');
// Membership_Area::add($m);
// echo $m->get_name();



$ret =  Membership_Area::delete(3);
// $ret->set_name('newname2');




// if( $ret == null) {
//   echo 'nulll';
// }
// else {
//   echo $ret->get_name();
// }



?>
