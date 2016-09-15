<?php
class Hotmembers3 {
  const PATH = ABSPATH . 'wp-content/plugins/hotmembers3';

  function __construct($path) {
    $this->path = $path;
  }

  public function get_path() {
    return $this->path;
  }

}

?>
