<?php
class Restricted_Content_Controller {

  public static function content_data() {
    return Content_Retriever::perform();
  }

  public static function membership_areas() {
    return Membership_Areas_Controller::index();
  }

  public static function index() {
    return Restricted_Content::get();
  }

  public static function populate($post) {
    Restricted_Content::clear_table();
    self::add($post);
  }

  public static function add($post) {
    var_dump($post);
    if(isset($post['restricted'])) {
      $restricted_posts = $post['restricted'];
      echo '<br>';
      echo "Restricted<br>";
      var_dump($restricted_posts);
      foreach ($restricted_posts as $post_id) {
        if(isset($post["$post_id"])) {
          foreach ($post["$post_id"] as $membership_area_id) {
            echo '<br>Memberhsip ids<br>';
            $obj = (object) array(
              'post_id' => $post_id,
              'days_to_release' => 0,
              'membership_area_id' => $membership_area_id
            );
            $restricted_content = new Restricted_Content_Model(
              0,
              $post_id,
              0,
              $membership_area_id
            );

            // ::with_object($obj);
            Restricted_Content::add($restricted_content);
            echo $membership_area_id;
          }
        }
        echo "<br><br>Postid: $post_id";
        var_dump($post["$post_id"]);
        echo "<br>------------<br>";

      }
    }
  }



    // if(isset($post['restricted'])) {
    //   $posts_restricted = $post['restricted'];
    //   foreach ($posts_restricted as $post_id) {
    //     if(isset($post[$post_id])) {
    //       $membership_areas = $post[$post_id];
    //       if(isset($membership_areas)) {
    //         foreach ($membership_areas as $membership_area) {
    //           # code...
    //         }
    //       }
    //     }
    //       echo '   ' . $_post[$r];
    //     # code...
    //   }
    // }
    // else {
    //   echo 'NO';
    // }


}
