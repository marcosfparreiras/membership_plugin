<?php
namespace Hotmembers3;
class Impor_Users_Controller {

  public static function perform_on_post() {
    var_dump($_FILES);
    if(isset($_FILES["csv-file-name"])) {
      $csv_importer = new CSV_Users_Importer($_FILES["csv-file-name"]['tmp_name']);
      $csv_importer->perform();
    }

  }
}
