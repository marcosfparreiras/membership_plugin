<?php
class Assets_Manager {
  public static function add_assets() {
    self::add_scripts();
    self::add_styles();
  }

  public static function add_scripts() {
    wp_enqueue_script(
      'hm3-scripts',
      HOTMEMBERS3_ASSETS_URL . '/javascripts/scripts.js',
      array('jquery')
    );
  }

  public static function add_styles() {
    wp_enqueue_style(
      'hm3-styles',
      HOTMEMBERS3_ASSETS_URL . '/stylesheets/styles.css'
    );
  }
}
