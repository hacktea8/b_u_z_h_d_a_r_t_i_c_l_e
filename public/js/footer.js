$(document).ready(function() {
 Index.init();
 Com.init();
 window.onresize = function() {
  $("#indexBanner").get(0) && BannerEffect.reset();
 };
});
