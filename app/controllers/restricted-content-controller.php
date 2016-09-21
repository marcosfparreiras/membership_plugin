<?php
class Restricted_Content_Controller {

  public static function content_data() {
    return Content_Retriever::perform();
  }

  public static function membership_areas() {
    return Membership_Areas_Controller::index();
  }

}
