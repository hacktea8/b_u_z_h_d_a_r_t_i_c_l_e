<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grabapi extends CI_Controller {
  public $mem = '';
  public $ttl=array('5m'=>300,'15m'=>900,'30m'=>1800,'1h'=>3600,'3h'=>10800,'6h'=>21600,'9h'=>32400,'12h'=>43200,'1d'=>86400,'3d'=>253200,'5d'=>432000,'7d'=>604800);
  
	/**
	 * Index Page for this controller.
	 *
	 */
  public function __construct(){
    parent::__construct();
    $this->load->model('grabapimodel');
    $this->load->model('emulemodel');
    $this->load->library('memcached');
    $this->mem = &$this->memcached;
  }
  public function addCateByname(){
    $post = $_POST['cate_info'];
    $post = json_decode($post,1);
    if(!$post){
      echo '404';exit;
    }
    $data = $this->grabapimodel->addCateByname($post);
    $data = json_encode($data);
    die($data);
  }
  public function checkArticleByOname(){
    $oname = $_POST['oname'];
    if(!$oname){
      echo '404';
      return 0;
    }
    $data = $this->grabapimodel->checkArticleByOname($oname);
    $data = json_encode($data);
    die($data);
  }
  public function addArticleInfo(){
    $post = $_POST['article_data'];
    $post = json_decode($post,1);
    if(!$post){
      echo '404';
      return 0;
    }
    if( !isset($post['pcid'])){
     $cate = $this->getCateInfo();
     $subCate = $cate[$post['cid']];
     $post['pcid'] = $subCate['pid'];
    }
    $data = $this->grabapimodel->addArticle($post);
    $data = json_encode($data);
    die($data);
  }
  private function getCateInfo(){
    $_key = 'cate_info';
    $cate_info = $this->mem->get($_key);
    if( empty($cate_info)){
      $cate_info = $this->emulemodel->getAllCateInfo();
      $this->mem->set($_key,$cate_info,$this->ttl['3d']);
    }
    return $cate_info;
  }
}
