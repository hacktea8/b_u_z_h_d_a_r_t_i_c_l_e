<?php

define('ROOTPATH',$APPPATH.'../');
//include_once($APPPATH.'../db.class.php');
//include_once($APPPATH.'../model.php');
require_once ROOTPATH.'phpCurl.php';
require_once ROOTPATH.'post.class.php';
require_once ROOTPATH.'../../application/libraries/Tietuku.php';
require_once ROOTPATH.'../../application/libraries/gickimg.php';

$ttk = new Tietuku();

$postObj = new Post();
$config = array('ttk'=>$ttk);
$postObj->init($config);

$apicurl = new phpCurl();
$apicurl->config['cookie'] = 'cookie_api';

//$model=new Model();

function trimBOM ($contents) {
 $charset = array();
 $charset[1] = substr($contents, 0, 1);
 $charset[2] = substr($contents, 1, 1);
 $charset[3] = substr($contents, 2, 1);
 if (ord($charset[1]) == 239 && ord($charset[2]) == 187 && ord($charset[3]) == 191) {
   return substr($contents, 3);
 }
 return $contents;
}
function parse_cover($url){
  $uinfo = parse_url($url);
  $r = array();
  $host = @$uinfo['host'];
  $host = explode('.',$host);
  $r['host'] = @$host[0];
  $host = ltrim(@$uinfo['path'],'/');
  $host = explode('.',$host);
  $r['key'] = @$host[0];
  if( !$r['host'] || !$r['key']){
   return 0;
  }
  $r['ext'] = @$host[1];
  $r['url'] = $url;
  return $r;
}
function getDownFileName($url){
 
}
/*
获取配对的标签的内容
*/
function getTagpair(&$str,&$string,$head,$end,$same){
 $str='';
 $start = stripos($string, $head);
 if($start === false){
  return false;
 }
//第一个包含head标签位置的剩下字符串
 $string = substr($string, $start);
 //第一次结尾的end标签的位置
 $start = stripos($string, $end)+strlen($end);
 if($start === false){
  return false;
 }
 $str = substr($string,0,$start);
 $others = substr($string, $start+1);
//开始标签出现的次数
 $count_head = substr_count($str,$same);
//结束标签出息的次数
 $count_tail = substr_count($str, $end);
//echo $others,exit;
 while($count_head != $count_tail && $count_tail){
  //$start=stripos($others, $same);
  $length = stripos($others, $end)+strlen($end);
  $str .= substr($others, 0,$length);
  $others = substr($others, $length);
  $count_head = substr_count($str,$same);
  $count_tail = substr_count($str, $end);	
 }
}
/*
*/

function checkArticleByOname($oname){
  global $apicurl,$POST_API;
  $url = $POST_API.'checkArticleByOname';
  $apicurl->config['url'] = $url;
  $apicurl->postVal = array(
  'oname' => $oname
  );
  $html = $apicurl->getHtml();
  $return = json_decode($html,1);
//var_dump($return);exit;
  return $return;
}
function addArticleVols($data){
  global $apicurl,$POST_API;
  $url = $POST_API.'addArticleVols';
  $apicurl->config['url'] = $url;
  $apicurl->postVal = array(
  'article_data' => json_encode($data)
  );
  $html = $apicurl->getHtml();
  return json_decode($html,1);
}
function addArticle($data){
 global $postObj;
 $html = $postObj->create($data);
 return $html;
}
function getHtml($url){
  global $http_proxy,$http_header;
 
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36');
  if($http_proxy){
    //curl_setopt($curl, CURLOPT_PROXY ,"http://$http_proxy");
  }
  //curl_setopt($curl,CURLOPT_HTTPHEADER,$http_header);
  curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
  curl_setopt($curl, CURLOPT_HEADER, 0);
//  curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie/cookie.txt '); //读取  
//  curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie/cookie.txt '); //保存  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $tmpInfo = curl_exec($curl);
//var_dump($tmpInfo);exit;
  if(curl_errno($curl)){
    echo 'error ',curl_error($curl),"\r\n";
    return false;
  }
  curl_close($curl);
  return $tmpInfo;
}
function jsary2phpary($jsarray){
  $data = preg_replace("/\]/",")",$jsarray);
  $data = preg_replace("/\[/","(",$data);
  $data = preg_replace("/\(/","array(",$data);
  eval("\$aa = ".$data.';');
  return $aa;
}
function unicode_encode($name)
{
    $name = iconv('UTF-8', 'UCS-2', $name);
    $len = strlen($name);
    $str = '';
    for ($i = 0; $i < $len - 1; $i = $i + 2)
    {
        $c = $name[$i];
        $c2 = $name[$i + 1];
        if (ord($c) > 0)
        {    // 两个字节的文字
            $str .= '\u'.base_convert(ord($c), 10, 16).base_convert(ord($c2), 10, 16);
        }
        else
        {
            $str .= $c2;
        }
    }
    return $str;
}

// 将UNICODE编码后的内容进行解码，编码后的内容格式：YOKA\u738b （原始：YOKA王）
function unicode_decode($name)
{
    // 转换编码，将Unicode编码转换成可以浏览的utf-8编码
    $pattern = '/([\w]+)|(\\\u([\w]{4}))/i';
    preg_match_all($pattern, $name, $matches);
    if (!empty($matches))
    {
        $name = '';
        for ($j = 0; $j < count($matches[0]); $j++)
        {
            $str = $matches[0][$j];
            if (strpos($str, '\\u') === 0)
            {
                $code = base_convert(substr($str, 2, 2), 16, 10);
                $code2 = base_convert(substr($str, 4), 16, 10);
                $c = chr($code).chr($code2);
                $c = iconv('UCS-2', 'UTF-8', $c);
                $name .= $c;
            }
            else
            {
                $name .= $str;
            }
        }
    }
    return $name;
}
?>
