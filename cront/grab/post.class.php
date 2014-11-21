<?php

class Post{
 public $postUrl = 'http://www.news8s.com/console/postcreate';
 public $header = array(
 'Cookie:_ga=GA1.2.1935772039.1414980053; hk8_auth=4b6eOY9a1i1mvFH7NfLdobVyoN1t%2B7C0Fk5dPc7DGz5832Vo33myirapCKzR79Jr9jo; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%2253d34df47f807913e8a746f2f490eefc%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%22101.69.243.163%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A120%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F38.0.2125.122+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1416280650%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A18%3A%7Bs%3A3%3A%22uid%22%3Bs%3A1%3A%222%22%3Bs%3A5%3A%22uname%22%3Bs%3A8%3A%22hacktea8%22%3Bs%3A5%3A%22isvip%22%3Bs%3A1%3A%222%22%3Bs%3A7%3A%22isAdmin%22%3Bs%3A1%3A%221%22%3Bs%3A3%3A%22gid%22%3Bs%3A1%3A%221%22%3Bs%3A6%3A%22invite%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22month_hits%22%3Bs%3A1%3A%220%22%3Bs%3A6%3A%22amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A4%3A%22hits%22%3Bs%3A1%3A%220%22%3Bs%3A11%3A%22click_count%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22post_count%22%3Bs%3A2%3A%2261%22%3Bs%3A3%3A%22wid%22%3Bs%3A1%3A%221%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%22101.69.243.163%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141117%22%3Bs%3A5%3A%22email%22%3Bs%3A17%3A%221187247901%40qq.com%22%3Bs%3A7%3A%22isadmin%22%3Bi%3A1%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7D08b84ac91650a46ccd676f599689439f'
 );
 public $ttk = '';
 public $gickimg = '';
 public $curl = '';

 public function init($config){
  foreach($config as $k => $v){
   $this->$k = $v;
  }
 }
 
 public function create($data){
  $pic = $this->upload2ttk($data['cover'], $cover = 1);
//echo $pic;exit;
/*
  $intro = $this->upload2ttk($data['intro'], $cover = 0);
*/
  $intro = $data['intro'];
  $post_data = array(
  'Post[is_original]'=>$data['is_original']
  ,'Post[original_url]'=>$data['original_url']
  ,'Post[no_infringement]'=>''
  ,'Post[title]'=>$data['title']
  ,'Post[summary]'=>''
  ,'Post[pic]'=>$pic
  ,'Post[intro]'=>$intro
  // 1-10
  ,'Post[cid2]'=>$data['cid']
  ,'Post[tags]'=>$data['tags']
  ,'Post[coop]'=>''
  ,'Post[id]'=>''
  ,'Post[verify]'=>'1'
  );
  $html = $this->html($post_data);
  //file_put_contents('post_debug.html', $html);
  preg_match('#/article/index/(\d+)#is', $html, $match);
  $aid = @$match[1];
  if( empty($aid)){
   var_dump($match);
   echo $html,"\n";exit;
  }
  return $aid;
 echo $html,"\n";exit; 
 }
 public function upload2ttk($string,$cover = 0){
  $picArr = array();
  if($cover){
   $picArr[] = $string;
  }else{
   preg_match_all('#<\s*img [^>]*src=(.+)(^>|>)#Uis',$string,$match);
   $picArr = @$match[1];
   
  }
  $up_data = array('url' => 'http://img.hacktea8.com/ttkapi/uploadurl?seq=', 'imgurl'=>'','filename'=>''
 ,'site'=>'btv','album'=>'');
  foreach($picArr as $v){
   $v = str_replace(array('"',"'"),'',$v);
   if(false !== stripos($v, '.tietuku.com')){
    continue;
   }
   $up_data['imgurl'] = $v;
   $up_data['filename'] = basename($v);
   for($i = 0;$i<3;$i++){
    $covers = $this->get_html($up_data);
    $covers = trimBOM($covers);
    //echo '|',$covers,'|',"\n";
    $covers = json_decode($covers, 1);
    //var_dump($covers);
    if(1 == $covers['flag']){
     break;
    }
    sleep(10);
   }
   //var_dump($covers);exit;
   $src = '';
   if(1 == $covers['flag']){
    $src = $covers['url'];
   }
/*
   //$r = $this->ttk->uploadRemoteFile(0,$v);
   $vf = ROOTPATH.'cache/ttk_'.basename($v);
   $cmd = sprintf('wget %s -O %s',$v,$vf);
   exec($cmd);
   $r = $this->ttk->uploadFile(0,$vf);
   $src = @$r['linkurl'];
   @unlink($vf);
*/
   if($src){
  //  echo 'v=',$v,' src=',$src,"\n";
    $string = str_replace($v,$src,$string);
   }else{
    var_dump($r);exit;
   }
  }
//echo $string,"\n";exit;
  return $string;
 }
 public function html($data){
  $ch = curl_init();//初始化curl
  curl_setopt($ch,CURLOPT_URL, $this->postUrl);//抓取指定网页
  curl_setopt($ch, CURLOPT_HEADER, 1);//设置header
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);//设置HTTP头
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
  curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  $html = curl_exec($ch);//运行curl
  curl_close($ch);
  return $html;
 }
 public function get_html(&$data){
  $curl = curl_init();
  $url = $data['url'];
  unset($data['url']);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.3 (Windows; U; Windows NT 5.3; zh-TW; rv:1.9.3.25) Gecko/20110419 Firefox/3.7.12');
  // curl_setopt($curl, CURLOPT_PROXY ,"http://189.89.170.182:8080");
  curl_setopt($curl, CURLOPT_POST, count($data));
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $tmpInfo = curl_exec($curl);
  if(curl_errno($curl)){
    echo 'error',curl_error($curl),"\r\n";
    return false;
  }
  curl_close($curl);
  $data['url'] = $url;
  return $tmpInfo;
 }
}
