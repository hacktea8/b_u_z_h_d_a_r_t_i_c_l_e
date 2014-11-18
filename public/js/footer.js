$(document).ready(function() {
 Index.init();
 Com.init();
 window.onresize = function() {
  $("#indexBanner").get(0) && BannerEffect.reset();
 };
 if('article' == _c){
  window.setTimeout("check_user_login()",2000);
  Article.init();
  window.setTimeout("load_iframe_manage()",3000);
  $(document).scroll(function(){
  var hMove = document.body.scrollTop;
  hStatic = $('#article-item-box_static').offset().top;
  if(hMove > hStatic){
   if(slog){
    return 0;
   }
   setTimeout(function(){
   $.ajax({
    type: 'POST',
    url: '/ajax/clicklog',
    data: {'key':click_key},
    success: function(msg){},
    dataType: 'json'
   });
   },15000);
   slog = 1;
  }
  });
  if(article_adult){
   var notremind = $.cookie("notremind");
   if(notremind == "no"){
    window.location.href = window.base_url;
   }
   if( !notremind){
    $('.warn-wp').show();
   }
   $('.warn-close').click(function(){
    window.location.href = window.base_url;
   });
   $('.warn-btn .btn-no').click(function(){
    if($(".warn-sec .no-warn input").attr('checked')){
     $.cookie("notremind","no",{expires: 1});
    }else{
     $.cookie("notremind","");
    }
    window.location.href = window.base_url;
   });
   $('.warn-btn .btn-yes').click(function(){
    if($(".warn-sec .no-warn input").attr('checked')){
     $.cookie("notremind","yes",{expires: 1});
    }else{
     $.cookie("notremind","");
    }
    $('.warn-wp').hide();
   });
  }
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
