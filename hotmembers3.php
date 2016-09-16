<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
Plugin Name: Hotmembers 3.0
Plugi<!-- n URI: http://hotmembers.com.br/
Description: [HOTMEMBERS 3.0] Crie sua área de membros de uma forma prática, eficiente e 100% integrada com o Hotmart
Author: Marcos Parreiras
Author URI: http://hotmembers.com.br/
Versi -->on: 0.0.0
*/

$hm3_path = dirname(__FILE__) . '/app';
include_once $hm3_path . '/class-hotmembers3.php';
new Hotmembers3($hm3_path);

// include_once plugin_dir_path( __FILE__ ) . '/models/member-area.php';
// register_activation_hook( __FILE__, array( 'Hotmembers3', 'create_tables' ) );

?>
