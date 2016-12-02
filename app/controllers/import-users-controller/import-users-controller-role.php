<?php
namespace Hotmembers3;
class Import_Users_Controller_Role {

  public static function perform() {
    return self::import_from_role();
  }

  private static function import_from_role() {
    if(isset($_POST["from-role"]) && (isset($_POST["to-role"]))) {
      if($from_role == $to_role) {
        return ['Erro. As funções devem ser diferentes.'];
      }
      $from_role = $_POST['from-role'];
      $to_role = $_POST['to-role'];

      echo $from_role;
      echo '<br>';
      echo $to_role;
    }
  }

  // private static function import_from_csv() {
  //   if(isset($_FILES["csv-file-name"])) {
  //     $csv_importer = new CSV_Users_Importer($_FILES["csv-file-name"]['tmp_name']);
  //     if($csv_importer->perform()) {
  //       $notices = array( 'success' => self::get_success_messages() );
  //     }
  //     else {
  //       $notices = array( 'error' => self::get_general_error_messages() );
  //     }
  //   }
  //   else {
  //     $notices = array( 'error' => self::get_no_file_error_messages() );
  //   }
  //   return $notices;
  // }

  private static function get_success_messages() {
    $messages = [];
    $messages[] = "Usuários importados com sucesso.";
    return $messages;
  }

  private static function get_general_error_messages() {
    $messages = [];
    $messages[] = "Houve um erro ao importar os usuários.";
    return $messages;
  }

  private static function get_no_file_error_messages() {
    $messages = [];
    $messages[] = "Houve um erro ao importar os usuários. Não foi possível abrir o arquivo.";
    return $messages;
  }
}
