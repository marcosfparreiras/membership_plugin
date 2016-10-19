<?php
namespace Hotmembers3;
$index_page = get_site_url() . '/wp-admin/admin.php?page=hm3_main_menu';
if(isset($membership_area)) {
  $name = $membership_area->name;
  $prod = $membership_area->prod;
  $id = $membership_area->id;
  $token = $membership_area->token;
  $periodicity_value = $membership_area->periodicity_value;
}
else {
  $name = '';
  $prod = '';
  $id = '';
  $token = '';
  $periodicity_value = '';
}
?>

<table>
  <tbody>
    <tr>
      <td>Nome</td>
      <td><input type="text" name="name" size="40" value="<?php echo $name ?>"></td>
    </tr>
    <tr>
      <td>ID do Produto</td>
      <td><input type="text" name="prod" size="40" value="<?php echo $prod ?>"></td>
    </tr>
    <tr>
      <td>Token</td>
      <td><input type="text" name="token" size="40" value="<?php echo $token ?>"></td>
    </tr>
    <tr>
      <td>Periodicidade</td>
      <td>
        <input type="number" name="periodicity_value" size="3" value="<?php echo $periodicity_value ?>">mês/meses
      </td>
    </tr>
  </tbody>
</table>
