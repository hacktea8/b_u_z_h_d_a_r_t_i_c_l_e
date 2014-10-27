<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Upload extends Webbase {
 static public $album = array('cover'=>'12697','list'=>'12698','index'=>'12699'
 ,'w0'=>'12700','w1'=>'12702','w2'=>'12703','w3'=>'12704','w4'=>'12705'
 ,'w5'=>'12706','w6'=>'12707');

 public function __construct(){
  parent::__construct();
 }
 public function cropPic(){
  $x1 = $this->input->post('x1');
 }
 public function upAvatar(){
  $imgfile = $this->getTmpImage($post_filename = 'pfile');
  
 }
 public function index(){
  $imgfile = $this->getTmpImage($post_filename = 'pfile');
  if( !$imgfile){
   die(json_encode($data));
  }
  $this->load->library('img_imagick');
  $param = $this->input->post('param');
  if($param['crop']){
   if( !isset($param['lx'])){
    //crop w_h
    $this->img_imagick->resizeImage($imgfile, $width, $height, $out = '');
   }else{
    //crop pos_w_h
    $this->img_imagick->cropImage($img,$width,$height,$lx,$ly,$out = '');
    //$this->img_imagick->cropThumbImage($img, $width = '', $height = '', $out = '');
   }
  }
  $imgick = &$this->img_imagick;
  $waterimg = APPPATH.'../public/images/watermark/watermark.png';
  $imgick->setWaterMark($waterimg);
  //15右中 13上中 12下中 14左中 右下
  $saveF = dirname($imgfile).'/water_'.$upload_data['orig_name'];
  $imgick->waterMark($imgfile, $saveF, $wmpos = 0);
  //save pic
  $this->load->library('tietuku');
  $type = $this->input->get_post('album');
  $albumid = isset(self::$album[$type])?self::$album[$type]:'';
  if( !$albumid){
   $k = 'w'.date('w');
   $albumid = self::$album[$k];
  }
  $ttk = &$this->tietuku;
  for($i = 0;$i<3;$i++){
   $return = $ttk->uploadFile($albumid, $saveF);
   if($return){
    break;
   }
  }
  //$r = $this->tietuku->uploadRemoteFile($albumid,$url);
  
  @unlink($saveF);
  @unlink($imgfile);
  var_dump($return);exit;
  return $img_url;
 }
 protected function getTmpImage($post_filename = ''){
  $upload_file = '';
  $id = 'gc_up_'.mt_rand(10000,99999).time();
  //main of process upload
  $config['upload_path'] = './uploads/';
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
  $config['max_size'] = '20000';
  // tmp filename
  $config['file_name'] = $id;
  $config['is_flash_upload'] = TRUE;
  // $config['encrypt_name'] = TRUE;
  $config['remove_spaces'] = TRUE;
  if(isset($_FILES[$post_filename])){
   $this->load->library('upload', $config);
   if($this->upload->do_upload($post_filename)){
    $upload_data = $this->upload->data();
    $upload_file = $upload_data['full_path'];
   }else{
     return 0;
   }
  }else{
  // remote
   $remote = $this->input->get_post($post_filename);
   $suf = pathinfo($remote, PATHINFO_EXTENSION);
   $suf = strtolower($suf);
   $filter = explode('|', $config['allowed_types']);
   if(!in_array($suf, $filter)){
    return 0;
   }
   $save = $config['upload_path'].$config['file_name'].$suf
   $shell = sprintf('wget -t3 %s -O %s', $remote, $save);
   exec($shell);
   $upload_file = $save;
  }
  if(empty($upload_file)){
   return 0;
  }
  $this->load->library('img_imagick');
  $this->img_imagick->convert($upload_file);
  return $upload_file;
 }
}
?>
