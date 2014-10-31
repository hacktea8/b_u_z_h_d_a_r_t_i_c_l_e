window.submitFlag = 0;
$(document).ready(function() {
 //Com.fnUploadImg.init();
 $('#Channel-form').submit(function(){
  window.submitFlag = 0;
  var urlkey = $('#Channel_urlkey').val();
  if(urlkey){
   if(urlkey.length<3 || urlkey.length>36){
    window.submitFlag = 1;
    alert('urlkey 長度不符合要求');
   }
   var check = urlkey.replace(/[a-zA-Z\d_]+/g,'');
   if(check){
    window.submitFlag = 1;
    alert('urlkey 格式不正確');
   }else{
    check = urlkey.replace(/[\d]+/g,'');
    if( !check){
     window.submitFlag = 1;
     alert('urlkey 不可以為純數字');
    }
   }
   $.ajax({
    type: 'POST',
    url: '/ajax/checkUserChannelUrlkey',
    data: {'urlkey':urlkey},
    success: function(data){
     if(data.status == 1){
      window.submitFlag = 1;
      alert('urlkey 已經存在');
     }
    },
    dataType: 'json'
   });
  }
  if(window.submitFlag){
   return false;
  }
 });
});
/*<![CDATA[*/
jQuery(function($) {
jQuery('body').on('click','#yt0',function(){jQuery.ajax({'success':function(res){
 if (res.status="success"){
  $("#logo").attr("src", res.src );
 }
},'type':'POST','dataType':'json','url':'/clearlogo.html?type=channel','cache':false,'data':jQuery(this).parents("form").serialize()});return false;});
});
/*]]>*/
