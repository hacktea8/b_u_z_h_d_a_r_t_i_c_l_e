$(document).ready(function() {
 window.setTimeout("check_user_login()",3000);
 Index.init();
 Com.init();
 window.onresize = function() {
  $("#indexBanner").get(0) && BannerEffect.reset();
 };
 if('article' == _c){
  window.setTimeout("load_iframe_manage()",5000);
 }
});
function load_iframe_manage(){
 if(article_uid != login_uid && !isAdmin){
  return 0;
 }
 iframe_html = get_iframe_html('/iframe/article_manage/'+article_id);
 $('#manage_iframe').html(iframe_html).css({'display':'block','height':'30px'});
}
function get_iframe_html(src){
 return '<iframe src="'+src+'" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>';
}
function check_user_login(){
 if(login_uid != 0){
  return 0;
 }
 $.get("/ajax/is_login", function(data){
  if(1 == data.flag){
   login_uid = data.uid;
   isAdmin = data.isAdmin;
  }else{
   login_uid = -1;
  }
 },'json');
}
