var jq=jQuery.noConflict();function tietuku_upload(){jq.dialog.showIframeDialog(850, '', '<iframe frameborder="0" width="824" height="460" marginheight="0" marginwidth="0"  src="http://static.tietuku.com/upByPlugn?token=54974d213fed3ab4ed15d1d6fd08335debbb71ca:RVFadlNOZlAtRDhKS0VhWG9lTWd5cmZSekdnPQ==:eyJkZWFkbGluZSI6MTUwODA1ODcyNSwiYWN0aW9uIjoiZ2V0IiwidWlkIjoiNTgwOCIsImFsYnVtIjoiMTYxNzAifQ==&ifr=1&"></iframe>');}var $=jQuery.noConflict();
$('#input_cover').change(function(){
 $('#logo').attr('src',$(this).val());
});
