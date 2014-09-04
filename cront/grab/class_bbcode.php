<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: class_bbcode.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

class bbcode {

	var $search_exp = array();
	var $replace_exp = array();
	var $search_str = array();
	var $replace_str = array();
	var $html_s_exp = array();
	var $html_r_exp = array();
	var $html_s_str = array();
	var $html_r_str = array();

	function &instance() {
		static $object;
		if(empty($object)) {
			$object = new bbcode();
		}
		return $object;
	}

	function bbcode() {
	}

	function bbcode2html($message, $parseurl=0) {
		if(empty($this->search_exp)) {
			$this->search_exp = array(
				"/\s*\[quote\][\n\r]*(.+?)[\n\r]*\[\/quote\]\s*/is",
				"/\[url\]\s*(https?:\/\/|ftp:\/\/|gopher:\/\/|news:\/\/|telnet:\/\/|rtsp:\/\/|mms:\/\/|callto:\/\/|ed2k:\/\/){1}([^\[\"']+?)\s*\[\/url\]/i",
				"/\[em:([0-9]+):\]/i",
			);
			$this->replace_exp = array(
				"<div class=\"quote\"><blockquote>\\1</blockquote></div>",
				"<a href=\"\\1\\2\" target=\"_blank\">\\1\\2</a>",
				" <img src=\"".STATICURL."image/smiley/comcom/\\1.gif\" class=\"vm\"> "
			);
			$this->replace_exp[] = '$this->bb_img(\'\\1\')';
			$this->search_str = array('[b]', '[/b]','[i]', '[/i]', '[u]', '[/u]');
			$this->replace_str = array('<b>', '</b>', '<i>','</i>', '<u>', '</u>');
		}

		if($parseurl==2) {
			$this->search_exp[] = "/\[img\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/ies";
			$this->replace_exp[] = '$this->bb_img(\'\\1\')';
			$message = bbcode::parseurl($message);
		}

		@$message = str_replace($this->search_str, $this->replace_str,preg_replace($this->search_exp, $this->replace_exp, $message, 20));
		return nl2br(str_replace(array("\t", '   ', '  '), array('&nbsp; &nbsp; &nbsp; &nbsp; ', '&nbsp; &nbsp;', '&nbsp;&nbsp;'), $message));
	}

	function parseurl($message) {
		return preg_replace("/(?<=[^\]a-z0-9-=\"'\\/])((https?|ftp|gopher|news|telnet|mms|rtsp):\/\/)([a-z0-9\/\-_+=.~!%@?#%&;:$\\()|]+)/i", "[url]\\1\\3[/url]", ' '.$message);
	}

	function html2bbcode($message) {

		if(empty($this->html_s_exp)) {
			$this->html_s_exp = array(
					"/\<div class=\"quote\"\>\<blockquote\>(.*?)\<\/blockquote\>\<\/div\>/is",
					"/\<a href=\"(.+?)\".*?\<\/a\>/is",
					"/(\r\n|\n|\r)/",
					"/<br.*>/siU",
					"/[ \t]*\<img src=\"static\/image\/smiley\/comcom\/(.+?).gif\".*?\>[ \t]*/is",
					"/\s*\<img src=\"(.+?)\".*?\>\s*/is"
				);
				$this->html_r_exp = array(
					"[quote]\\1[/quote]",
					"\\1",
					'',
					"\n",
					"[em:\\1:]",
					"\n[img]\\1[/img]\n"
			);
			$this->html_s_str = array('<b>', '</b>', '<i>','</i>', '<u>', '</u>', '&nbsp; &nbsp; &nbsp; &nbsp; ', '&nbsp; &nbsp;', '&nbsp;&nbsp;', '&lt;', '&gt;', '&amp;');
			$this->html_r_str = array('[b]', '[/b]','[i]', '[/i]', '[u]', '[/u]', "\t", '   ', '  ', '<', '>', '&');
		}

		@$message = str_replace($this->html_s_str, $this->html_r_str,
		preg_replace($this->html_s_exp, $this->html_r_exp, $message));

		$message = dhtmlspecialchars($message);

		return trim($message);
	}

	function bb_img($url) {
		global $_G;

		if(!in_array(strtolower(substr($url, 0, 6)), array('http:/', 'https:', 'ftp://', 'rtsp:/', 'mms://'))) {
			$url = isset($_G['siteurl']) && !empty($_G['siteurl']) ? $_G['siteurl'].$url : 'http://'.$url;
		}
		$url = addslashes($url);
		return "<img src=\"$url\" class=\"vm\">";
	}
}

function dhtmlspecialchars($string, $flags = null) {
    if(is_array($string)) {
        foreach($string as $key => $val) {
            $string[$key] = dhtmlspecialchars($val, $flags);
        }
    } else {
        if($flags === null) {
            $string = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string);
            if(strpos($string, '&amp;#') !== false) {
                $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4}));)/', '&\\1', $string);
            }
        } else {
            if(PHP_VERSION < '5.4.0') {
                $string = htmlspecialchars($string, $flags);
            } else {
                if(strtolower(CHARSET) == 'utf-8') {
                    $charset = 'UTF-8';
                } else {
                    $charset = 'ISO-8859-1';
                }
                $string = htmlspecialchars($string, $flags, $charset);
            }
        }
    }
    return $string;
}


function closetags($html) { 
 // 不需要补全的标签 
 $arr_single_tags = array('meta', 'img', 'br', 'link', 'area'); 
 // 匹配开始标签 
 preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result); 
 $openedtags = $result[1]; 
 // 匹配关闭标签 
 preg_match_all('#</([a-z]+)>#iU', $html, $result); 
 $closedtags = $result[1]; 
 // 计算关闭开启标签数量，如果相同就返回html数据 
 $len_opened = count($openedtags); 
 if (count($closedtags) == $len_opened) { 
  return $html; 
 } 
 // 把排序数组，将最后一个开启的标签放在最前面 
 $openedtags = array_reverse($openedtags); 
 // 遍历开启标签数组 
 for ($i = 0; $i < $len_opened; $i++) { 
  // 如果需要补全的标签 
  if (!in_array($openedtags[$i], $arr_single_tags)) { 
   // 如果这个标签不在关闭的标签中 
   if (!in_array($openedtags[$i], $closedtags)) { 
   // 直接补全闭合标签 
    $html .= '</' . $openedtags[$i] . '>'; 
   } else { 
    unset($closedtags[array_search($openedtags[$i], $closedtags)]); 
   } 
  } 
 } 
 return $html; 
}

/*
function closetags($html) {
  #put all opened tags into an array
  preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
  $openedtags = $result[1];
  #put all closed tags into an array
  preg_match_all('#</([a-z]+)>#iU', $html, $result);
  $closedtags = $result[1];
  $len_opened = count($openedtags);
  # all tags are closed
  if (count($closedtags) == $len_opened) {
    return $html;
  }
  $openedtags = array_reverse($openedtags);
  # close tags
  for ($i=0; $i < $len_opened; $i++) {
   if (!in_array($openedtags[$i], $closedtags)){
    $html .= '</'.$openedtags[$i].'>';
   } else {
    unset($closedtags[array_search($openedtags[$i], $closedtags)]);
   }
  }
  return $html;
}
*/
