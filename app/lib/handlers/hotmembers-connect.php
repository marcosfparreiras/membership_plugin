<?php
namespace Hotmembers3;
include_once( 'helpers/hotmembers-connect-user-helper.php' );
include_once( 'hotmembers-connect-hotmart.php' );
include_once( 'hotmembers-connect-eduzz.php' );
class HotmembersConnect {

  /** Hook WordPress
  * @return void
  */
  public function __construct(){
    add_filter('query_vars', array($this, 'add_query_vars'), 0);
    add_action('parse_request', array($this, 'sniff_requests'), 0);
    add_action('init', array($this, 'add_endpoint'), 0);
  }

  /** Add public query vars
  * @param array $vars List of current public query vars
  * @return array $vars
  */
  public function add_query_vars($vars){
    $vars[] = 'hotmembers';
    $vars[] = 'connect';
    return $vars;
  }

  /** Add API Endpoint
  * This is where the magic happens - brush up on your regex skillz
  * @return void
  */
  public function add_endpoint(){
    add_rewrite_rule('^hotmembers/connect/?([^&]+)?/?','index.php?hotmembers=1&connect=$matches[1]','top');
  }

  public static function flush_new_endpoint() {
    add_rewrite_rule('^hotmembers/connect/?([^&]+)?/?','index.php?hotmembers=1&connect=$matches[1]','top');
    flush_rewrite_rules();
  }

  /** Sniff Requests
  * This is where we hijack all API requests
  *   If $_GET['hotmembers'] and $_GET['connect'] are set, we kill WP and serve
  *   up api
  * @return die if API request
  */
  public function sniff_requests(){
    global $wp;
    if(isset($wp->query_vars['hotmembers'])) {
      $this->handle_request();
      exit;
    }
  }

  /** Handle Requests
  * This is where we send off for an intense pug bomb package
  * @return void
  */
  protected function handle_request(){
    global $wp;
    $connect = $wp->query_vars['connect'];

    if ($connect == 'hotmart') {
      $act_response = HotmembersConnectHotmart::act($_POST);
      $this->send_response($act_response);
    }
    elseif ($connect == 'eduzz') {
      $act_response = HotmembersConnectEduzz::act($_POST);
      $this->send_response($act_response);
    }
    else {
      $this->send_response('Not connecting with neither hotmart nor eduzz');
    }
  }

  /** Response Handler
  * This sends a JSON response to the browser
  */
  protected function send_response($msg, $connect = ''){
    $response['message'] = $msg;
    if($connect)
      $response['connect'] = $connect;
    header('content-type: application/json; charset=utf-8');
    echo json_encode($response)."\n";
    exit;
  }
}
