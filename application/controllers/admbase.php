<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Admbase extends Webbase {
   
 public function __construct(){
  parent::__construct();
  $this->viewData['cdn_url'] = $this->config->item('cdn_url').'/admin'; 
  $this->assign(array(
  ));
  $this->load->_ci_view_path = 'admin/';
 }
}
