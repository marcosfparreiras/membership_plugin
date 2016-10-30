<?php
namespace Hotmembers3;
class CSV_Users_Importer {
  public $file_name;
  const TRANSACTION_INDEX = 4;
  const PAYMENT_CONFIRMATION_DATE = 17;
  const STATUS_INDEX = 18;
  const NAME_INDEX = 19;
  const EMAIL_INDEX = 21;

  function __construct($file_name) {
    $this->file_name = $file_name;
  }

  public function perform() {
    $file_handle = fopen($this->file_name, 'r');
    $data = [];
    $i = 0;
    $header = fgetcsv($file_handle, 1024, ';');
    while (!feof($file_handle)) {
      $line = fgetcsv($file_handle, 1024, ';');
      $transaction = $line[self::TRANSACTION_INDEX];
      $date = $line[self::PAYMENT_CONFIRMATION_DATE];
      $name = $line[self::NAME_INDEX];
      $email = $line[self::EMAIL_INDEX];

      echo $transaction . ' - ' . $date . ' - ' . $name . ' - ' . $email . '<br>';
    }
    fclose($file_handle);
  }
}
