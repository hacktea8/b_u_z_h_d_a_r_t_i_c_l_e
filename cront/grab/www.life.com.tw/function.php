<?php
  

function getinfolist(&$_cate){
 global $_root,$cid,$model,$pageStart;
 $pageEnd = isset($_cate['page'])? $_cate['page']: 1;
 $isAdult = isset($_cate['adult'])? $_cate['adult']: 0;
 $pageStart = $pageStart ? $pageStart : 1;
 for($i = $pageStart; $i <= $pageEnd; $i++){
//通过 atotal计算i的值
  $url = sprintf('%s/index.php?app=category&act=categorylist&no=%d&page=%d',$_root,$_cate['ourl'],$i);
  echo "\n++++ ",$url," ++++\n";
  //exit;
  $html = getHtml($url);
  $matchs = getParseListInfo($html);
//  echo '<pre>';var_dump($matchs);exit;
  if(empty($matchs)){
   file_put_contents('match_error_list'.$cid.'.html',$html);
   //preg_match_all('##Uis',$html,$matchs,PREG_SET_ORDER);
   echo ('Cate list Failed '.$url."\r\n");
   return 6;
  }
  foreach($matchs as $list){
   $oid = $list['oaid'];
//在判断是否更新
   $aid = $model->checkArticleByOaid($oid);
   if($aid){
    echo "{$aid}已存在未更新!\r\n";
    continue;
    return 6;
   }
   $ourl = getFullPath($list['ourl']);
   $ainfo = array('ourl'=>$ourl,'title'=>'','oid'=>$oid,'cid'=>$cid,'verify'=>1,'adult'=>$isAdult);
   getinfodetail($ainfo);
  sleep(3);
    }
  }
return 0;
}

function getinfodetail(&$data){
 global $model,$_root,$cid,$strreplace,$pregreplace;
echo $data['ourl'],"\n";
 $html = getHtml($data['ourl']);
 if(!$html){
  echo "获取html失败";exit;
 }
 //kw
 $data['keyword'] = '';
 //
 $data['ptime'] = time();
 $data['utime'] = time();
 preg_match('#<meta property="og:title" content="([^"]+)">#Uis',$html,$match);
 $data['title'] = trim($match[1]);
 preg_match('#<meta property="og:image" content="([^"]+)">#Uis',$html,$match);
 $data['cover'] = trim($match[1]);
 //preg_match('#<div aricle-detail-main class="aricle-detail-mainin" id="mainContent">(.+)</div>#Uis',$html,$match);
 //$data['intro'] = @$match[1];
 $str = '';
 $head = '<div aricle-detail-main class="aricle-detail-mainin" id="mainContent">';
 $intro = $html;
 getTagpair($str,$intro,$head ,$end = '</div>',$same = '<div');
 $data['intro'] = $str;
 $data['intro'] = preg_replace('#&\S+;#Uis',' ',$data['intro']);
// $data['intro'] = mb_strlen($data['intro'])>300?mb_substr($data['intro'],0,300,'utf-8'):$data['intro'];
 $data['intro'] = trim($data['intro']);
 if(!$data['title'] || empty($data['intro'])){
  echo "抓取失败 $data[ourl] \r\n";
  file_put_contents('parse_html.html',$html);
exit;
  return false;
 }
 $data['is_original'] = 0;
 $data['original_url'] = $data['ourl'];
// echo '<pre>';var_dump($data);exit;

 $aid = addArticle($data);
//echo '|',$aid,'|';exit;
 if( !$aid){
  var_dump($data);echo "\r\n添加失败! $data[ourl] \r\n";
  exit;return false;
 }
 $model->addArticleOaid($data['oid']);
 echo "添加成功! $aid \r\n";
}
function getArticlePlayData($htm){
 $preg_replace = array(
array('from'=>'#<p><span style="font-size: 14pt; color: #800080;">延伸閱讀</span></p>#Uis','to'=>'')
,array('from'=>'#<h1><a rel="nofollow" href="[^"]+"><span style="[^"]+">[^<]+</span></a></h1>#Uis','to'=>'')
#,array('from'=>'','to'=>'')
#,array('from'=>'','to'=>'')
 );
 foreach($preg_replace as $v){
  $htm = preg_replace($v['from'],$v['to'],$htm);
 }
 return $htm;
}
function getParseListInfo($html){
 if( !$html){
  die("\n+++++ Get Video List Is Empty! ++++\n");
 }
 preg_match_all('#<dt><a href="/\?app=view&no=(\d+)" target="_blank">[^<]*</a></dt>#Uis', $html, $match);
 $return = array();
 foreach($match[1] as $k => $aid){
  $return[] = array('oaid'=>$aid,'ourl'=>'/?app=view&no='.$aid);
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
}
