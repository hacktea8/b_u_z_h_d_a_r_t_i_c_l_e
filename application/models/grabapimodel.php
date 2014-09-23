<?php
class grabapiModel extends CI_Model{
  public $db;
  public function __construct(){
     parent::__construct();
     $this->db  = $this->load->database('default', TRUE);
     
  }
  public function get_content_table(){
    return sprintf('article_content');
  }

  public function addCateByname($data){
    if(empty($data['name'])){
      return 0;
    }
    $table = $this->db->dbprefix('emule_cate');
    $sql = sprintf("SELECT * FROM %s WHERE `name`='%s' LIMIT 1",$table,mysql_real_escape_string($data['name']));
    $row = $this->db->query($sql)->row_array();
    if($row){
      return $row['id'];
    }
    $sql = $this->db->insert_string($table,$data);
    $this->db->query($sql);
    $id = $this->db->insert_id();
    return array('id'=>$id);
  }
  public function checkArticleByOname($name){
     if(!$name){
       return array();
     }
     $sql = sprintf("SELECT `id` FROM `%s` WHERE  `title`='%s' LIMIT 1",$this->db->dbprefix('article_title'),mysql_real_escape_string($name));
    $row = $this->db->query($sql)->row_array();
    return $row['id']? $row['id']: 0;
  }
  public function addArticle($data){
    if(empty($data['title'])){
      return 0;
    }
    $head = $this->copy_array($data,array('title','pcid','uid','chid','cid','thum'
    ,'ourl','ptime','utime'));
    if( !isset($head['flag'])){
     //图片待处理
     $head['flag'] = 5;
    }
    $contents = $this->copy_array($data,array('intro'));
    $sql = $this->db->insert_string($this->db->dbprefix('article_title'),$head);
//echo $sql;exit;
    $this->db->query($sql);
    $id = $this->db->insert_id();
    if(!$id){
       return false;
    }
    $contents['id'] = $id;
    $table = $this->get_content_table($id);
    $sql = $this->db->insert_string($this->db->dbprefix($table),$contents);
    $this->db->query($sql);
    
    return $id;
  }
  public function updateArticleVols($data){
  }
  public function addArticleVols($data){
  }
  public function addVols($data){
  }
  public function copy_array($data,$key){
    $return = array();
    foreach($key as $k){
      if(isset($data[$k])){
        $return[$k] = $data[$k];
      }
    }
    return $return;
  }

}
?>
