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

// $m = new Membership_Area_Model(1,'name',123,'oiu');
// $m = new Membership_Area_Model(2,'name2',1223,'o34iu');
// Membership_Area::add($m);
// echo $m->get_name();

$ret =  Membership_Area::find(2);
if( $ret == null) {
  echo 'nulll';
}
else {
  echo $ret->get_name();
}



?>
