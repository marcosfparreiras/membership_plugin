<?php
namespace Hotmembers3;
class CSV_Users_Importer {
  public $file_name;
  const TRANSACTION_INDEX = 4;
  const PAYMENT_CONFIRMATION_DATE = 17;
  const STATUS_INDEX = 18;
  const NAME_INDEX = 19;
  const EMAIL_INDEX = 21;
  const PRODUCT_ID = 33;

  function __construct($file_name) {
    $this->file_name = $file_name;
  }

  public function perform() {
    $file_handle = fopen($this->file_name, 'r');
    if(!$file_handle) {
      return false;
    }
    $header = fgetcsv($file_handle, 1024, ';');
    while ($line = fgetcsv($file_handle, 1024, ';')) {
      $this->parse_line($line);
    }
    fclose($file_handle);
    return true;
  }

  private function parse_line($line) {
    $transaction = $line[self::TRANSACTION_INDEX];
    $payment_date = $line[self::PAYMENT_CONFIRMATION_DATE];
    $formated_date = $this->date_formater($payment_date);
    $name = $line[self::NAME_INDEX];
    $email = $line[self::EMAIL_INDEX];
    $prod_id = $line[self::PRODUCT_ID];
    $membership_areas = Membership_Area::find_by_prod($prod_id);

    foreach($membership_areas as $membership_area) {
      $role_slug = $membership_area->get_slug();

      // echo $transaction . ' - ' . $formated_date . ' - ' . $name . ' - ' . $email . ' - ' . $prod_id . ' - ' . $role_slug . '<br>';
      User::add(new User_Model($email, $transaction, $membership_area->get_id(), $formated_date));
      $wp_user = new Wordpress_User($email, $name);
      $wp_user->add($role_slug);
    }
  }

  private function date_formater($payment_date) {
    // $date = \DateTime::createFromFormat('d/m/Y H:i', '25/10/2016 17:45');
    $date = \DateTime::createFromFormat('d/m/Y H:i', $payment_date);
    return $date->format('Y-m-d');
  }
}
