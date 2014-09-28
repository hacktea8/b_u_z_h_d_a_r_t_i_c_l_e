<?xml version="1.0" encoding="utf-8"?>
<rss xmlns:media="http://search.yahoo.com/mrss/" version="2.0">
  <channel>
    <title><?php echo $site_name;?> - <?php echo $title;?></title>
    <link><?php echo $url;?></link>
    <description><?php echo $site_name;?></description>
    <copyright>Copyright(C) <?php echo $site_name;?></copyright>
    <generator><?php echo $site_name;?> Board by <?php echo $site_name;?> Inc.</generator>
    <lastBuildDate><?php echo date('r');?></lastBuildDate>
    <ttl>600</ttl>
    <image>
      <url>site_logo</url>
      <title><?php echo $site_name;?></title>
      <link><?php echo $site_url;?></link>
    </image>
<?php foreach($list as v){?>
    <item>
      <title><?php echo $v['title'];?></title>
      <link><?php echo $v['url'];?></link>
      <description><![CDATA[<?php echo $v['intro'];?>]]></description>
      <category><?php echo $v['cname'];?></category>
      <author><?php echo $v['username'];?></author>
<media:thumbnail url="<?php echo $v['pic'];?>" />
      <pubDate><?php echo date('r',$v['utime']);?></pubDate>
    </item>
<?php }?>
  </channel>
</rss>
