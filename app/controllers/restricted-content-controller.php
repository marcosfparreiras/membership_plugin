<?php
class Restricted_Content_Controller {

  public static function content_data() {
    return Content_Retriever::perform();
  }

  public static function membership_areas() {
    return Membership_Areas_Controller::index();
  }

  public static function add($post) {
    var_dump($post);
    if(isset($post['restricted'])) {
      echo 'OKKK';
      $restricted = $post['restricted'];
      foreach ($restricted as $r) {
        echo '<br>';
        echo $r;
        if(isset($_post[$r]))
          echo '   ' . $_post[$r];
        # code...
      }
    }
    else {
      echo 'NO';
    }

  }

}
