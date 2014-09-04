<?php
require_once $APPPATH.'../class_bbcode.php';
require_once $APPPATH.'../phpCurl.php';
require_once $APPPATH.'../big2gb/big2gb.php';

$bb = &bbcode::instance();
$curl = new phpCurl();
//繁体转简体
$big2gb = new big2gb();

function getinfolist(&$_cate){
  global $_root,$cid;
  for($i=1; $i<=2000; $i++){
//通过 atotal计算i的值
    $url = $_root.$_cate['ourl'].'?page='.$i;
echo "\n++++ ",$url," ++++\n";
//exit;
    $html = getHtml($url);
   if(CHARSET == 'GBK'){
    $html = mb_convert_encoding($html,"UTF-8","GBK");
   }
    $matchs = getParseListInfo($html);
//echo '<pre>';var_dump($matchs);exit;
    if(empty($matchs)){
       file_put_contents('match_error_list'.$cid.'.html',$html);
       //preg_match_all('##Uis',$html,$matchs,PREG_SET_ORDER);
    }
    if(empty($matchs)){
      echo ('Cate list Failed '.$url."\r\n");
      return 6;
    }
    foreach($matchs as $list){
      $oid = intval(preg_replace('#[^\d]+#','',$list['ourl']));
      $oname = trim($list['title']);
/**/
//在判断是否更新
      $aid = checkArticleByOname($oname);
      if($aid){
         echo "{$aid}已存在未更新!\r\n";
         continue;
        return 6;
      }
/**/
      $ourl = getFullPath($list['ourl']);
      $ainfo = array('thum'=>$list['cover'],'ourl'=>$ourl,'title'=>$oname,'oid'=>$oid,'cid'=>$cid);
      getinfodetail($ainfo);
sleep(1);
    }
  }
return 0;
}

function getinfodetail(&$data){
  global $model,$_root,$cid,$bb,$curl,$big2gb,$strreplace,$pregreplace;
echo $data['ourl'],"\n";
  $html = getHtml($data['ourl']);
 if(CHARSET == 'GBK'){
  $html = mb_convert_encoding($html,"UTF-8","GBK");
 }
  if(!$html){
    echo "获取html失败";exit;
  }
  //kw
  $data['keyword'] = '';
  //
  $data['ptime']=time();
  $data['utime']=time();
  preg_match('#<div id="detailContent" .+<!-- end content -->#Uis',$html,$match);
  $match[1] = isset($match[0])?$match[0]:'';
  $match[1] = @iconv("UTF-8","UTF-8//TRANSLIT",$match[1]);
//echo $match[1],"\n";
  $data['intro'] = $match[1];
  $data['intro'] = closetags($data['intro']);

  foreach($strreplace as $v){
   $data['intro'] = str_replace($v['from'], $v['to'], $data['intro']);
  }
  foreach($pregreplace as $v){
   $data['intro'] = preg_replace($v['from'], $v['to'], $data['intro']);
  }

//  $data['intro'] = $bb->html2bbcode($data['intro']);
  $data['intro'] = preg_replace('#&\S+;#Uis','',$data['intro']);
  $data['intro'] = trim($data['intro']);
  $data['ourl'] = str_replace($_root,'',$data['ourl']);
// lib translate
  $data['title'] = $big2gb->chg_utfcode($data['title'],'UTF-8');
  $data['intro'] = $big2gb->chg_utfcode($data['intro'],'UTF-8');
// 添加图片链接
  preg_match_all('#src\s*=\s*[\'|"](.+)[\'|"]#Uis', $data['intro'], $match);
//  var_dump($match);exit;
  $imgs = $match[1];
  foreach($imgs as $v){
   $img = getFullPath($v);
   $data['intro'] = str_replace($v,$img,$data['intro']);
  }
  echo '<pre>';var_dump($data);exit;
//在判断是否更新

  $aid = addArticle($data);
//echo '|',$aid,'|';exit;
  if( !$aid){
    var_dump($data);echo "\r\n添加失败! $data[ourl] \r\n";
    exit;return false;
  }
  echo "添加成功! $aid \r\n";
}
function getParseListInfo($html){
 if(LIST_HOT){
  preg_match('#<ul class="ui_list3">(.+)</ul>#Uis',$html,$match);
  $html = isset($match[1])?$match[1]:'';
  if( !$html){
    die("\n+++++ Get Video List Is Empty! ++++\n");
  }
  preg_match_all('#<li class="entry" .+<a href="[^"]+">\s+<img src="([^"]+)" />.+<div class="content">\s+<h2 class="mt5 entry-title"><a class="fcEm8" href="([^"]+)">(.+)</a></h2>#Uis',$html,$match);
 }else{
// new list
  preg_match('#<h2>最新文章</h2>\s*</div>\s+<ul>(.+)</ul>#Uis',$html,$match);
  $html = isset($match[1])?$match[1]:'';
  if( !$html){
    die("\n+++++ Get Video List Is Empty! ++++\n");
  }
  preg_match_all('#<li .+<img src="([^"]+)" />\s+</a>\s*</div>\s+<div class="content" >\s+<h3 class="entry-title"><a class="fcEm" href="([^"]+)">(.+)</a>#Uis',$html,$match);
 }
  $titlePool = $match[3];
  $urlPool = $match[2];
  $coverPool = $match[1];
  $return = array();
  foreach($titlePool as $k => $title){
    $title = trim($title);
    $cover = getFullPath($coverPool[$k]);
    $cover = preg_replace('#\?.+#is','',$cover);
    $cover = preg_replace('#\#.+#is','',$cover);
    if( !LIST_HOT){
     $cover = preg_replace('#\_\d+x\d+\.#Uis','_500x290.',$cover);
    }
    $return[] = array('title'=>$title,'ourl'=>$urlPool[$k],'cover'=>$cover);
  }
  return $return;
  var_dump($match);exit;
   
}
function getFullPath($url){
  if( !stripos($url,'://')){
    global $_root;
    $url = $_root.$url;
  }
  return $url;
}
function getParseVideoInfo($html){
  $html = urldecode($html);
  $html = str_replace(array('%u','www.1684.cc'),array('\u','www.qvdhd.com'),$html);
  $playType = explode('$$$',$html);
  $return = array();
  foreach($playType as $v){
    $player = '';
    if(false !== stripos($v,'qvod://')){
      $player = 'qvod';
    }elseif(false !== stripos($v,'bdhd://')){
      $player = 'bdhd';
    }elseif(false !== stripos($v,'gbl.114s.com')){
      $player = 'xigua';
    }elseif(false !== stripos($v,'jjhd://')){
      $player = 'jjhd';
    }else{
      echo "\n++ $v ++\n";
      continue;
    }
    $v = str_replace('$$',' ',$v);
    $v = explode('#',$v);
    $return[] = array($player,$v);
  }
  return $return;
  var_dump($return);exit;
}
