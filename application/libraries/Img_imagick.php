<?php
/**
install http://www.hacktea8.com/forum.php?mod=viewthread&tid=9787
*/

class Img_imagick{
 public $wim = '';

 public function setWaterMark($img){
  $this->wim = new imagick($img);
  return $this->wim;
 }
 public function cropThumbImage($img, $width = '', $height = '', $out = ''){
  if( !file_exists($img)){
   return false;
  }
  $im = new imagick($img);
  $im->cropThumbnailImage($width, $height);
  $out = $out?$out:$img;
  $im->writeImages($out, true);
  return $out;
 }
 public function convert($img,$out = ''){
  $out = $out?$out:$img;
  $shell = sprintf('/usr/bin/convert -strip %s %s',$img, $out);
  exec($shell);
 }
 public function cropImage($img,$width,$height,$lx,$ly,$out = ''){
  if( !file_exists($img)){
   return false;
  }
  $im = new imagick($img);
  $im->cropImage( $width ,$height ,$lx ,$ly );
  $out = $out?$out:$img;
  $im->writeImages($out, true);
  return $out;
 }
 public function resizeImage($img,$width,$height,$out = ''){
  if( !file_exists($img)){
   return false;
  }
  $im = new imagick($img);
  $im->resizeImage($width, $height, imagick::FILTER_LANCZOS, 1, true);
  $out = $out?$out:$img;
  $im->writeImages($out, true);
  return $out;
 }
 public function waterMark($img,$out = '', $wmpos = 0){
  $im = new imagick($img);
  $size = $this->getmarklocation($im, $this->wim, $wmpos);
  $im->compositeImage($this->wim, imagick::COMPOSITE_OVER, $size['w'] , $size['h'] );
  $out = $out?$out:$img;
  $im->writeImages($out, true);
  return $out;
 }
 private function getmarklocation(&$imgsize,&$watersize,$wmpos = 0){
//右中
    if(15 == $wmpos){
       return array('w'=>$imgsize->getImageWidth()-$watersize->getImageWidth()-10,
               'h'=>($imgsize->getImageHeight()-$watersize->getImageHeight()-10)/2);
    }else if(12 == $wmpos){
//下中
       return array('w'=>($imgsize->getImageWidth()-$watersize->getImageWidth()-10)/2,
                'h'=>$imgsize->getImageHeight()-$watersize->getImageHeight()-10);
    }else if(13 == $wmpos){
//上中
       return array('w'=>($imgsize->getImageWidth()-$watersize->getImageWidth()-10)/2,
                   'h'=>10);
    }else if(14 == $wmpos){
//左中
       return array('w'=>10,
              'h'=>($imgsize->getImageHeight()-$watersize->getImageHeight()-10)/2);
    }
//右下角
    return array('w'=>$imgsize->getImageWidth()-$watersize->getImageWidth()-10,
                   'h'=>$imgsize->getImageHeight()-$watersize->getImageHeight()-10);

 }
}
?>
