<?php
require_once 'basemodel.php';
class grabapiModel extends baseModel{
  public function __construct(){
     parent::__construct();
     
  }
  public function get_content_table(){
    return self::$_tArtileBody;
  }

  public function addCateByname($data){
    if(empty($data['name'])){
      return 0;
    }
    $table = self::$_tCate;
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
