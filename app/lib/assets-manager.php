<?php
class Assets_Manager {
  public static function add_assets() {
    self::add_scripts();
    self::add_styles();
  }

  public static function add_scripts() {
    wp_enqueue_script(
      'hm3-scripts',
      HOTMEMBERS3_ASSETS_URL . '/javascripts/ex.js',
      array('hm2-jq')
    );
    wp_enqueue_script(
      'hm2-jq',
      HOTMEMBERS3_ASSETS_URL . '/javascripts/hm2-jquery.js'
    );
  }

  public static function add_styles() {
    wp_enqueue_style(
      'hm3-styles',
      HOTMEMBERS3_ASSETS_URL . '/stylesheets/test.css'
    );
  }
}
