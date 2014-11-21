<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('admbase.php');

class Admapi extends Admbase {
 public function __construct(){
  parent::__construct();
  $this->load->model('admapiModel');
 }
 public function article_verify(){
  $start = $this->input->get('start');
  $limit = $this->input->get('limit');
  $list = $this->admapiModel->getArticleVerifyList(5, array(intval($start)+1,intval($limit)));
  $r = array('rows'=>$list,'results'=>30);
  die(json_encode($r));
 }
 public function optarticle_flag($opt = 'del'){
  $ids = $this->input->post('ids');
  $this->admapiModel->setArticleShowFlag($ids,$opt);
  die(json_encode(array('success'=>1)));
  var_dump($ids);exit;
 }
}
